package com.np.onei.servicesapp.intfc;

import android.app.ProgressDialog;

public interface PayDoneInterface {
    void PaySuccess(String msg);
    void PayFailed(String msg);
    void RequestProgressShow(ProgressDialog pd);
    void RequestProgressFinish(ProgressDialog pd);

}
