package com.np.onei.servicesapp.repositrys;

import android.app.ProgressDialog;
import android.content.Context;

import com.np.onei.servicesapp.intfc.PayDoneInterface;
import com.np.onei.servicesapp.intfc.SignupInterface;
import com.np.onei.servicesapp.models.PaymentDoneWrapper;
import com.np.onei.servicesapp.models.SignupWrapper;
import com.np.onei.servicesapp.services.APIs;
import com.np.onei.utils.SingletonObjectAccess;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class PayDoneRepositry {

    Context cnt;
    ProgressDialog pd;
    PayDoneInterface SI;

    public PayDoneRepositry(Context cnt, ProgressDialog pd, PayDoneInterface SI) {
        this.cnt = cnt;
        this.pd = pd;
        this.SI = SI;
    }
    public void donePay(String eid,String tref)
    {
        SI.RequestProgressShow(pd);
        APIs apiService = SingletonObjectAccess.getApiService();
        Call<PaymentDoneWrapper> call = apiService.getDonePayment( eid,tref);
        call.enqueue(new Callback<PaymentDoneWrapper>() {
            @Override
            public void onResponse(Call<PaymentDoneWrapper> call, Response<PaymentDoneWrapper> response) {
                SI.RequestProgressFinish(pd);
                if(response.body().getResponse().getStatus().equals("1"))
                {
                    SI.PaySuccess(response.body().getResponse().getMessage());
                }else
                {
                    SI.PayFailed(response.body().getResponse().getMessage());
                }
            }

            @Override
            public void onFailure(Call<PaymentDoneWrapper> call, Throwable t) {
                SI.PayFailed(t.toString());
            }
        });

    }
}
