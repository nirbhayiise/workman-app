
package com.np.onei.servicesapp.models;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

public class QRScanUpdateResponse {

    @SerializedName("status")
    @Expose
    private String status;
    @SerializedName("message")
    @Expose
    private String message;
    @SerializedName("usn")
    @Expose
    private String usn;
    @SerializedName("data")
    @Expose
    public Data data;


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

    public Data getData() {
        return data;
    }

    public void setData(Data data) {
        this.data = data;
    }
    public class Data {

        @SerializedName("e_id")
        @Expose
        private String eId;
        @SerializedName("b_id")
        @Expose
        private String bId;
        @SerializedName("cat_id")
        @Expose
        private String catId;
        @SerializedName("service_id")
        @Expose
        private String serviceId;
        @SerializedName("c_id")
        @Expose
        private String cId;
        @SerializedName("contact_person_name")
        @Expose
        private String contactPersonName;
        @SerializedName("contact_person_mail")
        @Expose
        private String contactPersonMail;
        @SerializedName("contact_person_mob")
        @Expose
        private String contactPersonMob;
        @SerializedName("details")
        @Expose
        private String details;
        @SerializedName("alloted_technician_id")
        @Expose
        private String allotedTechnicianId;
        @SerializedName("work_status")
        @Expose
        private String workStatus;
        @SerializedName("amount_paid")
        @Expose
        private Object amountPaid;
        @SerializedName("service_amount")
        @Expose
        private Object serviceAmount;
        @SerializedName("payment_status")
        @Expose
        private String paymentStatus;
        @SerializedName("security_code")
        @Expose
        private String securityCode;
        @SerializedName("e_created")
        @Expose
        private String eCreated;
        @SerializedName("e_status")
        @Expose
        private String eStatus;
        @SerializedName("transcation_ref")
        @Expose
        private Object transcationRef;
        @SerializedName("scan_flag")
        @Expose
        private String scanFlag;


        @SerializedName("photo1")
        @Expose
        private String photo1;

        @SerializedName("photo2")
        @Expose
        private String photo2;

        public String getPhoto1() {
            return photo1;
        }

        public void setPhoto1(String photo1) {
            this.photo1 = photo1;
        }

        public String getPhoto2() {
            return photo2;
        }

        public void setPhoto2(String photo2) {
            this.photo2 = photo2;
        }

        public String geteId() {
            return eId;
        }

        public void seteId(String eId) {
            this.eId = eId;
        }

        public String getbId() {
            return bId;
        }

        public void setbId(String bId) {
            this.bId = bId;
        }

        public String getCatId() {
            return catId;
        }

        public void setCatId(String catId) {
            this.catId = catId;
        }

        public String getServiceId() {
            return serviceId;
        }

        public void setServiceId(String serviceId) {
            this.serviceId = serviceId;
        }

        public String getcId() {
            return cId;
        }

        public void setcId(String cId) {
            this.cId = cId;
        }

        public String getContactPersonName() {
            return contactPersonName;
        }

        public void setContactPersonName(String contactPersonName) {
            this.contactPersonName = contactPersonName;
        }

        public String getContactPersonMail() {
            return contactPersonMail;
        }

        public void setContactPersonMail(String contactPersonMail) {
            this.contactPersonMail = contactPersonMail;
        }

        public String getContactPersonMob() {
            return contactPersonMob;
        }

        public void setContactPersonMob(String contactPersonMob) {
            this.contactPersonMob = contactPersonMob;
        }

        public String getDetails() {
            return details;
        }

        public void setDetails(String details) {
            this.details = details;
        }

        public String getAllotedTechnicianId() {
            return allotedTechnicianId;
        }

        public void setAllotedTechnicianId(String allotedTechnicianId) {
            this.allotedTechnicianId = allotedTechnicianId;
        }

        public String getWorkStatus() {
            return workStatus;
        }

        public void setWorkStatus(String workStatus) {
            this.workStatus = workStatus;
        }

        public Object getAmountPaid() {
            return amountPaid;
        }

        public void setAmountPaid(Object amountPaid) {
            this.amountPaid = amountPaid;
        }

        public Object getServiceAmount() {
            return serviceAmount;
        }

        public void setServiceAmount(Object serviceAmount) {
            this.serviceAmount = serviceAmount;
        }

        public String getPaymentStatus() {
            return paymentStatus;
        }

        public void setPaymentStatus(String paymentStatus) {
            this.paymentStatus = paymentStatus;
        }

        public String getSecurityCode() {
            return securityCode;
        }

        public void setSecurityCode(String securityCode) {
            this.securityCode = securityCode;
        }

        public String geteCreated() {
            return eCreated;
        }

        public void seteCreated(String eCreated) {
            this.eCreated = eCreated;
        }

        public String geteStatus() {
            return eStatus;
        }

        public void seteStatus(String eStatus) {
            this.eStatus = eStatus;
        }

        public Object getTranscationRef() {
            return transcationRef;
        }

        public void setTranscationRef(Object transcationRef) {
            this.transcationRef = transcationRef;
        }

        public String getScanFlag() {
            return scanFlag;
        }

        public void setScanFlag(String scanFlag) {
            this.scanFlag = scanFlag;
        }

    }
}
