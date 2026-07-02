package com.np.onei.servicesapp.repositrys;

import android.app.ProgressDialog;
import android.content.Context;

import com.np.onei.servicesapp.intfc.SignupInterface;
import com.np.onei.servicesapp.models.SignupWrapper;
import com.np.onei.servicesapp.services.APIs;
import com.np.onei.utils.SingletonObjectAccess;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class CustProfileRepositry {

    Context cnt;
    ProgressDialog pd;
    SignupInterface SI;

    public CustProfileRepositry(Context cnt, ProgressDialog pd, SignupInterface SI) {
        this.cnt = cnt;
        this.pd = pd;
        this.SI = SI;
    }
    public void updateProfile(String uid,String c_first_name, String c_address, String c_pass)
    {
        SI.RequestProgressShow(pd);
        APIs apiService = SingletonObjectAccess.getApiService();
        Call<SignupWrapper> call = apiService.CustUpdateProfile(uid, c_first_name,    c_address,   c_pass);
        call.enqueue(new Callback<SignupWrapper>() {
            @Override
            public void onResponse(Call<SignupWrapper> call, Response<SignupWrapper> response) {
                if(response.body().getResponse().getStatus().equals("1"))
                {
                    SI.SingupSuccess(response.body().getResponse().getMessage());
                    SI.RequestProgressFinish(pd);
                }else
                {
                    SI.SignupFailed(response.body().getResponse().getMessage());
                    SI.RequestProgressFinish(pd);
                }
            }

            @Override
            public void onFailure(Call<SignupWrapper> call, Throwable t) {
                SI.SignupFailed(t.toString());
                SI.RequestProgressFinish(pd);
            }
        });
    }
}
