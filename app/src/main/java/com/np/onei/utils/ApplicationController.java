package com.np.onei.utils;

import android.Manifest;
import android.app.Activity;
import android.app.Application;
import android.widget.Toast;


import com.karumi.dexter.Dexter;
import com.karumi.dexter.MultiplePermissionsReport;
import com.karumi.dexter.PermissionToken;
import com.karumi.dexter.listener.DexterError;
import com.karumi.dexter.listener.PermissionRequest;
import com.karumi.dexter.listener.PermissionRequestErrorListener;
import com.karumi.dexter.listener.multi.MultiplePermissionsListener;
import com.np.onei.servicesapp.intfc.PermissionCallBack;
import com.np.onei.servicesapp.models.CLoginResponse;
import com.np.onei.servicesapp.models.TLoginResponse;

import java.util.ArrayList;
import java.util.List;

import co.paystack.android.PaystackSdk;

public class ApplicationController extends Application {





    //Payment Details
    String amount="";
    String rid="";
    String serviceCharges="";
    String totalPaymentAmount="";


    // Customers Data
    String uId="";
    String cFirstName="";
    String cLastName="";
    String cPhone="";
    String cMail="";
    String cAddress="";
// Technician Data
    String TuId="";
    String TFirstName="";
    String TLastName="";
    String TPhone="";
    String TMail="";
    String TAddress="";
    String Tpass;

    // working details Tech & Cust.

    String ReqId;
    String customerName;
    String customerMob;
    String customerAddress;
    String serviceName;
    String professionalArea;
    String workingDetails;
    String cId;
    String cPass;
    String securityCode;
    String qrScanStatus;

    String photo1;
    String photo2;

    String qrCode="";
    String profilePic;

    public String getProfilePic() {
        return profilePic;
    }

    public void setProfilePic(String profilePic) {
        this.profilePic = profilePic;
    }

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

    public String getQrCode() {
        return qrCode;
    }

    public void setQrCode(String qrCode) {
        this.qrCode = qrCode;
    }

    public String getTotalPaymentAmount() {
        return totalPaymentAmount;
    }

    public void setTotalPaymentAmount(String totalPaymentAmount) {
        this.totalPaymentAmount = totalPaymentAmount;
    }

    public String getQrScanStatus() {
        return qrScanStatus;
    }

    public void setQrScanStatus(String qrScanStatus) {
        this.qrScanStatus = qrScanStatus;
    }

    public String getSecurityCode() {
        return securityCode;
    }

    public void setSecurityCode(String securityCode) {
        this.securityCode = securityCode;
    }

    public String getAmount() {
        return amount;
    }

    public void setAmount(String amount) {
        this.amount = amount;
    }

    public String getRid() {
        return rid;
    }

    public void setRid(String rid) {
        this.rid = rid;
    }

    public String getServiceCharges() {
        return serviceCharges;
    }

    public void setServiceCharges(String serviceCharges) {
        this.serviceCharges = serviceCharges;
    }

    @Override
    public void onCreate() {
        super.onCreate();

//        new Instabug.Builder(this, "5eafb1e5b88ec496b7bcd3acf173f2f4")
//                .setInvocationEvents(InstabugInvocationEvent.SHAKE, InstabugInvocationEvent.SCREENSHOT)
//                .build();
        PaystackSdk.initialize(getApplicationContext());
    }

    public String getTpass() {
        return Tpass;
    }

    public void setTpass(String tpass) {
        Tpass = tpass;
    }

    public String getcPass() {
        return cPass;
    }

    public void setcPass(String cPass) {
        this.cPass = cPass;
    }

    public String getcId() {
        return cId;
    }

    public void setcId(String cId) {
        this.cId = cId;
    }

    public String getReqId() {
        return ReqId;
    }

    public void setReqId(String reqId) {
        ReqId = reqId;
    }

    public String getCustomerName() {
        return customerName;
    }

    public void setCustomerName(String customerName) {
        this.customerName = customerName;
    }

    public String getCustomerMob() {
        return customerMob;
    }

    public void setCustomerMob(String customerMob) {
        this.customerMob = customerMob;
    }

    public String getCustomerAddress() {
        return customerAddress;
    }

    public void setCustomerAddress(String customerAddress) {
        this.customerAddress = customerAddress;
    }

    public String getServiceName() {
        return serviceName;
    }

    public void setServiceName(String serviceName) {
        this.serviceName = serviceName;
    }

    public String getProfessionalArea() {
        return professionalArea;
    }

    public void setProfessionalArea(String professionalArea) {
        this.professionalArea = professionalArea;
    }

    public String getWorkingDetails() {
        return workingDetails;
    }

    public void setWorkingDetails(String workingDetails) {
        this.workingDetails = workingDetails;
    }

    public String getTuId() {
        return TuId;
    }

    public void setTuId(String tuId) {
        TuId = tuId;
    }

    public String getTFirstName() {
        return TFirstName;
    }

    public void setTFirstName(String TFirstName) {
        this.TFirstName = TFirstName;
    }

    public String getTLastName() {
        return TLastName;
    }

    public void setTLastName(String TLastName) {
        this.TLastName = TLastName;
    }

    public String getTPhone() {
        return TPhone;
    }

    public void setTPhone(String TPhone) {
        this.TPhone = TPhone;
    }

    public String getTMail() {
        return TMail;
    }

    public void setTMail(String TMail) {
        this.TMail = TMail;
    }

    public String getTAddress() {
        return TAddress;
    }

    public void setTAddress(String TAddress) {
        this.TAddress = TAddress;
    }

    public String getcFirstName() {
        return cFirstName;
    }

    public void setcFirstName(String cFirstName) {
        this.cFirstName = cFirstName;
    }

    public String getcLastName() {
        return cLastName;
    }

    public void setcLastName(String cLastName) {
        this.cLastName = cLastName;
    }

    public String getcPhone() {
        return cPhone;
    }

    public void setcPhone(String cPhone) {
        this.cPhone = cPhone;
    }

    public String getcMail() {
        return cMail;
    }

    public void setcMail(String cMail) {
        this.cMail = cMail;
    }

    public String getcAddress() {
        return cAddress;
    }

    public void setcAddress(String cAddress) {
        this.cAddress = cAddress;
    }

    public String getuId() {
        return uId;
    }

    public void setuId(String uId) {
        this.uId = uId;
    }

    private List<CLoginResponse> CloginObject=new ArrayList<>();
    private List<TLoginResponse> TloginObject=new ArrayList<>();

    public List<CLoginResponse> getCloginObject() {
        return CloginObject;
    }

    public List<TLoginResponse> getTloginObject() {
        return TloginObject;
    }

    public void setTloginObject(List<TLoginResponse> tloginObject) {
        TloginObject = tloginObject;
    }

    public void setCloginObject(List<CLoginResponse> cloginObject) {
        CloginObject = cloginObject;
    }

    public void  requestMultiplePermissions(Activity act, PermissionCallBack pcb){
        Dexter.withActivity(act)
                .withPermissions(

                        android.Manifest.permission.WRITE_EXTERNAL_STORAGE,
                        android.Manifest.permission.READ_EXTERNAL_STORAGE, android.Manifest.permission.CAMERA, Manifest.permission.RECORD_AUDIO)
                .withListener(new MultiplePermissionsListener() {
                    @Override
                    public void onPermissionsChecked(MultiplePermissionsReport report) {
                        // check if all permissions are granted
                        if (report.areAllPermissionsGranted()) {
                            pcb.PermissionGrant();
                            //  Toast.makeText(getApplicationContext(), "All permissions are granted by user!", Toast.LENGTH_SHORT).show();
                        }

                        // check for permanent denial of any permission
                        if (report.isAnyPermissionPermanentlyDenied()) {
                            pcb.PermissionDinied();
                            // show alert dialog navigating to Settings

                        }
                    }

                    @Override
                    public void onPermissionRationaleShouldBeShown(List<PermissionRequest> permissions,
                                                                   PermissionToken token) {
                        token.continuePermissionRequest();
                    }
                }).
                withErrorListener(new PermissionRequestErrorListener() {
                    @Override
                    public void onError(DexterError error) {
                        Toast.makeText(act, "Some Error! ", Toast.LENGTH_SHORT).show();
                    }
                })
                .onSameThread()
                .check();
    }
}
