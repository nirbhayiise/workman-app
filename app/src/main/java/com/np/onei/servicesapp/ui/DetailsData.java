package com.np.onei.servicesapp.ui;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

public class DetailsData {

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
    private String amountPaid;
    @SerializedName("service_amount")
    @Expose
    private String serviceAmount;
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
    @SerializedName("s_id")
    @Expose
    private String sId;
    @SerializedName("s_name")
    @Expose
    private String sName;
    @SerializedName("pro_id")
    @Expose
    private String proId;
    @SerializedName("s_created")
    @Expose
    private String sCreated;
    @SerializedName("s_status")
    @Expose
    private String sStatus;
    @SerializedName("pro_name")
    @Expose
    private String proName;
    @SerializedName("pro_dis")
    @Expose
    private String proDis;
    @SerializedName("pro_created")
    @Expose
    private String proCreated;
    @SerializedName("pro_status")
    @Expose
    private String proStatus;

    @SerializedName("proImg")
    @Expose
    private String proImg;


    @SerializedName("tech_name")
    @Expose
    private String tech_name;


    @SerializedName("t_phone")
    @Expose
    private String t_phone;

    public String getT_phone() {
        return t_phone;
    }

    public void setT_phone(String t_phone) {
        this.t_phone = t_phone;
    }

    public String getTech_name() {
        return tech_name;
    }

    public void setTech_name(String tech_name) {
        this.tech_name = tech_name;
    }

    public String getProImg() {
        return proImg;
    }

    public void setProImg(String proImg) {
        this.proImg = proImg;
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

    public String getAmountPaid() {
        return amountPaid;
    }

    public void setAmountPaid(String amountPaid) {
        this.amountPaid = amountPaid;
    }

    public String getServiceAmount() {
        return serviceAmount;
    }

    public void setServiceAmount(String serviceAmount) {
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

    public String getsId() {
        return sId;
    }

    public void setsId(String sId) {
        this.sId = sId;
    }

    public String getsName() {
        return sName;
    }

    public void setsName(String sName) {
        this.sName = sName;
    }

    public String getProId() {
        return proId;
    }

    public void setProId(String proId) {
        this.proId = proId;
    }

    public String getsCreated() {
        return sCreated;
    }

    public void setsCreated(String sCreated) {
        this.sCreated = sCreated;
    }

    public String getsStatus() {
        return sStatus;
    }

    public void setsStatus(String sStatus) {
        this.sStatus = sStatus;
    }

    public String getProName() {
        return proName;
    }

    public void setProName(String proName) {
        this.proName = proName;
    }

    public String getProDis() {
        return proDis;
    }

    public void setProDis(String proDis) {
        this.proDis = proDis;
    }

    public String getProCreated() {
        return proCreated;
    }

    public void setProCreated(String proCreated) {
        this.proCreated = proCreated;
    }

    public String getProStatus() {
        return proStatus;
    }

    public void setProStatus(String proStatus) {
        this.proStatus = proStatus;
    }



}