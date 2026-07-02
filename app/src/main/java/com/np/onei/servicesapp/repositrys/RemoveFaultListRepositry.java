package com.np.onei.servicesapp.repositrys;

import android.app.ProgressDialog;
import android.content.Context;

import com.np.onei.servicesapp.intfc.FaultListInterface;
import com.np.onei.servicesapp.models.FaultListWrapper;
import com.np.onei.servicesapp.models.RemoveFaultItemsWrapper;
import com.np.onei.servicesapp.services.APIs;
import com.np.onei.utils.SingletonObjectAccess;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class RemoveFaultListRepositry {


    Context cnt;
    ProgressDialog pd;
    FaultListInterface LI;

    public RemoveFaultListRepositry(Context cnt, ProgressDialog pd, FaultListInterface LI) {
        this.cnt = cnt;
        this.pd = pd;
        this.LI = LI;
    }
    public void getRemoveItem(String eid,String cid,String tid,String fid)
    {

        APIs apiservice= SingletonObjectAccess.getApiService();
        Call<RemoveFaultItemsWrapper> call=apiservice.RemoveItemFaultList(eid,cid,tid,fid);
        call.enqueue(new Callback<RemoveFaultItemsWrapper>() {
            @Override
            public void onResponse(Call<RemoveFaultItemsWrapper> call, Response<RemoveFaultItemsWrapper> response) {


                if(response.body().getResponse().getStatus().equals("1")){

                }else
                {

                }

            }

            @Override
            public void onFailure(Call<RemoveFaultItemsWrapper> call, Throwable t) {

            }
        });
    }

}
