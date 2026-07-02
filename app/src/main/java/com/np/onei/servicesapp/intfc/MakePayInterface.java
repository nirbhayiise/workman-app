package com.np.onei.servicesapp.intfc;

import android.app.ProgressDialog;

import com.np.onei.servicesapp.models.TechPendingListItems;

import java.util.List;

public interface MakePayInterface {
    void PaySuccess(String amount,String rid,String serviceCharges,String paystatusCurrect);
    void PayFailed(String msg);
    void RequestProgressShow(ProgressDialog pd);
    void RequestProgressFinish(ProgressDialog pd);
}
