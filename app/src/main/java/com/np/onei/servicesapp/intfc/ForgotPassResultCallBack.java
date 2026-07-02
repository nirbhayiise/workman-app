package com.np.onei.servicesapp.intfc;

import android.app.Dialog;
import android.content.Context;
import android.view.Window;

import com.np.onei.servicesapp.R;
import com.np.onei.utils.SingletonObjectAccess;

public interface ForgotPassResultCallBack {
    void forgotPasswordSuccess(String msg);
    void forgotPasswordError(String msg);

}
