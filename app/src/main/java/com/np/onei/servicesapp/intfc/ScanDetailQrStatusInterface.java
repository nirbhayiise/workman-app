package com.np.onei.servicesapp.intfc;

import com.np.onei.servicesapp.ui.DetailsData;

public interface ScanDetailQrStatusInterface {
    void UpdateSuccess(String msg, DetailsData _data);
    void OpenDialogBox(String msg, DetailsData _data);
    void Failed(String msg);
}
