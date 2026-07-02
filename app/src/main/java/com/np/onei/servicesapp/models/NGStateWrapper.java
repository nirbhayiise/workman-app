
package com.np.onei.servicesapp.models;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;


public class NGStateWrapper {

    @SerializedName("response")
    @Expose
    private NGStateListResponse response;

    public NGStateListResponse getResponse() {
        return response;
    }

    public void setResponse(NGStateListResponse response) {
        this.response = response;
    }

}
