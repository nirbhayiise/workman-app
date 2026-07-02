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

public class GETProfessionalDropdownRepositry {

    Context cnt;
    ProgressDialog pd;
    ProfessionalAreaInterface SI;

    public GETProfessionalDropdownRepositry(Context cnt, ProgressDialog pd, ProfessionalAreaInterface SI) {
        this.cnt = cnt;
        this.pd = pd;
        this.SI = SI;
    }

    public void getProfessionalList()
    {

        APIs apiService = SingletonObjectAccess.getApiService();
        Call<ProfessionalAreaWrapper> call = apiService.getProfessionaList();
        call.enqueue(new Callback<ProfessionalAreaWrapper>() {
            @Override
            public void onResponse(Call<ProfessionalAreaWrapper> call, Response<ProfessionalAreaWrapper> response) {
                if(response.body().getResponse().getStatus().equals("1"))
                {
                    SI.ProfessionalAreaList(response.body().getResponse().getData());
                }
            }

            @Override
            public void onFailure(Call<ProfessionalAreaWrapper> call, Throwable t) {

            }
        });
    }
}
