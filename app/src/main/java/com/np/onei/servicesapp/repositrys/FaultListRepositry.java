package com.np.onei.servicesapp.repositrys;

import android.app.ProgressDialog;
import android.content.Context;

import com.np.onei.servicesapp.intfc.AddFaultInterface;
import com.np.onei.servicesapp.intfc.FaultListInterface;
import com.np.onei.servicesapp.models.FaultListWrapper;
import com.np.onei.servicesapp.services.APIs;
import com.np.onei.utils.SingletonObjectAccess;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class FaultListRepositry {


    Context cnt;
    ProgressDialog pd;
    FaultListInterface LI;

    public FaultListRepositry(Context cnt, ProgressDialog pd, FaultListInterface LI) {
        this.cnt = cnt;
        this.pd = pd;
        this.LI = LI;
    }
    public void getListFaults(String eid,String cid,String tid)
    {
        LI.RequestProgressFinish(pd);
        APIs apiservice= SingletonObjectAccess.getApiService();
        Call<FaultListWrapper> call=apiservice.getFaultList(eid,cid,tid);
        call.enqueue(new Callback<FaultListWrapper>() {
            @Override
            public void onResponse(Call<FaultListWrapper> call, Response<FaultListWrapper> response) {


                if(response.body().getResponse().getStatus().equals("1")){
                    LI.faultListSuccess(response.body().getResponse().getData());
                    LI.RequestProgressFinish(pd);
                }else
                {
                    LI.faultListFailed(response.body().getResponse().getMessage());
                    LI.RequestProgressFinish(pd);
                }

            }

            @Override
            public void onFailure(Call<FaultListWrapper> call, Throwable t) {
                LI.faultListFailed(t.toString());
                LI.RequestProgressFinish(pd);
            }
        });
    }

}
