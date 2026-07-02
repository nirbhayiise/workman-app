package com.np.onei.servicesapp.repositrys;

import android.app.ProgressDialog;
import android.content.Context;

import com.np.onei.servicesapp.intfc.ScanDetailQrStatusInterface;
import com.np.onei.servicesapp.intfc.UpdateQrStatusInterface;
import com.np.onei.servicesapp.models.QRScanDetailWrapper;
import com.np.onei.servicesapp.services.APIs;
import com.np.onei.utils.SingletonObjectAccess;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class ScanQRDetailStatusRepositry {

    Context cnt;
    ProgressDialog pd;
    ScanDetailQrStatusInterface SI;

    public ScanQRDetailStatusRepositry(Context cnt, ProgressDialog pd, ScanDetailQrStatusInterface SI) {
        this.cnt = cnt;
        this.pd = pd;
        this.SI = SI;
    }
    public void getQrUpdated(String code, String sbtcode)
    {
        pd.show();
        APIs apiService = SingletonObjectAccess.getApiService();
        Call<QRScanDetailWrapper> call = apiService.getUpdateQRStatus(code,sbtcode);
        call.enqueue(new Callback<QRScanDetailWrapper>() {
            @Override
            public void onResponse(Call<QRScanDetailWrapper> call, Response<QRScanDetailWrapper> response) {

                pd.dismiss();
                if(response.body().getResponse().getStatus().equals("1"))
                {
                    SI.UpdateSuccess(response.body().getResponse().getMessage(),response.body().getResponse().DetailsData);
                   // openJobDetails(cnt);
                }else
                {
                    SI.UpdateSuccess(response.body().getResponse().getMessage(),response.body().getResponse().DetailsData);
                }

            }

            @Override
            public void onFailure(Call<QRScanDetailWrapper> call, Throwable t) {

            }
        });

    }

    public void getQrUpdatedProbutton(String code, String sbtcode)
    {
        pd.show();
        APIs apiService = SingletonObjectAccess.getApiService();
        Call<QRScanDetailWrapper> call = apiService.getUpdateQRStatus(code,sbtcode);
        call.enqueue(new Callback<QRScanDetailWrapper>() {
            @Override
            public void onResponse(Call<QRScanDetailWrapper> call, Response<QRScanDetailWrapper> response) {

                pd.dismiss();
                if(response.body().getResponse().getStatus().equals("1"))
                {
                    SI.OpenDialogBox(response.body().getResponse().getMessage(),response.body().getResponse().DetailsData);
                    // openJobDetails(cnt);
                }else
                {
                    SI.UpdateSuccess(response.body().getResponse().getMessage(),response.body().getResponse().DetailsData);
                }

            }

            @Override
            public void onFailure(Call<QRScanDetailWrapper> call, Throwable t) {

            }
        });

    }

}
