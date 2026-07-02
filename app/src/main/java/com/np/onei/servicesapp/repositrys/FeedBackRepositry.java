package com.np.onei.servicesapp.repositrys;

import android.app.ProgressDialog;
import android.content.Context;

import com.np.onei.servicesapp.intfc.EnqryInterface;
import com.np.onei.servicesapp.intfc.FeedBackInterface;
import com.np.onei.servicesapp.models.EnqryWapper;
import com.np.onei.servicesapp.services.APIs;
import com.np.onei.utils.SingletonObjectAccess;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class FeedBackRepositry {

    Context cnt;
    ProgressDialog pd;
    FeedBackInterface SI;

    public FeedBackRepositry(Context cnt, ProgressDialog pd, FeedBackInterface SI) {
        this.cnt = cnt;
        this.pd = pd;
        this.SI = SI;
    }
    public void FeedBackSubmit(String eid,String friendliness,String service_in_future,String impove_message)
    {

        pd.setMessage("Please wait...");
        pd.show();
        APIs apiService = SingletonObjectAccess.getApiService();
        Call<EnqryWapper> call = apiService.feedbackSubmit( eid,  friendliness,  service_in_future,  impove_message);
        call.enqueue(new Callback<EnqryWapper>() {
            @Override
            public void onResponse(Call<EnqryWapper> call, Response<EnqryWapper> response) {
                pd.dismiss();
                if(response.body().getResponse().get(0).getStatus().equals("1")){
                    SI.success(response.body().getResponse().get(0).getMessage());
                }else {
                    SI.failed(response.body().getResponse().get(0).getMessage());
                }
            }

            @Override
            public void onFailure(Call<EnqryWapper> call, Throwable t) {
                pd.dismiss();
                SI.failed("Something went wrong!");
            }
        });
    }
}
