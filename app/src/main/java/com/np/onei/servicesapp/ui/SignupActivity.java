package com.np.onei.servicesapp.ui;

import android.app.Dialog;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;

import android.text.method.HideReturnsTransformationMethod;
import android.text.method.PasswordTransformationMethod;
import android.view.View;
import android.view.Window;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.jaredrummler.materialspinner.MaterialSpinner;
import com.np.onei.servicesapp.MainActivity;
import com.np.onei.servicesapp.R;
import com.np.onei.servicesapp.intfc.CistyStateAbstract;
import com.np.onei.servicesapp.intfc.SignupInterface;
import com.np.onei.servicesapp.intfc.StateCityCallBack;
import com.np.onei.servicesapp.models.NGStateDatum;
import com.np.onei.servicesapp.repositrys.NGStateListRepository;
import com.np.onei.servicesapp.repositrys.SignupRepositry;
import com.np.onei.servicesapp.services.RetrofitRequrest;
import com.np.onei.utils.SingletonObjectAccess;

import java.util.ArrayList;
import java.util.List;

public class SignupActivity extends AppCompatActivity implements SignupInterface, StateCityCallBack {

    MaterialSpinner satetls;
    ArrayList<String> stateLsIDPRO;
    ArrayList<String>stateLsNamePRO;
    SignupRepositry SrepObj;
    EditText fname,lname,mob,adrs,mail,pas;
    Button sigup;
    CheckBox tmscondtcheck;
    TextView tc,alreadyreg;
    String stateSelected;
    EditText cty;
    ImageView show_pass_btn;


    public void ShowHidePass(View view){

        if(view.getId()==R.id.show_pass_btn){

            if(pas.getTransformationMethod().equals(PasswordTransformationMethod.getInstance())){
                show_pass_btn.setImageResource(R.drawable.show_ic);

                //Show Password
                pas.setTransformationMethod(HideReturnsTransformationMethod.getInstance());
            }
            else{
                ((ImageView)(view)).setImageResource(R.drawable.hide_ic);

                //Hide Password
                pas.setTransformationMethod(PasswordTransformationMethod.getInstance());

            }
        }
    }
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        stateLsNamePRO= new ArrayList<>();
        stateLsIDPRO= new ArrayList<>();
        SrepObj=new SignupRepositry(SignupActivity.this, RetrofitRequrest.ProgressForDriver(SignupActivity.this),this);        setContentView(R.layout.signup);
        NGStateListRepository.getInstatnce().getNgList(SignupActivity.this,this);
        satetls=(MaterialSpinner)findViewById(R.id.satetls);
        cty=(EditText) findViewById(R.id.cty);
        show_pass_btn=(ImageView) findViewById(R.id.show_pass_btn);

        sigup=(Button)findViewById(R.id.sigupbtn);
        fname=(EditText)findViewById(R.id.fname);
        lname=(EditText)findViewById(R.id.lname);
        mob=(EditText)findViewById(R.id.mob);
        adrs=(EditText)findViewById(R.id.adrs);
        mail=(EditText)findViewById(R.id.mail);
        pas=(EditText)findViewById(R.id.pas);
        tc=(TextView)findViewById(R.id.tc);
        alreadyreg=(TextView)findViewById(R.id.alreadyreg);

        tmscondtcheck=(CheckBox)findViewById(R.id.tmscondtcheck);

        satetls.setOnItemSelectedListener(new MaterialSpinner.OnItemSelectedListener() {
            @Override
            public void onItemSelected(MaterialSpinner view, int position, long id, Object item) {

                stateSelected= stateLsNamePRO.get(position);

            }
        });
        tc.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(SignupActivity.this,TermsActivity.class));
                finish();
            }
        });
        alreadyreg.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(SignupActivity.this,LoginActivity.class));
                finish();
            }
        });
        sigup.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                if(fname.getText().toString().isEmpty()){
                    Toast.makeText(SignupActivity.this, "Mandatory fields",
                            Toast.LENGTH_LONG).show();
                }
               else if(lname.getText().toString().isEmpty()){
                    Toast.makeText(SignupActivity.this, "Mandatory fields",
                            Toast.LENGTH_LONG).show();
                }
                else if(mob.getText().toString().isEmpty()){
                    Toast.makeText(SignupActivity.this, "Mandatory fields",
                            Toast.LENGTH_LONG).show();
                }
                else if(adrs.getText().toString().isEmpty()){
                    Toast.makeText(SignupActivity.this, "Mandatory fields",
                            Toast.LENGTH_LONG).show();
                }
                else if(mail.getText().toString().isEmpty()){
                    Toast.makeText(SignupActivity.this, "Mandatory fields",
                            Toast.LENGTH_LONG).show();
                }
                else if(pas.getText().toString().isEmpty()){
                    Toast.makeText(SignupActivity.this, "Mandatory fields",
                            Toast.LENGTH_LONG).show();
                }
                else if(!tmscondtcheck.isChecked()) {
                    Toast.makeText(SignupActivity.this, "Accepte terms conditions ",
                            Toast.LENGTH_LONG).show();
                }
                else {

                    SrepObj.invokedSignup(fname.getText().toString(), lname.getText().toString(), mob.getText().toString()
                            , adrs.getText().toString(), mail.getText().toString(), pas.getText().toString(),stateSelected,cty.getText().toString());
                }
            }
        });
    }

    @Override
    public void SingupSuccess(String msg) {

        Dialog dialog = SingletonObjectAccess.DialogObjectReturn(SignupActivity.this);
        dialog.requestWindowFeature(Window.FEATURE_NO_TITLE);
        dialog.setCancelable(false);
        dialog.setContentView(R.layout.successmsg_getusername);
        Button ok=(Button)dialog.findViewById(R.id.logn);
        TextView usname=(TextView)dialog.findViewById(R.id.usname);
        usname.setText("UserName: "+msg);
        ok.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(SignupActivity.this, LoginActivity.class));
                finish();
                dialog.dismiss();
            }
        });
        dialog.show();
       // Toast.makeText(SignupActivity.this,""+msg,Toast.LENGTH_LONG).show();

    }

    @Override
    public void SignupFailed(String msg) {
        Toast.makeText(SignupActivity.this,""+msg,Toast.LENGTH_LONG).show();
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
    public void StateListSuccess(List<NGStateDatum> data) {


        for(int i=0;i<data.size();i++) {
            stateLsNamePRO.add(data.get(i).getStatename());
            stateLsIDPRO.add(data.get(i).getSid());

        }

        ArrayAdapter<String> adapter = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_item, stateLsNamePRO);
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        satetls.setAdapter(adapter);
      //  Toast.makeText(this, ""+data.toArray(), Toast.LENGTH_SHORT).show();
    }

    @Override
    public void ErrorStateList() {

    }
}
