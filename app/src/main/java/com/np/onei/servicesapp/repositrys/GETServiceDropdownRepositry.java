package com.np.onei.servicesapp.repositrys;

import android.app.ProgressDialog;
import android.content.Context;

import com.np.onei.servicesapp.intfc.ProfessionalAreaInterface;
import com.np.onei.servicesapp.intfc.ServiceDropDownInterface;
import com.np.onei.servicesapp.models.ProfessionalAreaWrapper;
import com.np.onei.servicesapp.models.ServiceDropDownWrapper;
import com.np.onei.servicesapp.services.APIs;
import com.np.onei.utils.SingletonObjectAccess;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class GETServiceDropdownRepositry {

    Context cnt;
    ProgressDialog pd;
    ServiceDropDownInterface SI;

    public GETServiceDropdownRepositry(Context cnt, ProgressDialog pd, ServiceDropDownInterface SI) {
        this.cnt = cnt;
        this.pd = pd;
        this.SI = SI;
    }

    public void getSericeList(String pid)
    {
        SI.RequestProgressShow(pd);
        APIs apiService = SingletonObjectAccess.getApiService();
        Call<ServiceDropDownWrapper> call = apiService.getServiceDropdonw(pid);
        call.enqueue(new Callback<ServiceDropDownWrapper>() {
            @Override
            public void onResponse(Call<ServiceDropDownWrapper> call, Response<ServiceDropDownWrapper> response) {
                if(response.body().getResponse().getStatus().equals("1"))
                {
                    SI.Success(response.body().getResponse().getData());
                    SI.RequestProgressFinish(pd);
                }else
                {
                    SI.Failed(""+response.body().getResponse().getMessage());
                    SI.RequestProgressFinish(pd);
                }
            }

            @Override
            public void onFailure(Call<ServiceDropDownWrapper> call, Throwable t) {
                SI.Failed(""+t.toString());
                SI.RequestProgressFinish(pd);
            }
        });
    }
}
