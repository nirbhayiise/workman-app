package com.np.onei.servicesapp.repositrys;

import android.app.ProgressDialog;
import android.content.Context;

import com.np.onei.servicesapp.intfc.UpdateQrStatusInterface;
import com.np.onei.servicesapp.models.QRScanUpdateWrapper;
import com.np.onei.servicesapp.services.APIs;
import com.np.onei.utils.SingletonObjectAccess;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class GetQRStatusRepositry {

    Context cnt;
    ProgressDialog pd;
    UpdateQrStatusInterface SI;

    public GetQRStatusRepositry(Context cnt, ProgressDialog pd, UpdateQrStatusInterface SI) {
        this.cnt = cnt;
        this.pd = pd;
        this.SI = SI;
    }
    public void getQrUpdated(String code)
    {

        APIs apiService = SingletonObjectAccess.getApiService();
        Call<QRScanUpdateWrapper> call = apiService.getFlagStatus(code);
        call.enqueue(new Callback<QRScanUpdateWrapper>() {
            @Override
            public void onResponse(Call<QRScanUpdateWrapper> call, Response<QRScanUpdateWrapper> response) {


                if(response.body().getResponse().getStatus().equals("1"))
                {
                    SI.UpdateSuccess(response.body().getResponse().getMessage());
                }else
                {
                    SI.UpdateSuccess(response.body().getResponse().getMessage());
                }

            }

            @Override
            public void onFailure(Call<QRScanUpdateWrapper> call, Throwable t) {

            }
        });

    }
}
