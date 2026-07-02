package com.np.onei.servicesapp.repositrys;

import android.app.ProgressDialog;
import android.content.Context;

import com.np.onei.servicesapp.intfc.BusinessInterface;
import com.np.onei.servicesapp.intfc.TechPendingJobListInterface;
import com.np.onei.servicesapp.models.BusinessListDwapper;
import com.np.onei.servicesapp.models.TechPendingJobListWrapper;
import com.np.onei.servicesapp.services.APIs;
import com.np.onei.utils.SingletonObjectAccess;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class TechPendingJobListRepositry {

    Context cnt;
    ProgressDialog pd;
    TechPendingJobListInterface SI;

    public TechPendingJobListRepositry(Context cnt, ProgressDialog pd, TechPendingJobListInterface SI) {
        this.cnt = cnt;
        this.pd = pd;
        this.SI = SI;
    }


    public void getSericeListNoonPID(String tid)
    {
        SI.RequestProgressShow(pd);
        APIs apiService = SingletonObjectAccess.getApiService();
        Call<TechPendingJobListWrapper> call = apiService.getTechPendingJobList(tid);
        call.enqueue(new Callback<TechPendingJobListWrapper>() {
            @Override
            public void onResponse(Call<TechPendingJobListWrapper> call, Response<TechPendingJobListWrapper> response) {
               try{
                   if(response.body().getResponse().getStatus().equals("1"))
                   {

                       SI.getTechJobPendigSuccess(response.body().getResponse().getData());

                       SI.RequestProgressFinish(pd);
                   }else
                   {
                       SI.RequestProgressFinish(pd);
                       SI.SignupFailed(response.body().getResponse().getMessage());
                   }
               }catch (Exception e)
               {
                   e.printStackTrace();
               }

            }

            @Override
            public void onFailure(Call<TechPendingJobListWrapper> call, Throwable t) {
                SI.RequestProgressFinish(pd);
                SI.SignupFailed(t.toString());
            }
        });
    }
}
