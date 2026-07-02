package com.np.onei.servicesapp.intfc;

import android.app.ProgressDialog;

import com.np.onei.servicesapp.models.HistoryUserItemsDatum;
import com.np.onei.servicesapp.models.NotificationListItems;

import java.util.List;

public interface NotifyListInterface {
    void NotifyListSuccess(List<NotificationListItems> msg);


    void RequestProgressShow(ProgressDialog pd);
    void RequestProgressFinish(ProgressDialog pd);
}
