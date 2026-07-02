
package com.np.onei.servicesapp.models;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

public class QRScanDetailWrapper {

    @SerializedName("response")
    @Expose
    private QRScanDetailResponse response;

    public QRScanDetailResponse getResponse() {
        return response;
    }

    public void setResponse(QRScanDetailResponse response) {
        this.response = response;
    }

}
