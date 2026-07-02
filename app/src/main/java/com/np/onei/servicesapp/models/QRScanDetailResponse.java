
package com.np.onei.servicesapp.models;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;
import com.np.onei.servicesapp.ui.DetailsData;

public class QRScanDetailResponse {

    @SerializedName("status")
    @Expose
    private String status;
    @SerializedName("message")
    @Expose
    private String message;
    @SerializedName("usn")
    @Expose
    private String usn;
    @SerializedName("DetailsData")
    @Expose
    public DetailsData DetailsData;


    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    public String getUsn() {
        return usn;
    }

    public void setUsn(String usn) {
        this.usn = usn;
    }

    public DetailsData getData() {
        return DetailsData;
    }

    public void setData(com.np.onei.servicesapp.ui.DetailsData data) {
        this.DetailsData = data;
    }

}
