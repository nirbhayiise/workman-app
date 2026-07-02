package com.np.onei.servicesapp.repositrys;

import android.app.ProgressDialog;
import android.content.Context;
import android.util.Log;

import com.np.onei.servicesapp.intfc.FaultListInterface;
import com.np.onei.servicesapp.intfc.StateCityCallBack;
import com.np.onei.servicesapp.models.FaultListWrapper;
import com.np.onei.servicesapp.models.NGStateWrapper;
import com.np.onei.servicesapp.services.APIs;
import com.np.onei.utils.SingletonObjectAccess;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class NGStateListRepository {


    Context cnt;
    ProgressDialog pd;
    StateCityCallBack LI;
    static NGStateListRepository _NGStateListRepository;
    public static NGStateListRepository getInstatnce()
    {
        if(_NGStateListRepository==null)
        {
            _NGStateListRepository=new NGStateListRepository() ;
        }
        return _NGStateListRepository;
    }

    public void getNgList(Context cnt,StateCityCallBack LI)
    {


        APIs apiservice= SingletonObjectAccess.getApiService();
        Call<NGStateWrapper> call=apiservice.getStatteList();
        call.enqueue(new Callback<NGStateWrapper>() {
            @Override
            public void onResponse(Call<NGStateWrapper> call, Response<NGStateWrapper> response) {

                try{

                    Log.e("Respose===>",""+response.body().getResponse());
                    Log.e("Respose sucess===>",""+response.isSuccessful());
                    if(response.body().getResponse().getStatus().equals("1"))
                    {
                        LI.StateListSuccess(response.body().getResponse().getData());
                    }else{
                        LI.ErrorStateList();
                    }
                }catch (Exception e)
                {

                    e.printStackTrace();
                    LI.ErrorStateList();
                }

            }

            @Override
            public void onFailure(Call<NGStateWrapper> call, Throwable t) {
                LI.ErrorStateList();
            }
        });
    }

}
