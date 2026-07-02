package com.np.onei.servicesapp.repositrys;

import android.app.ProgressDialog;
import android.content.Context;

import com.np.onei.servicesapp.intfc.AcceptReqInterface;
import com.np.onei.servicesapp.intfc.SignupInterface;
import com.np.onei.servicesapp.models.CLoginWrapper;
import com.np.onei.servicesapp.models.TechAcceptReqWrapper;
import com.np.onei.servicesapp.services.APIs;
import com.np.onei.utils.SingletonObjectAccess;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class TechAcceptReqRepositry {
    Context cnt;
    ProgressDialog pd;
    AcceptReqInterface LI;

    public TechAcceptReqRepositry(Context cnt, ProgressDialog pd, AcceptReqInterface LI) {
        this.cnt = cnt;
        this.pd = pd;
        this.LI = LI;
    }
    public void acceptReq(String eid,String tid){
        LI.RequestProgressShow(pd);
        APIs apiservice= SingletonObjectAccess.getApiService();
        Call<TechAcceptReqWrapper> call=apiservice.AccepteReqTech(eid,tid);
        call.enqueue(new Callback<TechAcceptReqWrapper>() {
            @Override
            public void onResponse(Call<TechAcceptReqWrapper> call, Response<TechAcceptReqWrapper> response) {
                if(response.body().getResponse().getStatus().equals("1"))
                {
                    LI.AcceptReqSuccess(response.body().getResponse().getMessage());
                    LI.RequestProgressFinish(pd);
                }else
                {
                    LI.RequestProgressFinish(pd);
                    LI.AcceptReqFailed(response.body().getResponse().getMessage());
                }
            }

            @Override
            public void onFailure(Call<TechAcceptReqWrapper> call, Throwable t) {
                LI.AcceptReqFailed(t.toString());
            }
        });


    }
}
