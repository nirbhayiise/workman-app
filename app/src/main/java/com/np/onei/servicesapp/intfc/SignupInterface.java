package com.np.onei.servicesapp.intfc;

import android.app.ProgressDialog;
import android.content.Context;

public interface SignupInterface {
    void SingupSuccess(String msg);
    void SignupFailed(String msg);
    void RequestProgressShow(ProgressDialog pd);
    void RequestProgressFinish(ProgressDialog pd);

}
