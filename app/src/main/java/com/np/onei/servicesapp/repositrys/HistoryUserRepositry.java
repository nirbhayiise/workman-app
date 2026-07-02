package com.np.onei.servicesapp.repositrys;

import android.app.ProgressDialog;
import android.content.Context;
import android.widget.Toast;

import com.np.onei.servicesapp.intfc.FaultListInterface;
import com.np.onei.servicesapp.intfc.HistoryListInterface;
import com.np.onei.servicesapp.models.FaultListWrapper;
import com.np.onei.servicesapp.models.HistoryUserWarpper;
import com.np.onei.servicesapp.services.APIs;
import com.np.onei.utils.SingletonObjectAccess;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class HistoryUserRepositry {


    Context cnt;
    ProgressDialog pd;
    HistoryListInterface LI;

    public HistoryUserRepositry(Context cnt, ProgressDialog pd, HistoryListInterface LI) {
        this.cnt = cnt;
        this.pd = pd;
        this.LI = LI;
    }
    public void Histry(String cid)
    {
        pd.setMessage("Please wait...");
        pd.show();
        LI.RequestProgressFinish(pd);
        APIs apiservice= SingletonObjectAccess.getApiService();
        Call<HistoryUserWarpper> call=apiservice.getHistryOfUsers(cid);
        call.enqueue(new Callback<HistoryUserWarpper>() {
            @Override
            public void onResponse(Call<HistoryUserWarpper> call, Response<HistoryUserWarpper> response) {
                pd.dismiss();
                try{
                    LI.RequestProgressFinish(pd);
                    if(response.body().getResponse().getStatus().equals("1"))
                    {
                        LI.HistoryListSuccess(response.body().getResponse().getData());
                    }else{
                        Toast.makeText(cnt, "Error", Toast.LENGTH_SHORT).show();
                    }
                }catch (Exception e)
                {
                    e.printStackTrace();
                }

            }

            @Override
            public void onFailure(Call<HistoryUserWarpper> call, Throwable t) {
                pd.dismiss();
                LI.RequestProgressFinish(pd);
            }
        });

    }

}
