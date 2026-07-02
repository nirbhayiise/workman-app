package com.np.onei.servicesapp.intfc;

import android.app.ProgressDialog;

import com.np.onei.servicesapp.models.TechAcceptListItems;
import com.np.onei.servicesapp.models.TechPendingListItems;

import java.util.List;

public interface TechAcceptJobListInterface {
    void getTechJobPendigSuccess(List<TechAcceptListItems> msg);

    void SignupFailed(String msg);
    void RequestProgressShow(ProgressDialog pd);
    void RequestProgressFinish(ProgressDialog pd);
}
