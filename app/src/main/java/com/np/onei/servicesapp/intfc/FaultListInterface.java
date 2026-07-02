package com.np.onei.servicesapp.intfc;

import android.app.ProgressDialog;

import com.np.onei.servicesapp.models.FaultListItems;
import com.np.onei.servicesapp.models.TechPendingListItems;

import java.util.List;

public interface FaultListInterface {
    void faultListSuccess(List<FaultListItems> msg);

    void faultListFailed(String msg);
    void RequestProgressShow(ProgressDialog pd);
    void RequestProgressFinish(ProgressDialog pd);
}
