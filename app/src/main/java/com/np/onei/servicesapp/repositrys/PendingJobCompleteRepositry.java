package com.np.onei.servicesapp.repositrys;

import android.app.ProgressDialog;
import android.content.Context;

import com.np.onei.servicesapp.intfc.PendingJobCompleteInterface;
import com.np.onei.servicesapp.intfc.SignupInterface;
import com.np.onei.servicesapp.models.PendingJobCompleteJobWrapper;
import com.np.onei.servicesapp.models.SignupWrapper;
import com.np.onei.servicesapp.services.APIs;
import com.np.onei.utils.SingletonObjectAccess;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class PendingJobCompleteRepositry {

    Context cnt;
    ProgressDialog pd;
    PendingJobCompleteInterface SI;

    public PendingJobCompleteRepositry(Context cnt, ProgressDialog pd, PendingJobCompleteInterface SI) {
        this.cnt = cnt;
        this.pd = pd;
        this.SI = SI;
    }
    public void getCompletePendingJobs(String tid)
    {
        SI.RequestProgressShow(pd);
        APIs apiService = SingletonObjectAccess.getApiService();
        Call<PendingJobCompleteJobWrapper> call = apiService.getPendingCompleteJobs( tid);

        call.enqueue(new Callback<PendingJobCompleteJobWrapper>() {
            @Override
            public void onResponse(Call<PendingJobCompleteJobWrapper> call, Response<PendingJobCompleteJobWrapper> response) {
                SI.RequestProgressFinish(pd);
                SI.PendingJobSuccess(response.body().getResponse().get(0).getPendingJob());
                SI.CompleteJobSuccess(response.body().getResponse().get(0).getCompleteJob());
                if(response.body().getResponse().get(0).getStatus().equals("1"))
                {
                    SI.RequestForPayment(response.body().getResponse().get(0).getAmount());
                }
            }

            @Override
            public void onFailure(Call<PendingJobCompleteJobWrapper> call, Throwable t) {
                SI.RequestProgressFinish(pd);
            }
        });
    }
}
