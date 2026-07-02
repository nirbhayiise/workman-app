package com.np.onei.servicesapp.intfc;

import android.app.ProgressDialog;

import com.np.onei.servicesapp.models.QRScanDetailResponse;
import com.np.onei.servicesapp.ui.DetailsData;

public interface UpdateQrStatusInterface {
    void UpdateSuccess(String msg);
    void Failed(String msg);


}
