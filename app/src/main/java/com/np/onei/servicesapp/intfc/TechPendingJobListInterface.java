package com.np.onei.servicesapp.intfc;

import android.app.ProgressDialog;

import com.np.onei.servicesapp.models.Professional_Item;
import com.np.onei.servicesapp.models.TechPendingListItems;

import java.util.List;

public interface TechPendingJobListInterface {
    void getTechJobPendigSuccess(List<TechPendingListItems> msg);

    void SignupFailed(String msg);
    void RequestProgressShow(ProgressDialog pd);
    void RequestProgressFinish(ProgressDialog pd);
}
