package com.np.onei.servicesapp.ui;

import android.app.Dialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;

import android.view.View;
import android.view.Window;
import android.webkit.WebView;
import android.widget.Button;
import android.widget.EditText;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.np.onei.servicesapp.MainActivity;
import com.np.onei.servicesapp.R;
import com.np.onei.servicesapp.intfc.ForgotPassCallBack;
import com.np.onei.servicesapp.intfc.ForgotPassResultCallBack;
import com.np.onei.servicesapp.intfc.LoginInterface;
import com.np.onei.servicesapp.intfc.SignupInterface;
import com.np.onei.servicesapp.models.CLoginResponse;
import com.np.onei.servicesapp.repositrys.CLoginRepositry;
import com.np.onei.servicesapp.repositrys.PasswordFogotRepositry;
import com.np.onei.servicesapp.services.RetrofitRequrest;
import com.np.onei.utils.ApplicationController;
import com.np.onei.utils.SingletonObjectAccess;


import java.util.List;

public class LoginActivity extends AppCompatActivity implements LoginInterface, ForgotPassCallBack, ForgotPassResultCallBack, SignupInterface {

    Button logn;
    TextView reg,loginasservice,pasfotgot;
    CLoginRepositry cLObj;
    //EditText mail,pas;
    EditText mail;
    EditText pas;
    ApplicationController obj;
    ForgotPassCallBack fgotPass;
    ForgotPassResultCallBack fgtresult;
    PasswordFogotRepositry pfrObject;
    private SharedPreferences loginRememebr;
    private SharedPreferences.Editor rem;
    private static final int REQ_CODE_VERSION_UPDATE = 2;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.login);


        // In-app update removed
        loginRememebr = getSharedPreferences(
                String.format("%s_preferences", getPackageName()),
                Context.MODE_PRIVATE);
        rem = loginRememebr.edit();
        fgtresult=this;
        fgotPass=this;
        obj=(ApplicationController)getApplicationContext();
        pfrObject=new PasswordFogotRepositry(LoginActivity.this, RetrofitRequrest.ProgressForDriver(LoginActivity.this),this);
        cLObj=new CLoginRepositry(LoginActivity.this, RetrofitRequrest.ProgressForDriver(LoginActivity.this),this);
        reg=(TextView)findViewById(R.id.reg);
        pasfotgot=(TextView)findViewById(R.id.pasfotgot);
       mail=(EditText)findViewById(R.id.mail);
        //mail=(ShowHidePasswordEditText)findViewById(R.id.mail);
       // pas=(EditText)findViewById(R.id.pas);
        pas=(EditText)findViewById(R.id.pas);
        loginasservice=(TextView)findViewById(R.id.loginasservice);
        logn=(Button)findViewById(R.id.logn);

        logn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                rem.putString("saved_email", mail.getText().toString());
                rem.putString("saved_password", pas.getText().toString());
                rem.putString("user_type", "customer");
                rem.apply();
                cLObj.CloginInvok(mail.getText().toString(),pas.getText().toString());

            }
        });
        pasfotgot.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                fgotPass.PasswordReturn(LoginActivity.this,fgtresult);
            }
        });
        reg.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(LoginActivity.this, SignupActivity.class));

            }
        });

        loginasservice.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(LoginActivity.this, TechLoginActivity.class));

            }
        });
        if(loginRememebr.getString("acpt","0").equals("0")) {

            help();

        } else {
            String savedEmail = loginRememebr.getString("saved_email", "");
            String savedPass = loginRememebr.getString("saved_password", "");
            String userType = loginRememebr.getString("user_type", "");
            if (!savedEmail.isEmpty()) {
                if (userType.equals("customer")) {
                    mail.setText(savedEmail);
                    pas.setText(savedPass);
                    cLObj.CloginInvok(savedEmail, savedPass);
                } else if (userType.equals("tech")) {
                    startActivity(new Intent(LoginActivity.this, TechLoginActivity.class));
                    finish();
                }
            }
        }
    }

    @Override
    public void SingupSuccess(List<CLoginResponse> msg) {
        obj.setCloginObject(msg);
        obj.setuId(msg.get(0).getCId());
        obj.setcFirstName(msg.get(0).getCFirstName());
        obj.setcLastName(msg.get(0).getCLastName());
        obj.setcPhone(msg.get(0).getCPhone());
        obj.setcMail(msg.get(0).getCEmail());
        obj.setcAddress(msg.get(0).getCAddress());
        obj.setcPass(msg.get(0).getCPass());
        startActivity(new Intent(LoginActivity.this, MainActivity.class));
        finish();
    }

    @Override
    public void SingupSuccess(String msg) {
        Toast.makeText(LoginActivity.this,"Password successfuly sent on your mail",Toast.LENGTH_LONG).show();
    }

    @Override
    public void SignupFailed(String msg) {
        rem.remove("saved_email");
        rem.remove("saved_password");
        rem.remove("user_type");
        rem.apply();
        Toast.makeText(LoginActivity.this,""+msg,Toast.LENGTH_LONG).show();
    }

    @Override
    public void RequestProgressShow(ProgressDialog pd) {
pd.setMessage("Please wait...");
pd.show();
    }

    @Override
    public void RequestProgressFinish(ProgressDialog pd) {
pd.dismiss();
    }


    public void help()
    {
        Dialog dialog = SingletonObjectAccess.DialogObjectReturn(LoginActivity.this);
           // dialog.requestWindowFeature(Window.FEATURE_NO_TITLE);
        dialog.setCancelable(false);
        dialog.setContentView(R.layout.helps);
        LinearLayout clse=(LinearLayout)dialog.findViewById(R.id.clse);
        Button acpt=(Button)dialog.findViewById(R.id.acpt);
        WebView wv=(WebView)dialog.findViewById(R.id.viewpages1);
        clse.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                dialog.dismiss();
                finish();
            }
        });

        acpt.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                rem.putString("acpt","1");
                rem.apply();
                rem.commit();
                dialog.dismiss();

            }
        });
        wv.loadUrl("file:///android_asset/terms.html");
        dialog.show();
    }


    @Override
    public void forgotPasswordSuccess(String mail) {
        Toast.makeText(LoginActivity.this,"Password successfuly sent on your mail",Toast.LENGTH_LONG).show();
        pfrObject.invokedForgotCall(mail,"C");
    }

    @Override
    public void forgotPasswordError(String msg) {

    }


}
