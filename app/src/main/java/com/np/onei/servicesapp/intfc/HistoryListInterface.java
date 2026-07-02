package com.np.onei.servicesapp.intfc;

import android.app.ProgressDialog;

import com.np.onei.servicesapp.models.FaultListItems;
import com.np.onei.servicesapp.models.HistoryUserItemsDatum;

import java.util.List;

public interface HistoryListInterface {
    void HistoryListSuccess(List<HistoryUserItemsDatum> msg);


    void RequestProgressShow(ProgressDialog pd);
    void RequestProgressFinish(ProgressDialog pd);
}
