package com.np.onei.servicesapp.repositrys;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;

import com.np.onei.servicesapp.intfc.MakePayInterface;
import com.np.onei.servicesapp.intfc.PendingJobCompleteInterface;
import com.np.onei.servicesapp.models.MakePayWrapper;
import com.np.onei.servicesapp.models.PendingJobCompleteJobWrapper;
import com.np.onei.servicesapp.services.APIs;
import com.np.onei.servicesapp.ui.SatisfyActivity;
import com.np.onei.utils.SingletonObjectAccess;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class MakePaymentRepositry {

    Context cnt;
    ProgressDialog pd;
    MakePayInterface SI;

    public MakePaymentRepositry(Context cnt, ProgressDialog pd, MakePayInterface SI) {
        this.cnt = cnt;
        this.pd = pd;
        this.SI = SI;
    }
    public void getCompletePendingJobs(String tid)
    {
       // SI.RequestProgressShow(pd);
        APIs apiService = SingletonObjectAccess.getApiService();
        Call<MakePayWrapper> call = apiService.makepay( tid);

        call.enqueue(new Callback<MakePayWrapper>() {
            @Override
            public void onResponse(Call<MakePayWrapper> call, Response<MakePayWrapper> response) {
               // SI.RequestProgressFinish(pd);

                if(response.body().getResponse().get(0).getStatus().equals("1"))
                {
                    SI.PaySuccess(response.body().getResponse().get(0).getAmount(),response.body().getResponse().get(0).getEid(),response.body().getResponse().get(0).getService_amount(),""+response.body().getResponse().get(0).getComplete_task_feedbck_status());
                }else{
                    SI.PayFailed("No due Payment!");
                }
                /*else if(response.body().getResponse().get(0).getStatus().equals("1") && response.body().getResponse().get(0).getComplete_task_feedbck_status()==0) {
                    cnt.startActivity(new Intent(cnt,SatisfyActivity.class));
                }*/
            }

            @Override
            public void onFailure(Call<MakePayWrapper> call, Throwable t) {
                SI.RequestProgressFinish(pd);
            }
        });
    }
}
