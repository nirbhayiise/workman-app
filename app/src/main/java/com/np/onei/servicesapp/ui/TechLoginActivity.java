package com.np.onei.servicesapp.ui;

import android.app.ProgressDialog;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;

import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.np.onei.servicesapp.MainActivity;
import com.np.onei.servicesapp.R;
import com.np.onei.servicesapp.TechMainActivity;
import com.np.onei.servicesapp.intfc.ForgotPassCallBack;
import com.np.onei.servicesapp.intfc.ForgotPassResultCallBack;
import com.np.onei.servicesapp.intfc.PermissionCallBack;
import com.np.onei.servicesapp.intfc.SignupInterface;
import com.np.onei.servicesapp.intfc.TLoginInterface;
import com.np.onei.servicesapp.models.TLoginResponse;
import com.np.onei.servicesapp.repositrys.PasswordFogotRepositry;
import com.np.onei.servicesapp.repositrys.TLoginRepositry;
import com.np.onei.servicesapp.services.RetrofitRequrest;
import com.np.onei.utils.ApplicationController;

import java.util.List;

public class TechLoginActivity extends AppCompatActivity implements TLoginInterface, ForgotPassCallBack, ForgotPassResultCallBack, SignupInterface, PermissionCallBack {

    Button logn;
    TextView reg,loginasservice,pasfotgot;
    TLoginRepositry TLObj;
    EditText uid,pas;
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
        setContentView(R.layout.techlogin);

        // In-app update removed
        obj=(ApplicationController)getApplicationContext();
        obj.requestMultiplePermissions(TechLoginActivity.this,this);
        fgtresult=this;
        fgotPass=this;
        pfrObject=new PasswordFogotRepositry(TechLoginActivity.this, RetrofitRequrest.ProgressForDriver(TechLoginActivity.this),this);
        TLObj=new TLoginRepositry(TechLoginActivity.this, RetrofitRequrest.ProgressForDriver(TechLoginActivity.this),this);
        reg=(TextView)findViewById(R.id.reg);
        pasfotgot=(TextView)findViewById(R.id.pasfotgot);
        uid=(EditText) findViewById(R.id.uid);
        pas=(EditText) findViewById(R.id.pas);
        loginasservice=(TextView)findViewById(R.id.loginasservice);
        logn=(Button)findViewById(R.id.logn);
        loginRememebr = getSharedPreferences(
                String.format("%s_preferences", getPackageName()),
                android.content.Context.MODE_PRIVATE);
        rem = loginRememebr.edit();

        logn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                rem.putString("saved_email", uid.getText().toString());
                rem.putString("saved_password", pas.getText().toString());
                rem.putString("user_type", "tech");
                rem.apply();
                TLObj.CloginInvok(uid.getText().toString(),pas.getText().toString());
            }
        });
        pasfotgot.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                fgotPass.PasswordReturn(TechLoginActivity.this,fgtresult);
            }
        });
        reg.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(TechLoginActivity.this, TechSignupActivity.class));

            }
        });

        loginasservice.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(TechLoginActivity.this, LoginActivity.class));

            }
        });

        String savedEmail = loginRememebr.getString("saved_email", "");
        String savedPass = loginRememebr.getString("saved_password", "");
        String userType = loginRememebr.getString("user_type", "");
        if (!savedEmail.isEmpty()) {
            if (userType.equals("tech")) {
                uid.setText(savedEmail);
                pas.setText(savedPass);
                TLObj.CloginInvok(savedEmail, savedPass);
            } else if (userType.equals("customer")) {
                startActivity(new Intent(TechLoginActivity.this, LoginActivity.class));
                finish();
            }
        }
    }

    @Override
    public void SingupSuccess(List<TLoginResponse> msg) {
        obj.setTloginObject(msg);
        obj.setTuId(msg.get(0).getTId());
        obj.setTFirstName(msg.get(0).getTechName());
        obj.setTLastName(msg.get(0).getLastName());
        obj.setTPhone(msg.get(0).getTPhone());
        obj.setTMail(msg.get(0).getTEmail());
        obj.setTAddress(msg.get(0).getTAddress());
        obj.setTpass(msg.get(0).getTpass());
        obj.setProfilePic(msg.get(0).getProImg());
        startActivity(new Intent(TechLoginActivity.this, TechMainActivity.class));
        finish();
    }

    @Override
    public void SingupSuccess(String msg) {

    }

    @Override
    public void SignupFailed(String msg) {
        rem.remove("saved_email");
        rem.remove("saved_password");
        rem.remove("user_type");
        rem.apply();
        Toast.makeText(TechLoginActivity.this, ""+msg, Toast.LENGTH_SHORT).show();
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

    @Override
    public void forgotPasswordSuccess(String msg) {
        pfrObject.invokedForgotCall(msg,"T");
    }

    @Override
    public void forgotPasswordError(String msg) {

    }

    @Override
    public void PermissionGrant() {

    }

    @Override
    public void PermissionDinied() {

    }


}
