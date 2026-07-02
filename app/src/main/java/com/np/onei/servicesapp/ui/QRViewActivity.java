package com.np.onei.servicesapp.ui;

import android.app.ProgressDialog;
import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.Color;
import android.os.Bundle;
import android.os.Handler;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import com.budiyev.android.codescanner.CodeScanner;
import com.budiyev.android.codescanner.CodeScannerView;
import com.budiyev.android.codescanner.DecodeCallback;
import com.google.zxing.Result;
import com.google.zxing.WriterException;
import com.np.onei.servicesapp.R;
import com.np.onei.servicesapp.intfc.UpdateQrStatusInterface;
import com.np.onei.servicesapp.repositrys.GetQRStatusRepositry;
import com.np.onei.utils.ApplicationController;
import com.np.onei.utils.Const;
import com.squareup.picasso.Picasso;

import androidmads.library.qrgenearator.QRGContents;
import androidmads.library.qrgenearator.QRGEncoder;

public class QRViewActivity extends AppCompatActivity implements UpdateQrStatusInterface {

    TextView cname,odrId,wrks,pro_area_name,servicename,cadres,cmob;
    Handler handler;
    TextView headertxt;
    ImageView qrview,img1,img2;
    Bitmap bitmap;
    ApplicationController obj;
    GetQRStatusRepositry GQRFS;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        obj=(ApplicationController)getApplicationContext();
        handler= new Handler();
        if(obj.getQrScanStatus().equals("1"))
        {
           // obj.setQrScanStatus("0");
            handler.removeCallbacksAndMessages(null);
            startActivity(new Intent(QRViewActivity.this, DetailReqActivity.class));
            finish();

        }
        setContentView(R.layout.qr_view);
        img1 = (ImageView) findViewById(R.id.img1);
        img2 = (ImageView) findViewById(R.id.img2);
        cname = (TextView) findViewById(R.id.cname);
        odrId = (TextView) findViewById(R.id.odrId);
        wrks = (TextView) findViewById(R.id.wrks);
        pro_area_name = (TextView) findViewById(R.id.pro_area_name);
        servicename = (TextView) findViewById(R.id.servicename);
        cadres = (TextView) findViewById(R.id.cadres);
        cmob = (TextView) findViewById(R.id.cmob);

        Picasso.with(QRViewActivity.this).load(Const.BASE_URL_IMG+obj.getPhoto1()).into(img1);
        Picasso.with(QRViewActivity.this).load(Const.BASE_URL_IMG+obj.getPhoto2()).into(img2);
        cname.setText(obj.getCustomerName());
        odrId.setText(obj.getReqId());
        wrks.setText(obj.getWorkingDetails());
        pro_area_name.setText(obj.getProfessionalArea());
        servicename.setText(obj.getServiceName());
        cadres.setText(obj.getCustomerAddress());
        cmob.setText(obj.getCustomerMob());
        GQRFS= new GetQRStatusRepositry(QRViewActivity.this,new ProgressDialog(QRViewActivity.this),this);

        headertxt = (TextView) findViewById(R.id.headertxt);
        headertxt.setText("QR-View");
        headertxt.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });
        qrview=(ImageView)findViewById(R.id.qrview);
        QRGEncoder qrgEncoder = new QRGEncoder(obj.getSecurityCode(), null, QRGContents.Type.TEXT, 5000);
        qrgEncoder.setColorBlack(Color.WHITE);
        qrgEncoder.setColorWhite(Color.BLACK);
        // Getting QR-Code as Bitmap
        bitmap = qrgEncoder.getBitmap();
        // Setting Bitmap to ImageView
        qrview.setImageBitmap(bitmap);


        new Handler().postDelayed(new Runnable() {
            @Override
            public void run() {
                GQRFS.getQrUpdated(obj.getSecurityCode());
                handler.postDelayed(this, 3000);
            }
        }, 3000);
    }

    @Override
    public void UpdateSuccess(String msg) {

       // Toast.makeText(QRViewActivity.this, ""+msg, Toast.LENGTH_SHORT).show();
        if(msg.equals("1"))
        {
            startActivity(new Intent(QRViewActivity.this, DetailReqActivity.class));
            finish();
            handler.removeCallbacksAndMessages(null);
        }
    }

    @Override
    public void Failed(String msg) {

    }
}