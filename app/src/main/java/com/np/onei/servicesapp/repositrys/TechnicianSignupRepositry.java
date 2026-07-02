package com.np.onei.servicesapp.repositrys;

import android.app.ProgressDialog;
import android.content.Context;

import com.np.onei.servicesapp.intfc.SignupInterface;
import com.np.onei.servicesapp.models.SignupWrapper;
import com.np.onei.servicesapp.models.TechSignupWrapper;
import com.np.onei.servicesapp.services.APIs;
import com.np.onei.utils.SingletonObjectAccess;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class TechnicianSignupRepositry {

    Context cnt;
    ProgressDialog pd;
    SignupInterface SI;

    public TechnicianSignupRepositry(Context cnt, ProgressDialog pd, SignupInterface SI) {
        this.cnt = cnt;
        this.pd = pd;
        this.SI = SI;
    }
    public void TechinvokedSignup(String bId,String pId,String c_first_name, String c_last_name, String c_phone, String c_address,String c_email, String c_pass, String proImg)
    {
        SI.RequestProgressShow(pd);
        APIs apiService = SingletonObjectAccess.getApiService();
        Call<TechSignupWrapper> call = apiService.TechSignupInvok( bId,pId,c_first_name,  c_last_name,  c_phone,  c_address, c_email,  c_pass,proImg);
        call.enqueue(new Callback<TechSignupWrapper>() {
            @Override
            public void onResponse(Call<TechSignupWrapper> call, Response<TechSignupWrapper> response) {
                if(response.body().getResponse().getStatus().equals("1"))
                {
                    SI.SingupSuccess(response.body().getResponse().getUsn());
                    SI.RequestProgressFinish(pd);
                }else
                {
                    SI.SignupFailed(response.body().getResponse().getMessage());
                    SI.RequestProgressFinish(pd);
                }
            }

            @Override
            public void onFailure(Call<TechSignupWrapper> call, Throwable t) {
                SI.SignupFailed(t.toString());
                SI.RequestProgressFinish(pd);
            }
        });
    }
}
