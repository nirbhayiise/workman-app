package com.np.onei.servicesapp.repositrys;

import android.app.ProgressDialog;
import android.content.Context;

import com.np.onei.servicesapp.intfc.TechAcceptJobListInterface;
import com.np.onei.servicesapp.intfc.TechPendingJobListInterface;
import com.np.onei.servicesapp.models.TechAcceptJobListWrapper;
import com.np.onei.servicesapp.models.TechPendingJobListWrapper;
import com.np.onei.servicesapp.services.APIs;
import com.np.onei.utils.SingletonObjectAccess;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class TechAcceptJobListRepositry {

    Context cnt;
    ProgressDialog pd;
    TechAcceptJobListInterface SI;

    public TechAcceptJobListRepositry(Context cnt, ProgressDialog pd, TechAcceptJobListInterface SI) {
        this.cnt = cnt;
        this.pd = pd;
        this.SI = SI;
    }


    public void getSericeListNoonPID(String tid)
    {
        SI.RequestProgressShow(pd);
        APIs apiService = SingletonObjectAccess.getApiService();
        Call<TechAcceptJobListWrapper> call = apiService.getTechAcceptJobList(tid);
        call.enqueue(new Callback<TechAcceptJobListWrapper>() {
            @Override
            public void onResponse(Call<TechAcceptJobListWrapper> call, Response<TechAcceptJobListWrapper> response) {
                if(response.body().getResponse().getStatus().equals("1"))
                {

                    SI.getTechJobPendigSuccess(response.body().getResponse().getData());

                    SI.RequestProgressFinish(pd);
                }else
                {
                    SI.RequestProgressFinish(pd);
                    SI.SignupFailed(response.body().getResponse().getMessage());
                }
            }

            @Override
            public void onFailure(Call<TechAcceptJobListWrapper> call, Throwable t) {
                SI.RequestProgressFinish(pd);
                SI.SignupFailed(t.toString());
            }
        });
    }

    public void getSericeListNoonPIDCompleted(String tid)
    {
        SI.RequestProgressShow(pd);
        APIs apiService = SingletonObjectAccess.getApiService();
        Call<TechAcceptJobListWrapper> call = apiService.getTechCompletedJobList(tid);
        call.enqueue(new Callback<TechAcceptJobListWrapper>() {
            @Override
            public void onResponse(Call<TechAcceptJobListWrapper> call, Response<TechAcceptJobListWrapper> response) {
                if(response.body().getResponse().getStatus().equals("1"))
                {

                    SI.getTechJobPendigSuccess(response.body().getResponse().getData());

                    SI.RequestProgressFinish(pd);
                }else
                {
                    SI.RequestProgressFinish(pd);
                    SI.SignupFailed(response.body().getResponse().getMessage());
                }
            }

            @Override
            public void onFailure(Call<TechAcceptJobListWrapper> call, Throwable t) {
                SI.RequestProgressFinish(pd);
                SI.SignupFailed(t.toString());
            }
        });
    }
}
