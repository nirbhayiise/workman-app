package com.np.onei.servicesapp.repositrys;

import android.app.ProgressDialog;
import android.content.Context;


import com.np.onei.servicesapp.intfc.UploadImageCallBack;
import com.np.onei.servicesapp.models.UploadImageWrapper;
import com.np.onei.servicesapp.services.APIs;
import com.np.onei.utils.SingletonObjectAccess;

import okhttp3.MultipartBody;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;


public class UploadImageRepositry {
    public static UploadImageRepositry _object=null;
    public static UploadImageRepositry getInstance(){
        if (_object==null)
        {
            _object=new UploadImageRepositry();
        }
        return _object;
    }

    private UploadImageRepositry() {


    }
    public void UploadImage(MultipartBody.Part body,  Context cnt, UploadImageCallBack uploadcall){
       ProgressDialog pd=new ProgressDialog(cnt);
        pd.setMessage("Please wait Image Uploading...");
        pd.setCancelable(false);
        pd.show();
        APIs apiService = SingletonObjectAccess.getApiService();
        Call<okhttp3.ResponseBody> call = apiService.updateProfileRetrofit(body);
        call.enqueue(new Callback<okhttp3.ResponseBody>() {
            @Override
            public void onResponse(Call<okhttp3.ResponseBody> call, Response<okhttp3.ResponseBody> response) {
                pd.dismiss();
                if (response.isSuccessful() && response.body() != null) {
                    try {
                        String jsonString = response.body().string();
                        org.json.JSONObject jsonObject = new org.json.JSONObject(jsonString);
                        String status = jsonObject.optString("status", "");
                        if ("1".equals(status)) {
                            String fn = jsonObject.optString("filename", "");
                            if (fn.isEmpty()) fn = jsonObject.optString("success", "");
                            if (fn.isEmpty()) fn = jsonObject.optString("message", "");
                            if (fn.isEmpty()) fn = jsonObject.optString("file_name", "");
                            if (fn.isEmpty()) fn = jsonObject.optString("image", "");
                            if (fn.isEmpty()) fn = jsonObject.optString("url", "");
                            if (fn.isEmpty()) fn = jsonObject.optString("path", "");
                            if (fn.isEmpty()) fn = jsonObject.optString("data", "");
                            if (fn.isEmpty()) fn = jsonString; // Ultimate fallback: return entire JSON so user can see it!
                            uploadcall.onUploadImageSuccess(fn);
                        } else {
                            uploadcall.onUploadImageFailed(jsonObject.optString("message", "Error"));
                        }
                    } catch (Exception e) {
                        uploadcall.onUploadImageFailed("Parse error: " + e.getMessage());
                    }
                } else {
                    uploadcall.onUploadImageFailed("Upload failed. Server error or invalid response");
                }
            }

            @Override
            public void onFailure(Call<okhttp3.ResponseBody> call, Throwable t) {
                pd.dismiss();
                uploadcall.onUploadImageFailed("Something went wrong"+t.toString());
            }
        });
    }



}
