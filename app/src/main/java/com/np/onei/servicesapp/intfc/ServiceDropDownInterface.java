package com.np.onei.servicesapp.intfc;

import android.app.ProgressDialog;

import com.np.onei.servicesapp.models.ServiceDropDownItem;

import java.util.ArrayList;
import java.util.List;

public interface ServiceDropDownInterface {
    void Success(List<ServiceDropDownItem> sObj);

    void Failed(String msg);
    void RequestProgressShow(ProgressDialog pd);
    void RequestProgressFinish(ProgressDialog pd);

}
