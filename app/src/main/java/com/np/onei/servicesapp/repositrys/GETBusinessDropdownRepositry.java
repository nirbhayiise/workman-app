package com.np.onei.servicesapp.repositrys;

import android.app.ProgressDialog;
import android.content.Context;

import com.np.onei.servicesapp.intfc.BusinessInterface;
import com.np.onei.servicesapp.intfc.ServiceDropDownInterface;
import com.np.onei.servicesapp.intfc.SignupInterface;
import com.np.onei.servicesapp.models.BusinessListDwapper;
import com.np.onei.servicesapp.models.ServiceDropDownWrapper;
import com.np.onei.servicesapp.models.SignupWrapper;
import com.np.onei.servicesapp.services.APIs;
import com.np.onei.utils.SingletonObjectAccess;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class GETBusinessDropdownRepositry {

    Context cnt;
    ProgressDialog pd;
    BusinessInterface SI;

    public GETBusinessDropdownRepositry(Context cnt, ProgressDialog pd, BusinessInterface SI) {
        this.cnt = cnt;
        this.pd = pd;
        this.SI = SI;
    }


    public void getSericeListNoonPID()
    {

        APIs apiService = SingletonObjectAccess.getApiService();
        Call<BusinessListDwapper> call = apiService.getBusinessList();
        call.enqueue(new Callback<BusinessListDwapper>() {
            @Override
            public void onResponse(Call<BusinessListDwapper> call, Response<BusinessListDwapper> response) {
                if(response.body().getResponse().getStatus().equals("1"))
                {

                    SI.BusinessNameList(response.body().getResponse().getData());

                }
            }

            @Override
            public void onFailure(Call<BusinessListDwapper> call, Throwable t) {

            }
        });
    }
}
