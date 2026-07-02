package com.np.onei.servicesapp.ui;

import android.app.Dialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.view.Window;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import com.budiyev.android.codescanner.CodeScanner;
import com.budiyev.android.codescanner.CodeScannerView;
import com.budiyev.android.codescanner.DecodeCallback;
import com.google.zxing.Result;
import com.np.onei.servicesapp.AppController;
import com.np.onei.servicesapp.MainActivity;
import com.np.onei.servicesapp.R;
import com.np.onei.servicesapp.intfc.ScanDetailQrStatusInterface;
import com.np.onei.servicesapp.intfc.SignupInterface;
import com.np.onei.servicesapp.intfc.UpdateQrStatusInterface;
import com.np.onei.servicesapp.models.TechAcceptReqWrapper;
import com.np.onei.servicesapp.repositrys.BankFormSubmitRepositroy;
import com.np.onei.servicesapp.repositrys.ScanQRDetailStatusRepositry;
import com.np.onei.servicesapp.repositrys.UpdateQRStatusRepositry;
import com.np.onei.servicesapp.services.APIs;
import com.np.onei.servicesapp.services.RetrofitRequrest;
import com.np.onei.utils.ApplicationController;
import com.np.onei.utils.Const;
import com.np.onei.utils.SingletonObjectAccess;
import com.squareup.picasso.Picasso;

import de.hdodenhof.circleimageview.CircleImageView;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class QRScannerActivity extends AppCompatActivity implements ScanDetailQrStatusInterface {

    TextView headertxt;
    private CodeScanner mCodeScanner;
    private ScanQRDetailStatusRepositry UQRSR;
    ApplicationController objApp;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.qr_scanner_lay);
        UQRSR=new ScanQRDetailStatusRepositry(QRScannerActivity.this,new ProgressDialog(QRScannerActivity.this),this);
        headertxt=(TextView) findViewById(R.id.headertxt);
        headertxt.setText("QR-Scan");
        objApp=(ApplicationController)getApplicationContext();
        headertxt.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });
        CodeScannerView scannerView = findViewById(R.id.scannerMachine);
        mCodeScanner = new CodeScanner(this, scannerView);
        mCodeScanner.setDecodeCallback(new DecodeCallback() {
            @Override
            public void onDecoded(@NonNull final Result result) {
                runOnUiThread(new Runnable() {
                    @Override
                    public void run() {
                        objApp.setQrCode(result.getText());
                        UQRSR.getQrUpdated(result.getText(),"0");
//                        startActivity(new Intent(QRScannerActivity.this, AceeptedDetailReqActivity.class));
//                       finish();
                        // Toast.makeText(QRScannerActivity.this, result.getText(), Toast.LENGTH_SHORT).show();
                    }
                });
            }
        });
        scannerView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                mCodeScanner.startPreview();
            }
        });
    }
    public void openJobDetails(Context cnt, DetailsData obj){
        final Dialog dialog = new Dialog(cnt);
       // dialog.requestWindowFeature(Window.FEATURE_NO_TITLE);
        dialog.setCancelable(false);
        dialog.setContentView(R.layout.view_accept);
        Button acceptBtn,cncl;
        CircleImageView photo1;
        TextView cname,odrId,wrks,pro_area_name,servicename,cadres,cmob,headertxt;
        acceptBtn=(Button)dialog.findViewById(R.id.acceptBtn);
        cncl=(Button)dialog.findViewById(R.id.cncl);

        photo1 = (CircleImageView) dialog.findViewById(R.id.photo1);
        cname = (TextView) dialog.findViewById(R.id.cname);
        odrId = (TextView)dialog. findViewById(R.id.odrId);
        wrks = (TextView) dialog.findViewById(R.id.wrks);
        pro_area_name = (TextView) dialog. findViewById(R.id.pro_area_name);
        servicename = (TextView) dialog.findViewById(R.id.servicename);
        cadres = (TextView)dialog. findViewById(R.id.cadres);
        cmob = (TextView)dialog.findViewById(R.id.cmob);

        Picasso.with(QRScannerActivity.this).load(Const.BASE_URL_IMG+obj.getProImg()).into(photo1);
        cname.setText(obj.getTech_name());
        odrId.setText(obj.geteId());
        wrks.setText(obj.getDetails());
        pro_area_name.setText(obj.getProName());
        servicename.setText(obj.getsName());
       // cadres.setText(obj.getA());
        cmob.setText(obj.getT_phone());
        acceptBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                UQRSR.getQrUpdatedProbutton(objApp.getQrCode(),"1");
                dialog.dismiss();
            }
        });
        cncl.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                acceptReq(objApp.getQrCode());
                dialog.dismiss();
                finish();
            }
        });
        dialog.show();
    }
    @Override
    protected void onResume() {
        super.onResume();
        mCodeScanner.startPreview();
    }

    @Override
    protected void onPause() {
        mCodeScanner.releaseResources();
        super.onPause();
    }

    @Override
    public void UpdateSuccess(String msg,DetailsData _data) {
        Toast.makeText(QRScannerActivity.this, msg, Toast.LENGTH_SHORT).show();
        //
        openJobDetails(QRScannerActivity.this, _data);
        // finish();
    }

    @Override
    public void OpenDialogBox(String msg, DetailsData _data) {
        Toast.makeText(QRScannerActivity.this, msg, Toast.LENGTH_SHORT).show();
        finish();
    }

    @Override
    public void Failed(String msg) {

    }
    public void acceptReq(String eid){

        APIs apiservice= SingletonObjectAccess.getApiService();
        Call<TechAcceptReqWrapper> call=apiservice.cancelJobFromCust(eid);
        call.enqueue(new Callback<TechAcceptReqWrapper>() {
            @Override
            public void onResponse(Call<TechAcceptReqWrapper> call, Response<TechAcceptReqWrapper> response) {
                if(response.body().getResponse().getStatus().equals("1"))
                {

                }else
                {

                }
            }

            @Override
            public void onFailure(Call<TechAcceptReqWrapper> call, Throwable t) {

            }
        });


    }
}