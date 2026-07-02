package com.np.onei.servicesapp.ui;

import android.Manifest;
import android.app.Activity;
import android.app.Instrumentation;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.graphics.Bitmap;
import android.net.Uri;
import android.os.Bundle;

import android.os.Environment;
import android.provider.MediaStore;
import android.util.Log;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;


import androidx.activity.result.ActivityResult;
import androidx.activity.result.ActivityResultCallback;
import androidx.activity.result.ActivityResultLauncher;
import androidx.activity.result.contract.ActivityResultContracts;
import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;
import androidx.core.content.FileProvider;

import com.jaredrummler.materialspinner.MaterialSpinner;
import com.karumi.dexter.Dexter;
import com.karumi.dexter.MultiplePermissionsReport;
import com.karumi.dexter.PermissionToken;
import com.karumi.dexter.listener.DexterError;
import com.karumi.dexter.listener.PermissionRequest;
import com.karumi.dexter.listener.PermissionRequestErrorListener;
import com.karumi.dexter.listener.multi.MultiplePermissionsListener;
import com.np.onei.servicesapp.R;
import com.np.onei.servicesapp.intfc.EnqryInterface;
import com.np.onei.servicesapp.intfc.ProfessionalAreaInterface;
import com.np.onei.servicesapp.intfc.ServiceDropDownInterface;
import com.np.onei.servicesapp.intfc.UploadImageCallBack;
import com.np.onei.servicesapp.models.Professional_Item;
import com.np.onei.servicesapp.models.ServiceDropDownItem;
import com.np.onei.servicesapp.repositrys.EnqryRepositry;
import com.np.onei.servicesapp.repositrys.GETProfessionalDropdownRepositry;
import com.np.onei.servicesapp.repositrys.GETBusinessDropdownRepositry;
import com.np.onei.servicesapp.repositrys.GETServiceDropdownRepositry;
import com.np.onei.servicesapp.repositrys.UploadImageRepositry;
import com.np.onei.servicesapp.services.RetrofitRequrest;
import com.np.onei.utils.ApplicationController;
import com.np.onei.utils.CameraUtils;
import com.np.onei.utils.SingletonObjectAccess;
import com.squareup.picasso.Picasso;

import java.io.ByteArrayOutputStream;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.net.MalformedURLException;
import java.net.URISyntaxException;
import java.net.URL;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Date;
import java.util.List;

import okhttp3.MediaType;
import okhttp3.MultipartBody;
import okhttp3.RequestBody;

public class EnqryFormActivity extends AppCompatActivity implements ServiceDropDownInterface, EnqryInterface , ProfessionalAreaInterface, UploadImageCallBack {

    public static final int CAMERA_PERM_CODE = 101;
    public static final int CAMERA_REQUEST_CODE = 102;
    static final int REQUEST_CAPTURE_IMAGE = 100;
    String photo1Str="", photo2Str="";
    GETServiceDropdownRepositry SrepObj;
    EditText fname,mob,mail,dtails;
    Button eqrybtn;
    TextView headertxt;
    MaterialSpinner spinner,professionalLs;
    ArrayAdapter adapter;
    ArrayList<String>serviceLs;
    ArrayList<String>serviceLsID;
    ArrayList<String>professionalIDLs;
    UploadImageCallBack _this;
    ArrayList<String>professionalNameLs;
    String SelectedproferssionalId="";
    String SID="";
    EnqryRepositry ENQRObj;
    GETProfessionalDropdownRepositry PRObj;
    ApplicationController obj;
    private Uri selectedImage;
    String currentPhotoPath;
    ImageView bck,photo1,photo2;
    private static final int pic_id = 123;
    LinearLayout bck1,hdrlay;
    private String imgflg;
    private void openCameraIntent() {

        Intent pictureIntent = new Intent(
                MediaStore.ACTION_IMAGE_CAPTURE
        );
        if(pictureIntent.resolveActivity(EnqryFormActivity.this.getPackageManager()) != null) {
            startActivityForResult(pictureIntent,
                    REQUEST_CAPTURE_IMAGE);
        }
    }

    private File onCaptureImageResult(Intent data) {
        Bitmap thumbnail = (Bitmap) data.getExtras().get("data");
        ByteArrayOutputStream bytes = new ByteArrayOutputStream();
        thumbnail.compress(Bitmap.CompressFormat.JPEG, 90, bytes);

        File destination = new File(Environment.getExternalStorageDirectory(),
                System.currentTimeMillis() + ".jpg");

        FileOutputStream fo;
        try {
            destination.createNewFile();
            fo = new FileOutputStream(destination);
            fo.write(bytes.toByteArray());
            fo.close();
        } catch (FileNotFoundException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        }

        //photo1.setImageBitmap(thumbnail);
        return destination;
    }
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.enry_form);
        _this=this;
        obj=(ApplicationController)getApplicationContext();
        SrepObj=new GETServiceDropdownRepositry(EnqryFormActivity.this, RetrofitRequrest.ProgressForDriver(EnqryFormActivity.this),this);
        ENQRObj=new EnqryRepositry(EnqryFormActivity.this, RetrofitRequrest.ProgressForDriver(EnqryFormActivity.this),this);
        PRObj=new GETProfessionalDropdownRepositry(EnqryFormActivity.this, RetrofitRequrest.ProgressForDriver(EnqryFormActivity.this),this);

        photo1=(ImageView)findViewById(R.id.photo1);
        photo2=(ImageView)findViewById(R.id.photo2);
        bck=(ImageView)findViewById(R.id.bck);
        bck1=(LinearLayout) findViewById(R.id.bck1);
        hdrlay=(LinearLayout) findViewById(R.id.hdrlay);
        eqrybtn=(Button)findViewById(R.id.eqrybtn);
        fname=(EditText)findViewById(R.id.fname);
        mail=(EditText)findViewById(R.id.mail);
        mob=(EditText)findViewById(R.id.mob);
        dtails=(EditText)findViewById(R.id.dtails);
        headertxt=(TextView) findViewById(R.id.headertxtnew);


        if (ContextCompat.checkSelfPermission(this, Manifest.permission.WRITE_EXTERNAL_STORAGE) == PackageManager.PERMISSION_GRANTED) {
            // Do the file write
        } else {
            // Request permission from the user
            ActivityCompat.requestPermissions(this,
                    new String[] {
                            Manifest.permission.WRITE_EXTERNAL_STORAGE
                    }, 0);

        }

        photo1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                imgflg="1";
                verifyPermissions();



            }
        });
        photo2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                imgflg="2";
                verifyPermissions();




            }
        });
       /* photo2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                imgflg="2";
                Intent i = new Intent(Intent.ACTION_PICK, MediaStore.Images.Media.EXTERNAL_CONTENT_URI);
               launcher.launch(i);
            }
        });*/
        bck1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
                //Toast.makeText(EnqryFormActivity.this,"Hi",Toast.LENGTH_LONG).show();
            }
        });
        headertxt.setText("Service Request");

        bck.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
                //Toast.makeText(EnqryFormActivity.this,"Hello",Toast.LENGTH_LONG).show();
            }
        });

        fname.setText(obj.getcFirstName()+" "+obj.getcLastName());
        mail.setText(obj.getcMail());
        mob.setText(obj.getcPhone());
        spinner = (MaterialSpinner) findViewById(R.id.spinner);
        professionalLs = (MaterialSpinner) findViewById(R.id.professionalLs);

        PRObj.getProfessionalList();

        eqrybtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {


                ENQRObj.getEnqry(SelectedproferssionalId,SID,"0",obj.getuId(),dtails.getText().toString(),"1",fname.getText().toString(),mail.getText().toString(),mob.getText().toString(),photo1Str,photo2Str);
            }
        });
        professionalLs.setOnItemSelectedListener(new MaterialSpinner.OnItemSelectedListener() {
            @Override
            public void onItemSelected(MaterialSpinner view, int position, long id, Object item) {

                SelectedproferssionalId= professionalIDLs.get(position);
                SrepObj.getSericeList(SelectedproferssionalId);
            }
        });

        spinner.setOnItemSelectedListener(new MaterialSpinner.OnItemSelectedListener() {
            @Override
            public void onItemSelected(MaterialSpinner view, int position, long id, Object item) {
                SID= serviceLsID.get(position);
               // SelectedproferssionalId= professionalIDLs.get(position);
            }
        });
    }

    public Uri getImageUri(Context inContext, Bitmap inImage) {
        Bitmap OutImage = Bitmap.createScaledBitmap(inImage, 1000, 1000,true);
        String path = MediaStore.Images.Media.insertImage(inContext.getContentResolver(), OutImage, "Title", null);
        return Uri.parse(path);
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
        MultipartBody.Part body = MultipartBody.Part.createFormData("banner", file.getName(), requestFile);
        UploadImageRepositry.getInstance().UploadImage(body, cnt, this);
    }

    public void uploadBitmap(Bitmap bitmap, Context cnt) {
        File file = new File(cnt.getCacheDir(), "upload_cam_" + System.currentTimeMillis() + ".jpg");
        try {
            java.io.FileOutputStream outputStream = new java.io.FileOutputStream(file);
            bitmap.compress(Bitmap.CompressFormat.JPEG, 100, outputStream);
            outputStream.flush();
            outputStream.close();
        } catch (Exception e) {
            e.printStackTrace();
            android.widget.Toast.makeText(cnt, "Failed to save camera image", android.widget.Toast.LENGTH_SHORT).show();
            return;
        }
        RequestBody requestFile = RequestBody.create(MediaType.parse("image/jpeg"), file);
        MultipartBody.Part body = MultipartBody.Part.createFormData("banner", file.getName(), requestFile);
        UploadImageRepositry.getInstance().UploadImage(body, cnt, this);
    }

    public void uploadFileFromCamera(File file, String uid,Context cnt) {


        //creating a file
       // File file = new File(SingletonObjectAccess.getRealPathFromURI(fileUri,cnt));

        //creating request body for file
        RequestBody requestFile = RequestBody.create(null, file);

        MultipartBody.Part body = MultipartBody.Part.createFormData("banner", file.getName(), requestFile);

        UploadImageRepositry.getInstance().UploadImage(body, cnt, this);
    }

    @Override
    public void onActivityResult(int requestCode, int resultCode,
                                 Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if (requestCode == REQUEST_CAPTURE_IMAGE &&
                resultCode == RESULT_OK) {
            if (data != null && data.getExtras().get("data") != null) {
                Bitmap imageBitmap = (Bitmap) data.getExtras().get("data");
                if(imgflg.equals("1") && imageBitmap  != null) {
                    imgflg="1";
                    photo1.setImageBitmap(imageBitmap);
                    uploadBitmap(imageBitmap, EnqryFormActivity.this);
                }else{
                    imgflg="2";
                    photo2.setImageBitmap(imageBitmap);
                    uploadBitmap(imageBitmap, EnqryFormActivity.this);
                }
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
                        if(imgflg.equals("1")) {


                            if(imgflg.equals("1")) {

                                uploadFile(selectedImage, "1",EnqryFormActivity.this);
                            }else{

                                uploadFile(selectedImage, "1",EnqryFormActivity.this);

                            }

                            Picasso.with(EnqryFormActivity.this).load(selectedImage).into(photo1);
                        }else{

                            if(imgflg.equals("1")) {

                                uploadFile(selectedImage, "1",EnqryFormActivity.this);
                            }else{

                                uploadFile(selectedImage, "1",EnqryFormActivity.this);
                            }
                            Picasso.with(EnqryFormActivity.this).load(selectedImage).into(photo2);
                        }
                        //CropImage();
                        Toast.makeText(EnqryFormActivity.this, ""+selectedImage, Toast.LENGTH_SHORT).show();

                       // uploadFile(selectedImage, "1");

                    }
                }
            });

    private void verifyPermissions() {
        Dexter.withActivity(this)
                .withPermission(Manifest.permission.CAMERA)
                .withListener(new com.karumi.dexter.listener.single.PermissionListener() {
                    @Override
                    public void onPermissionGranted(com.karumi.dexter.listener.PermissionGrantedResponse response) {
                        showImageSourceDialog();
                    }

                    @Override
                    public void onPermissionDenied(com.karumi.dexter.listener.PermissionDeniedResponse response) {
                        if (response.isPermanentlyDenied()) {
                            Toast.makeText(EnqryFormActivity.this, "Camera permission permanently denied. Please enable in settings.", Toast.LENGTH_LONG).show();
                        } else {
                            Toast.makeText(EnqryFormActivity.this, "Camera permission is required.", Toast.LENGTH_SHORT).show();
                        }
                    }

                    @Override
                    public void onPermissionRationaleShouldBeShown(PermissionRequest permission, PermissionToken token) {
                        token.continuePermissionRequest();
                    }
                })
                .withErrorListener(new PermissionRequestErrorListener() {
                    @Override
                    public void onError(DexterError error) {
                        Toast.makeText(getApplicationContext(), "Error requesting permissions", Toast.LENGTH_SHORT).show();
                    }
                })
                .onSameThread()
                .check();
    }
    @Override
    public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults) {
        super.onRequestPermissionsResult(requestCode, permissions, grantResults);
        if (requestCode == CAMERA_PERM_CODE) {
            if (grantResults.length > 0 && grantResults[0] == PackageManager.PERMISSION_GRANTED) {
                showImageSourceDialog();
            } else {
                Toast.makeText(this, "Camera Permission is Required to Use camera.", Toast.LENGTH_SHORT).show();
            }
        }
    }

    private void showImageSourceDialog() {
        final CharSequence[] options = {"Take Photo", "Choose from Gallery", "Cancel"};
        AlertDialog.Builder builder = new AlertDialog.Builder(EnqryFormActivity.this);
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



    ActivityResultLauncher<Intent> launcher = registerForActivityResult(
            new ActivityResultContracts.StartActivityForResult(),
            new ActivityResultCallback<ActivityResult>() {
                @Override
                public void onActivityResult(ActivityResult result) {
                    if (result.getResultCode() == Activity.RESULT_OK) {
                        // There are no request codes
                        Intent data = result.getData();

                        selectedImage= data.getData();

                        if(imgflg.equals("1")) {
                            Picasso.with(EnqryFormActivity.this).load(selectedImage).into(photo1);
                        }else{
                            Picasso.with(EnqryFormActivity.this).load(selectedImage).into(photo2);
                        }
                        // photo1.setImageURI(Uri.parse(new File(String.valueOf(selectedImage)).toString()));
                        Toast.makeText(EnqryFormActivity.this, ""+selectedImage, Toast.LENGTH_SHORT).show();
                       // uploadVideo(selectedImage, AppData.getAppDataInstance(getActivity()).getuId(),AppData.getAppDataInstance(getActivity()).getqId(),AppData.getAppDataInstance(getActivity()).getsId(),AppData.getAppDataInstance(getActivity()).getQtype());

                    }
                }
            });



    @Override
    public void Success(List<ServiceDropDownItem> sObj) {
        serviceLsID= new ArrayList<>();
        serviceLs= new ArrayList<>();

        for(int i=0;i<sObj.size();i++) {
            serviceLs.add(sObj.get(i).getSName());
            serviceLsID.add(sObj.get(i).getSId());
        }
        ArrayAdapter<String> adapter = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_item, serviceLs);
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);

        spinner.setAdapter(adapter);

    }

    @Override
    public void Failed(String msg) {

    }

    @Override
    public void SingupSuccess(String msg) {
Toast.makeText(EnqryFormActivity.this,""+msg,Toast.LENGTH_LONG).show();
finish();
    }

    @Override
    public void SignupFailed(String msg) {
        Toast.makeText(EnqryFormActivity.this,""+msg,Toast.LENGTH_LONG).show();
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
    public void ProfessionalAreaList(List<Professional_Item> sObj) {

        professionalNameLs= new ArrayList<>();
        professionalIDLs= new ArrayList<>();
        for(int i=0;i<sObj.size();i++) {
            professionalNameLs.add(sObj.get(i).getProName());
            professionalIDLs.add(sObj.get(i).getProId());

        }
        ArrayAdapter<String> adapter = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_item, professionalNameLs);
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);

        professionalLs.setAdapter(adapter);
    }

    private void  requestMultiplePermissions(){
        Dexter.withActivity(this)
                .withPermissions(

                        Manifest.permission.WRITE_EXTERNAL_STORAGE,
                        Manifest.permission.READ_EXTERNAL_STORAGE,Manifest.permission.CAMERA,Manifest.permission.RECORD_AUDIO)
                .withListener(new MultiplePermissionsListener() {
                    @Override
                    public void onPermissionsChecked(MultiplePermissionsReport report) {
                        // check if all permissions are granted
                        if (report.areAllPermissionsGranted()) {
                            //  Toast.makeText(getApplicationContext(), "All permissions are granted by user!", Toast.LENGTH_SHORT).show();
                        }

                        // check for permanent denial of any permission
                        if (report.isAnyPermissionPermanentlyDenied()) {
                            // show alert dialog navigating to Settings

                        }
                    }

                    @Override
                    public void onPermissionRationaleShouldBeShown(List<PermissionRequest> permissions,
                                                                   PermissionToken token) {
                        token.continuePermissionRequest();
                    }
                }).
                withErrorListener(new PermissionRequestErrorListener() {
                    @Override
                    public void onError(DexterError error) {
                        Toast.makeText(getApplicationContext(), "Some Error! ", Toast.LENGTH_SHORT).show();
                    }
                })
                .onSameThread()
                .check();
    }

    @Override
    public void onUploadImageSuccess(String filename) {
        if ("1".equals(imgflg)) {
            photo1Str = filename;
        } else if ("2".equals(imgflg)) {
            photo2Str = filename;
        }
        Toast.makeText(EnqryFormActivity.this, "Uploaded: " + filename, Toast.LENGTH_SHORT).show();
    }

    @Override
    public void onUploadImageFailed(String msg) {
        Toast.makeText(EnqryFormActivity.this, ""+msg, Toast.LENGTH_SHORT).show();
    }
}
