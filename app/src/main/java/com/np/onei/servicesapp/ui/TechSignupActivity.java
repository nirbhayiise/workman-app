package com.np.onei.servicesapp.ui;

import android.Manifest;
import android.app.Dialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.graphics.Bitmap;
import android.media.Image;
import android.net.Uri;
import android.os.Bundle;

import android.provider.MediaStore;
import android.text.method.HideReturnsTransformationMethod;
import android.text.method.PasswordTransformationMethod;
import android.view.View;
import android.view.Window;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.activity.result.ActivityResult;
import androidx.activity.result.ActivityResultCallback;
import androidx.activity.result.ActivityResultLauncher;
import androidx.activity.result.contract.ActivityResultContracts;
import androidx.annotation.NonNull;
import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;

import com.jaredrummler.materialspinner.MaterialSpinner;
import com.karumi.dexter.Dexter;
import com.karumi.dexter.PermissionToken;
import com.karumi.dexter.listener.PermissionRequest;
import com.np.onei.servicesapp.MainActivity;
import com.np.onei.servicesapp.R;
import com.np.onei.servicesapp.TechMainActivity;
import com.np.onei.servicesapp.intfc.BusinessInterface;
import com.np.onei.servicesapp.intfc.ProfessionalAreaInterface;
import com.np.onei.servicesapp.intfc.SignupInterface;
import com.np.onei.servicesapp.intfc.UploadImageCallBack;
import com.np.onei.servicesapp.models.BusinessItems;
import com.np.onei.servicesapp.models.Professional_Item;
import com.np.onei.servicesapp.repositrys.GETBusinessDropdownRepositry;
import com.np.onei.servicesapp.repositrys.GETProfessionalDropdownRepositry;
import com.np.onei.servicesapp.repositrys.SignupRepositry;
import com.np.onei.servicesapp.repositrys.TLoginRepositry;
import com.np.onei.servicesapp.repositrys.TechnicianSignupRepositry;
import com.np.onei.servicesapp.repositrys.UploadImageRepositry;
import com.np.onei.servicesapp.services.RetrofitRequrest;
import com.np.onei.utils.SingletonObjectAccess;
import com.squareup.picasso.Picasso;

import java.io.File;
import java.util.ArrayList;
import java.util.List;

import de.hdodenhof.circleimageview.CircleImageView;
import okhttp3.MediaType;
import okhttp3.MultipartBody;
import okhttp3.RequestBody;

public class TechSignupActivity extends AppCompatActivity implements ProfessionalAreaInterface, BusinessInterface, SignupInterface , UploadImageCallBack {

    private Uri selectedImage;
    ArrayList<String> serviceLsIDPRO;
    ArrayList<String>serviceLsNamePRO;
    String SelectedSIdPRO;
    ArrayList<String> serviceLsIDBus;
    ArrayList<String>serviceLsNameBus;
    String SelectedSIdBus;
    Button sigup;
    MaterialSpinner professionalLs,BusinessList;
    GETProfessionalDropdownRepositry PRObj;
    GETBusinessDropdownRepositry BRObj;
    TechnicianSignupRepositry TSRObj;
    EditText fname,lname,mob,adrs,mail,pas;
    TextView alreadyregtech;
    CircleImageView photo1;
    String profilepicURI="default.png";
    ImageView show_pass_btn;


    public void ShowHidePass(View view){

        if(view.getId()==R.id.show_pass_btn){

            if(pas.getTransformationMethod().equals(PasswordTransformationMethod.getInstance())){
                show_pass_btn.setImageResource(R.drawable.hide_ic);

                //Show Password
                pas.setTransformationMethod(HideReturnsTransformationMethod.getInstance());
            }
            else{
                ((ImageView)(view)).setImageResource(R.drawable.show_ic);

                //Hide Password
                pas.setTransformationMethod(PasswordTransformationMethod.getInstance());

            }
        }
    }
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.tech_signup);

        sigup=(Button)findViewById(R.id.sigup);
        show_pass_btn=(ImageView) findViewById(R.id.show_pass_btn);

        photo1=(CircleImageView)findViewById(R.id.photo1);
        fname=(EditText)findViewById(R.id.fname);
        lname=(EditText)findViewById(R.id.lname);
        mob=(EditText)findViewById(R.id.mob);
        adrs=(EditText)findViewById(R.id.adrs);
        mail=(EditText)findViewById(R.id.mail);
        pas=(EditText)findViewById(R.id.pas);
        alreadyregtech=(TextView)findViewById(R.id.alreadyregtech);
        professionalLs = (MaterialSpinner) findViewById(R.id.professionalLs);
        BusinessList = (MaterialSpinner) findViewById(R.id.BusinessList);
        PRObj=new GETProfessionalDropdownRepositry(TechSignupActivity.this, RetrofitRequrest.ProgressForDriver(TechSignupActivity.this),this);
        BRObj=new GETBusinessDropdownRepositry(TechSignupActivity.this, RetrofitRequrest.ProgressForDriver(TechSignupActivity.this),this);
        TSRObj=new TechnicianSignupRepositry(TechSignupActivity.this, RetrofitRequrest.ProgressForDriver(TechSignupActivity.this),this);
        PRObj.getProfessionalList();

        photo1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                verifyPermissions();



            }
        });
        sigup.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                TSRObj.TechinvokedSignup(SelectedSIdBus,SelectedSIdPRO,fname.getText().toString(),lname.getText().toString(),mob.getText().toString()
                        ,adrs.getText().toString(),mail.getText().toString(),pas.getText().toString(),profilepicURI);

            }
        });
        alreadyregtech.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(TechSignupActivity.this,TechLoginActivity.class));
                finish();
            }
        });
        professionalLs.setOnItemSelectedListener(new MaterialSpinner.OnItemSelectedListener() {
            @Override
            public void onItemSelected(MaterialSpinner view, int position, long id, Object item) {

                SelectedSIdPRO= serviceLsIDPRO.get(position);

            }
        });
        BusinessList.setOnItemSelectedListener(new MaterialSpinner.OnItemSelectedListener() {
            @Override
            public void onItemSelected(MaterialSpinner view, int position, long id, Object item) {

                SelectedSIdBus= serviceLsIDBus.get(position);

            }
        });
    }

    private void verifyPermissions() {
        Dexter.withActivity(this)
                .withPermission(Manifest.permission.CAMERA)
                .withListener(new com.karumi.dexter.listener.single.PermissionListener() {
                    @Override
                    public void onPermissionGranted(com.karumi.dexter.listener.PermissionGrantedResponse response) {
                        final CharSequence[] options = {"Take Photo", "Choose from Gallery", "Cancel"};
                        AlertDialog.Builder builder = new AlertDialog.Builder(TechSignupActivity.this);
                        builder.setTitle("Add Photo!");
                        builder.setItems(options, new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialog, int item) {
                                if (options[item].equals("Take Photo")) {
                                    try {
                                        openCameraIntent();
                                    } catch (Exception e) {
                                        e.printStackTrace();
                                    }
                                } else if (options[item].equals("Choose from Gallery")) {
                                    Intent intent = new Intent(Intent.ACTION_PICK, android.provider.MediaStore.Images.Media.EXTERNAL_CONTENT_URI);
                                    someActivityResultLauncher.launch(intent);
                                } else if (options[item].equals("Cancel")) {
                                    dialog.dismiss();
                                }
                            }
                        });
                        builder.show();
                    }

                    @Override
                    public void onPermissionDenied(com.karumi.dexter.listener.PermissionDeniedResponse response) {
                        if (response.isPermanentlyDenied()) {
                            Toast.makeText(TechSignupActivity.this, "Camera permission permanently denied. Please enable in settings.", Toast.LENGTH_LONG).show();
                        } else {
                            Toast.makeText(TechSignupActivity.this, "Camera permission is required.", Toast.LENGTH_SHORT).show();
                        }
                    }

                    @Override
                    public void onPermissionRationaleShouldBeShown(PermissionRequest permission, PermissionToken token) {
                        token.continuePermissionRequest();
                    }
                })
                .check();
    }
    private void openCameraIntent() {
        Intent pictureIntent = new Intent(
                MediaStore.ACTION_IMAGE_CAPTURE
        );
        if(pictureIntent.resolveActivity(TechSignupActivity.this.getPackageManager()) != null) {
            startActivityForResult(pictureIntent,
                    EnqryFormActivity.REQUEST_CAPTURE_IMAGE);
        }
    }
    @Override
    public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults) {
        super.onRequestPermissionsResult(requestCode, permissions, grantResults);
        if (requestCode == EnqryFormActivity.CAMERA_PERM_CODE) {
            if (grantResults.length > 0 && grantResults[0] == PackageManager.PERMISSION_GRANTED) {

                final CharSequence[] options = {"Take Photo", "Choose from Gallery", "Cancel"};
                AlertDialog.Builder builder = new AlertDialog.Builder(TechSignupActivity.this);
                builder.setTitle("Add Photo!");
                builder.setItems(options, new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int item) {
                        if (options[item].equals("Take Photo")) {
                            try {
                                openCameraIntent();

                            } catch (Exception e) {
                                e.printStackTrace();
                            }

                        } else if (options[item].equals("Choose from Gallery")) {
                            Intent intent = new Intent(Intent.ACTION_PICK, android.provider.MediaStore.Images.Media.EXTERNAL_CONTENT_URI);
                            someActivityResultLauncher.launch(intent);
                        } else if (options[item].equals("Cancel")) {
                            dialog.dismiss();
                        }
                    }
                });
                builder.show();
            } else {
                Toast.makeText(this, "Camera Permission is Required to Use camera.", Toast.LENGTH_SHORT).show();
            }
        }
    }

    public void uploadFile(Uri fileUri, String uid, Context cnt) {
        File file = new File(cnt.getCacheDir(), "upload_" + System.currentTimeMillis() + ".jpg");
        try {
            Bitmap bitmap = MediaStore.Images.Media.getBitmap(cnt.getContentResolver(), fileUri);
            java.io.FileOutputStream outputStream = new java.io.FileOutputStream(file);
            bitmap.compress(Bitmap.CompressFormat.JPEG, 40, outputStream);
            outputStream.close();
        } catch (Exception e) {
            e.printStackTrace();
            android.widget.Toast.makeText(cnt, "Failed to process image", android.widget.Toast.LENGTH_SHORT).show();
            return;
        }

        String mimeType = cnt.getContentResolver().getType(fileUri);
        if (mimeType == null) mimeType = "image/jpeg";

        RequestBody requestFile = RequestBody.create(MediaType.parse(mimeType), file);
        MultipartBody.Part body = MultipartBody.Part.createFormData("item_image", file.getName(), requestFile);
        UploadImageRepositry.getInstance().UploadImage(body, cnt, this);
    }
    @Override
    public void onActivityResult(int requestCode, int resultCode,
                                 Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if (requestCode == EnqryFormActivity.REQUEST_CAPTURE_IMAGE &&
                resultCode == RESULT_OK) {
            if (data != null && data.getExtras() != null) {
                Bitmap imageBitmap = (Bitmap) data.getExtras().get("data");
                photo1.setImageBitmap(imageBitmap);
                selectedImage=SingletonObjectAccess.getImageUri(TechSignupActivity.this,imageBitmap);
                uploadFile(selectedImage, "1",TechSignupActivity.this);

            }
        }
    }
    ActivityResultLauncher<Intent> someActivityResultLauncher = registerForActivityResult(
            new ActivityResultContracts.StartActivityForResult(),
            new ActivityResultCallback<ActivityResult>() {
                @Override
                public void onActivityResult(ActivityResult result) {
                    if (result.getResultCode() == RESULT_OK) {
                        // There are no request codes
                        Intent data = result.getData();
                        selectedImage = data.getData();


                    }
                }
            });
    @Override
    public void ProfessionalAreaList(List<Professional_Item> sObj) {

        serviceLsNamePRO= new ArrayList<>();
        serviceLsIDPRO= new ArrayList<>();
        for(int i=0;i<sObj.size();i++) {
            serviceLsNamePRO.add(sObj.get(i).getProName());
            serviceLsIDPRO.add(sObj.get(i).getProId());

        }
        ArrayAdapter<String> adapter = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_item, serviceLsNamePRO);
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);

        professionalLs.setAdapter(adapter);
        BRObj.getSericeListNoonPID();
    }

    @Override
    public void BusinessNameList(List<BusinessItems> sObj) {


        serviceLsNameBus= new ArrayList<>();
        serviceLsIDBus= new ArrayList<>();
        for(int i=0;i<sObj.size();i++) {
            serviceLsNameBus.add(sObj.get(i).getBName());
            serviceLsIDBus.add(sObj.get(i).getBId());


        }
        ArrayAdapter<String> adapter = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_item, serviceLsNameBus);
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);

        BusinessList.setAdapter(adapter);
    }

    @Override
    public void SingupSuccess(String msg) {
        final Dialog dialog = new Dialog(TechSignupActivity.this);
        dialog.requestWindowFeature(Window.FEATURE_NO_TITLE);
        dialog.setCancelable(false);
        dialog.setContentView(R.layout.successmsg_getusername);
        Button ok=(Button)dialog.findViewById(R.id.logn);
        TextView usname=(TextView)dialog.findViewById(R.id.usname);
        usname.setText("Your UserName: "+msg);
        ok.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(TechSignupActivity.this, TechLoginActivity.class));
                finish();
                dialog.dismiss();
            }
        });
        dialog.show();
        Toast.makeText(TechSignupActivity.this,""+msg,Toast.LENGTH_LONG).show();
    }

    @Override
    public void SignupFailed(String msg) {
        Toast.makeText(TechSignupActivity.this,""+msg,Toast.LENGTH_LONG).show();
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
    public void onUploadImageSuccess(String filename) {
        profilepicURI=filename;
        Toast.makeText(this, ""+filename, Toast.LENGTH_SHORT).show();
    }

    @Override
    public void onUploadImageFailed(String msg) {
        profilepicURI="default.png";
        Toast.makeText(this, ""+msg, Toast.LENGTH_SHORT).show();
    }
}
