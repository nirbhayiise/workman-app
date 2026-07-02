package com.np.onei.servicesapp.intfc;

import android.app.ProgressDialog;

import com.np.onei.servicesapp.models.CLoginResponse;

import java.util.List;

public interface LoginInterface {
        void SingupSuccess(List<CLoginResponse> msg);
        void SignupFailed(String msg);
        void RequestProgressShow(ProgressDialog pd);
        void RequestProgressFinish(ProgressDialog pd);
}
