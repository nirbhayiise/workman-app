package com.np.onei.servicesapp.intfc;

import android.app.ProgressDialog;

public interface PendingJobCompleteInterface {
    void PendingJobSuccess(String msg);
    void CompleteJobSuccess(String msg);
    void RequestForPayment(String amount);
    void RequestProgressShow(ProgressDialog pd);
    void RequestProgressFinish(ProgressDialog pd);

}
