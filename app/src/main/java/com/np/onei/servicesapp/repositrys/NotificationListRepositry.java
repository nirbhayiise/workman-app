package com.np.onei.servicesapp.repositrys;

import android.app.ProgressDialog;
import android.content.Context;

import com.np.onei.servicesapp.intfc.FaultListInterface;
import com.np.onei.servicesapp.intfc.NotifyListInterface;
import com.np.onei.servicesapp.models.FaultListWrapper;
import com.np.onei.servicesapp.models.NotificationListWrapper;
import com.np.onei.servicesapp.services.APIs;
import com.np.onei.utils.SingletonObjectAccess;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class NotificationListRepositry {


    Context cnt;
    ProgressDialog pd;
    NotifyListInterface LI;

    public NotificationListRepositry(Context cnt, ProgressDialog pd, NotifyListInterface LI) {
        this.cnt = cnt;
        this.pd = pd;
        this.LI = LI;
    }
    public void getListNotifiaction()
    {
        LI.RequestProgressFinish(pd);
        APIs apiservice= SingletonObjectAccess.getApiService();
        Call<NotificationListWrapper> call=apiservice.getNotificationList();
        call.enqueue(new Callback<NotificationListWrapper>() {
            @Override
            public void onResponse(Call<NotificationListWrapper> call, Response<NotificationListWrapper> response) {

                LI.RequestProgressFinish(pd);
                LI.NotifyListSuccess(response.body().getResponse().getData());
            }

            @Override
            public void onFailure(Call<NotificationListWrapper> call, Throwable t) {
                LI.RequestProgressFinish(pd);
            }
        });

    }

}
