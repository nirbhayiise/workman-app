package com.np.onei.servicesapp.intfc;

public interface UploadImageCallBack {
    void onUploadImageSuccess(String filename);
    void onUploadImageFailed(String msg);
}
