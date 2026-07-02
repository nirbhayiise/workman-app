package com.np.onei.utils;

import android.app.Dialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.database.Cursor;
import android.graphics.Bitmap;
import android.location.Address;
import android.location.Geocoder;
import android.net.ConnectivityManager;
import android.net.Uri;
import android.provider.MediaStore;
import android.util.Log;

import androidx.loader.content.CursorLoader;


import com.google.gson.Gson;
import com.google.gson.GsonBuilder;
import com.np.onei.servicesapp.services.APIs;
import com.np.onei.servicesapp.ui.SignupActivity;

import java.io.ByteArrayOutputStream;
import java.util.HashMap;
import java.util.List;
import java.util.Locale;

import okhttp3.OkHttpClient;
import okhttp3.logging.HttpLoggingInterceptor;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;



/**
 * Created on : dec 25, 2019
 * Author     : nirbhay
 */
public class SingletonObjectAccess {

    private static Retrofit retrofit = null;
    private static Intent intentObject = null;
    private static ProgressDialog pdObject = null;
    private static ApplicationController publicObject=null;
    private static Dialog DialogObject=null;

   // public static FusedLocationProviderClient mFusedLocationClient;
    private static HashMap<String, String> param = null;
   private SingletonObjectAccess()
    {

    }
    public static Uri getImageUri(Context inContext, Bitmap inImage) {
        ByteArrayOutputStream bytes = new ByteArrayOutputStream();
        inImage.compress(Bitmap.CompressFormat.JPEG, 100, bytes);
        String path = MediaStore.Images.Media.insertImage(inContext.getContentResolver(), inImage, "Title", null);
        //Uri path = Uri.parse(MediaStore.Images.Media.insertImage(inContext.getContentResolver(), inImage, null, null));
        return Uri.parse(path);
    }
    public static Uri getImageUriCamera(Context inContext, Bitmap inImage) {
        ByteArrayOutputStream bytes = new ByteArrayOutputStream();
        inImage.compress(Bitmap.CompressFormat.JPEG, 100, bytes);
        //String path = MediaStore.Images.Media.insertImage(inContext.getContentResolver(), inImage, "Title", null);
        Uri path = Uri.parse(MediaStore.Images.Media.insertImage(inContext.getContentResolver(), inImage, null, null));
        return path;
    }
    public static String getRealPathFromURI(Uri contentUri,Context cntt) {
        String[] proj = {MediaStore.Images.Media.DATA};
        CursorLoader loader = new CursorLoader(cntt, contentUri, proj, null, null, null);
        Cursor cursor = loader.loadInBackground();
        int column_index = cursor.getColumnIndexOrThrow(MediaStore.Images.Media.DATA);
        cursor.moveToFirst();
        String result = cursor.getString(column_index);
        cursor.close();
        return result;
    }
    public static Dialog DialogObjectReturn(Context cnt)
    {
        if(DialogObject==null)
        {
            DialogObject = new Dialog(cnt);
        }
        return DialogObject;
    }

   /* public static FusedLocationProviderClient fuseAPIinit(Context cnt)
    {
        mFusedLocationClient = LocationServices.getFusedLocationProviderClient(cnt);
        return mFusedLocationClient;
    }*/
   public static APIs getApiService() {

       if (retrofit == null) {

           HttpLoggingInterceptor interceptor = new HttpLoggingInterceptor();
           interceptor.setLevel(HttpLoggingInterceptor.Level.BODY);

           OkHttpClient client = new OkHttpClient.Builder()
                   .addInterceptor(interceptor)
                   .build();

           Gson gson = new GsonBuilder()
                   .setLenient()
                   .create();

           retrofit = new Retrofit.Builder()
                   .baseUrl(Const.BASE_URL)
                   .client(client)   // Important
                   .addConverterFactory(GsonConverterFactory.create(gson))
                   .build();
       }

       return retrofit.create(APIs.class);
   }
    public static ProgressDialog ProgressForParents(Context cnt)
    {
        if(pdObject==null) {
            return new ProgressDialog(cnt);
        }
        return pdObject;
    }
    public static Intent createActivityInstance(Context cnt,Class targetclass)
    {
        if(intentObject==null) {
            return new Intent(cnt, targetclass);
        }else {
            return intentObject;
        }
    }
    public static ApplicationController getGlobleOblect(Context cnt)
    {
        return (ApplicationController)cnt.getApplicationContext();
    }

    public static HashMap<String,String> getParam()
    {
        if(param==null)
        {
            return   param=new HashMap<String,String>();
        }
        else{
            return param;
        }
    }
    public static String getCompleteAddressString(Context cnt,double LATITUDE, double LONGITUDE) {
        String strAdd = "";
        Geocoder geocoder = new Geocoder(cnt, Locale.getDefault());
        try {
            List<Address> addresses = geocoder.getFromLocation(LATITUDE, LONGITUDE, 1);
            if (addresses != null) {
                Address returnedAddress = addresses.get(0);
                StringBuilder strReturnedAddress = new StringBuilder("");

                for (int i = 0; i <= returnedAddress.getMaxAddressLineIndex(); i++) {
                    strReturnedAddress.append(returnedAddress.getAddressLine(i)).append("\n");
                }
                strAdd = strReturnedAddress.toString();
              //  Log.w("My Current loction address", strReturnedAddress.toString());
            } else {
              //  Log.w("My Current loction address", "No Address returned!");
            }
        } catch (Exception e) {
            e.printStackTrace();
           // Log.w("My Current loction address", "Canont get Address!");
        }
        return strAdd;
    }
    public static boolean isNetworkConnected(Context cnt) {
        ConnectivityManager cm = (ConnectivityManager)cnt.getSystemService(Context.CONNECTIVITY_SERVICE);

        return cm.getActiveNetworkInfo() != null && cm.getActiveNetworkInfo().isConnected();
    }


    public static SharedPreferences getShareprefObject(Context cnt)
    {
        SharedPreferences  sharedpreferences = cnt.getSharedPreferences("thelewala", Context.MODE_PRIVATE);
        return sharedpreferences;
    }
    public static SharedPreferences.Editor getPutVal(Context ct)
    {
        SharedPreferences.Editor editor = getShareprefObject(ct).edit();
        return editor;
    }
}
