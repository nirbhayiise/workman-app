package com.np.onei.servicesapp.repositrys;

import android.app.ProgressDialog;
import android.content.Context;

import com.np.onei.servicesapp.intfc.EnqryInterface;
import com.np.onei.servicesapp.intfc.SignupInterface;
import com.np.onei.servicesapp.models.EnqryWapper;
import com.np.onei.servicesapp.models.SignupWrapper;
import com.np.onei.servicesapp.services.APIs;
import com.np.onei.utils.SingletonObjectAccess;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class EnqryRepositry {

    Context cnt;
    ProgressDialog pd;
    EnqryInterface SI;

    public EnqryRepositry(Context cnt, ProgressDialog pd, EnqryInterface SI) {
        this.cnt = cnt;
        this.pd = pd;
        this.SI = SI;
    }
    public void getEnqry(String cat_id, String service_id, String bid, String cid,String details, String work_status,String nam,String mail,String mob,String photo1, String photo2)
    {
        SI.RequestProgressShow(pd);
        APIs apiService = SingletonObjectAccess.getApiService();
        Call<EnqryWapper> call = apiService.enqryAdd( cat_id,  service_id,  bid,  cid, details,  work_status,nam,mail,mob, photo1, photo2);
        call.enqueue(new Callback<EnqryWapper>() {
            @Override
            public void onResponse(Call<EnqryWapper> call, Response<EnqryWapper> response) {
                if (response.isSuccessful() && response.body() != null && response.body().getResponse() != null && !response.body().getResponse().isEmpty()) {
                    if (response.body().getResponse().get(0).getStatus().equals("1")) {
                        SI.SingupSuccess(response.body().getResponse().get(0).getMessage());
                    } else {
                        SI.SignupFailed(response.body().getResponse().get(0).getMessage());
                    }
                } else {
                    SI.SignupFailed("Server error or invalid response");
                }
                SI.RequestProgressFinish(pd);
            }

            @Override
            public void onFailure(Call<EnqryWapper> call, Throwable t) {
                SI.SignupFailed(t.toString());
                SI.RequestProgressFinish(pd);
            }
        });
    }
}
