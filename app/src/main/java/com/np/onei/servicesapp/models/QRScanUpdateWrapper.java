
package com.np.onei.servicesapp.models;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

public class QRScanUpdateWrapper {

    @SerializedName("response")
    @Expose
    private QRScanUpdateResponse response;

    public QRScanUpdateResponse getResponse() {
        return response;
    }

    public void setResponse(QRScanUpdateResponse response) {
        this.response = response;
    }

}
