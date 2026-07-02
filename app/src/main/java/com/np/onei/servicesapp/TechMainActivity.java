package com.np.onei.servicesapp;

import android.app.Dialog;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;

import android.view.View;
import android.view.Window;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;

import com.np.onei.servicesapp.intfc.PendingJobCompleteInterface;
import com.np.onei.servicesapp.repositrys.PendingJobCompleteRepositry;
import com.np.onei.servicesapp.services.RetrofitRequrest;
import com.np.onei.servicesapp.ui.ContactUsActivity;
import com.np.onei.servicesapp.ui.LoginActivity;
import com.np.onei.servicesapp.ui.Profile_tech;
import com.np.onei.servicesapp.ui.SignupActivity;
import com.np.onei.servicesapp.ui.TechAcceptRequestActivity;
import com.np.onei.servicesapp.ui.TechCompletedRequestActivity;
import com.np.onei.servicesapp.ui.TechLoginActivity;
import com.np.onei.servicesapp.ui.TechPendingRequestActivity;
import com.np.onei.utils.ApplicationController;

public class TechMainActivity extends AppCompatActivity implements PendingJobCompleteInterface {


    LinearLayout techjobListpending,completebtn,anlysisServicebtn,conatc;
    PendingJobCompleteRepositry PCRObj;
    ApplicationController obj;
    TextView cmpjob,penjob,techprofilebtn;
    ImageView logoutbtn;
    private android.content.SharedPreferences loginRememebr;
    private android.content.SharedPreferences.Editor rem;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.tech_home_activity);
        obj=(ApplicationController)getApplicationContext();
        cmpjob=(TextView)findViewById(R.id.cmpjob);
        penjob=(TextView)findViewById(R.id.penjob);
        techprofilebtn=(TextView)findViewById(R.id.techprofilebtn);
        logoutbtn=(ImageView) findViewById(R.id.logoutbtn);
        
        loginRememebr = getSharedPreferences(
                String.format("%s_preferences", getPackageName()),
                android.content.Context.MODE_PRIVATE);
        rem = loginRememebr.edit();

        PCRObj=new PendingJobCompleteRepositry(TechMainActivity.this, RetrofitRequrest.ProgressForDriver(TechMainActivity.this),this);
        PCRObj.getCompletePendingJobs(obj.getTuId());
        techjobListpending=(LinearLayout)findViewById(R.id.techjobListpending);
        anlysisServicebtn=(LinearLayout)findViewById(R.id.anlysisServicebtn);
        conatc=(LinearLayout)findViewById(R.id.conatc);
        completebtn=(LinearLayout)findViewById(R.id.completebtn);


        logoutbtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                rem.remove("saved_email");
                rem.remove("saved_password");
                rem.remove("user_type");
                rem.apply();
                startActivity(new Intent(TechMainActivity.this, TechLoginActivity.class));
                finish();
            }
        });
        conatc.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(TechMainActivity.this,ContactUsActivity.class));
            }
        });
        completebtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(TechMainActivity.this, TechCompletedRequestActivity.class));

            }
        });
        techprofilebtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(TechMainActivity.this, Profile_tech.class));

            }
        });
        techjobListpending.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(TechMainActivity.this, TechPendingRequestActivity.class));

            }
        });
        anlysisServicebtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(TechMainActivity.this, TechAcceptRequestActivity.class));

            }
        });
    }

    @Override
    public void PendingJobSuccess(String msg) {
        penjob.setText("Pending Job: "+msg);
    }

    @Override
    public void CompleteJobSuccess(String msg) {

        cmpjob.setText("Complete Job: "+msg);
    }

    @Override
    public void RequestForPayment(String amount) {

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
}