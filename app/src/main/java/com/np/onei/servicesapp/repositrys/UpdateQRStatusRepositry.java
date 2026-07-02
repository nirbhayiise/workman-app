package com.np.onei.servicesapp.repositrys;

import android.app.Dialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.view.View;
import android.view.Window;
import android.widget.EditText;
import android.widget.LinearLayout;
import android.widget.TextView;

import com.np.onei.servicesapp.R;
import com.np.onei.servicesapp.intfc.EnqryInterface;
import com.np.onei.servicesapp.intfc.UpdateQrStatusInterface;
import com.np.onei.servicesapp.models.EnqryWapper;
import com.np.onei.servicesapp.models.QRScanDetailWrapper;
import com.np.onei.servicesapp.models.QRScanUpdateWrapper;
import com.np.onei.servicesapp.services.APIs;
import com.np.onei.servicesapp.ui.AceeptedDetailReqActivity;
import com.np.onei.utils.SingletonObjectAccess;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class UpdateQRStatusRepositry {

    Context cnt;
    ProgressDialog pd;
    UpdateQrStatusInterface SI;

    public UpdateQRStatusRepositry(Context cnt, ProgressDialog pd, UpdateQrStatusInterface SI) {
        this.cnt = cnt;
        this.pd = pd;
        this.SI = SI;
    }
    public void getQrUpdated(String code)
    {
        pd.show();
        APIs apiService = SingletonObjectAccess.getApiService();
        Call<QRScanDetailWrapper> call = apiService.getUpdateQRStatus(code,"1");
        call.enqueue(new Callback<QRScanDetailWrapper>() {
            @Override
            public void onResponse(Call<QRScanDetailWrapper> call, Response<QRScanDetailWrapper> response) {

                pd.dismiss();
                if(response.body().getResponse().getStatus().equals("1"))
                {
                    SI.UpdateSuccess(response.body().getResponse().getMessage());
                   // openJobDetails(cnt);
                }else
                {
                    SI.UpdateSuccess(response.body().getResponse().getMessage());
                }

            }

            @Override
            public void onFailure(Call<QRScanDetailWrapper> call, Throwable t) {

            }
        });

    }

}
