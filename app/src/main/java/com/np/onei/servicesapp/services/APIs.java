package com.np.onei.servicesapp.services;


import com.np.onei.servicesapp.models.AddFaultWrapper;
import com.np.onei.servicesapp.models.BusinessListDwapper;
import com.np.onei.servicesapp.models.CLoginResponse;
import com.np.onei.servicesapp.models.CLoginWrapper;
import com.np.onei.servicesapp.models.EnqryWapper;
import com.np.onei.servicesapp.models.FaultListWrapper;
import com.np.onei.servicesapp.models.MakePayWrapper;
import com.np.onei.servicesapp.models.NGStateWrapper;
import com.np.onei.servicesapp.models.NotificationListWrapper;
import com.np.onei.servicesapp.models.PaymentDoneWrapper;
import com.np.onei.servicesapp.models.PendingJobCompleteJobWrapper;
import com.np.onei.servicesapp.models.ProfessionalAreaWrapper;
import com.np.onei.servicesapp.models.QRScanDetailWrapper;
import com.np.onei.servicesapp.models.QRScanUpdateWrapper;
import com.np.onei.servicesapp.models.RemoveFaultItemsWrapper;
import com.np.onei.servicesapp.models.ServiceDropDownWrapper;
import com.np.onei.servicesapp.models.SignupWrapper;
import com.np.onei.servicesapp.models.TLoginWrapper;
import com.np.onei.servicesapp.models.TechAcceptJobListWrapper;
import com.np.onei.servicesapp.models.TechAcceptReqWrapper;
import com.np.onei.servicesapp.models.TechPendingJobListWrapper;
import com.np.onei.servicesapp.models.HistoryUserWarpper;
import com.np.onei.servicesapp.models.TechSignupWrapper;
import com.np.onei.servicesapp.models.UploadImageWrapper;

import io.reactivex.Single;
import okhttp3.MultipartBody;
import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.Multipart;
import retrofit2.http.POST;
import retrofit2.http.Part;


public interface APIs {
    // Register new user
//    @FormUrlEncoded
//    @POST("notes/user/register")
//    Single<String> register(@Field("device_id") String deviceId);

//
//    @FormUrlEncoded
//    @POST("location_update.php")
//    Observable<SimpleWrapperResponse>getLocationUpdate(@Field("lat") String lat, @Field("lng") String lng, @Field("did") String did, @Field("txtaddress") String addresstxt);
//
    @FormUrlEncoded
    @POST("customer_signup.php")
    Call<SignupWrapper> SignupInvok(@Field("c_first_name") String c_first_name, @Field("c_last_name") String c_last_name, @Field("c_phone") String c_phone, @Field("c_address") String c_address, @Field("c_email") String c_email, @Field("c_pass") String c_pass, @Field("NGstate") String NGstate , @Field("NGcity") String NGcity );


    @FormUrlEncoded
    @POST("forgotpass.php")
    Call<SignupWrapper> fortGotPass(@Field("mail") String mail);

    @FormUrlEncoded
    @POST("techforgotpass.php")
    Call<SignupWrapper> techfortGotPass(@Field("mail") String mail);

    @FormUrlEncoded
    @POST("updateProfileCust.php")
    Call<SignupWrapper> CustUpdateProfile(@Field("cid") String cid,@Field("c_first_name") String c_first_name,  @Field("c_address") String c_address, @Field("c_pass") String c_pass);

    @FormUrlEncoded
    @POST("bank_from.php")
    Call<SignupWrapper> BankFormSubmit(@Field("reqid") String reqid, @Field("uid") String uid, @Field("bank_name") String bank_name, @Field("account_name") String account_name, @Field("account_number") String account_number, @Field("amount") String amount);


    @FormUrlEncoded
    @POST("techSignup.php")
    Call<TechSignupWrapper> TechSignupInvok(@Field("bid") String bId,@Field("pid") String pid,@Field("c_first_name") String c_first_name, @Field("c_last_name") String c_last_name, @Field("c_phone") String c_phone, @Field("c_address") String c_address, @Field("c_email") String c_email, @Field("c_pass") String c_pass, @Field("proImg") String proImg);


    @FormUrlEncoded
    @POST("pLogin.php")
    Call<CLoginWrapper> getClogin(@Field("mail") String mail, @Field("password") String password);


    @FormUrlEncoded
    @POST("clogin.php")
    Call<TLoginWrapper> getTlogin(@Field("mail") String mail, @Field("password") String password);

    @FormUrlEncoded
    @POST("customer_signup.php")
    Call<CLoginWrapper> CustSignup(@Field("c_first_name") String c_first_name, @Field("c_last_name") String c_last_name, @Field("c_phone") String c_phone, @Field("c_address") String c_address, @Field("c_email") String c_email, @Field("c_pass") String c_pass);



    @FormUrlEncoded
    @POST("update_tech_pendingStatus.php")
    Call<TechAcceptReqWrapper> AccepteReqTech(@Field("eid") String eid, @Field("tid") String tid);

    @FormUrlEncoded
    @POST("updatecancel_status.php")
    Call<TechAcceptReqWrapper> cancelJobFromCust(@Field("eid") String eid);



    @FormUrlEncoded
    @POST("add_fault.php")
    Call<AddFaultWrapper> addfaultbyTech(@Field("e_id") String e_id, @Field("c_id") String c_id, @Field("t_id") String t_id, @Field("f_details") String f_details);



    @FormUrlEncoded
    @POST("add_equerry.php")
    Call<EnqryWapper> enqryAdd(@Field("cat_id") String cat_id, @Field("service_id") String service_id, @Field("bid") String bid, @Field("cid") String cid, @Field("details") String details, @Field("work_status") String contact_person_name, @Field("contact_person_name") String work_status, @Field("contact_person_mail") String contact_person_mail, @Field("contact_person_mob") String contact_person_mob,@Field("photo1") String phot1,@Field("photo2") String phot2);


    @FormUrlEncoded
    @POST("add_satisfying.php")
    Call<EnqryWapper> feedbackSubmit(@Field("e_id") String e_id, @Field("frindliness") String frindliness, @Field("service_in_future") String service_in_future, @Field("impove_message") String impove_message);




    @POST("getprofessionalList.php")
    Call<ProfessionalAreaWrapper> getProfessionaList();

    @POST("getbusinessNameList.php")
    Call<BusinessListDwapper> getBusinessList();


    @POST("notificationList.php")
    Call<NotificationListWrapper> getNotificationList();



    @POST("getStateList.php")
    Call<NGStateWrapper> getStatteList();


    @FormUrlEncoded
    @POST("getserviceslist.php")
    Call<ServiceDropDownWrapper> getServiceDropdonw(@Field("pid") String pid);



    @FormUrlEncoded
    @POST("payment_status_update.php")
    Call<PaymentDoneWrapper> getDonePayment(@Field("eid") String pid,@Field("t_ref") String t_ref);


    @FormUrlEncoded
    @POST("pendingJobCompleteJobCount.php")
    Call<PendingJobCompleteJobWrapper> getPendingCompleteJobs(@Field("tid") String pid);


    @FormUrlEncoded
    @POST("payment_customer.php")
    Call<MakePayWrapper> makepay(@Field("cid") String pid);


    @FormUrlEncoded
    @POST("getUserHistory.php")
    Call<HistoryUserWarpper> getHistryOfUsers(@Field("cid") String pid);


    @FormUrlEncoded
    @POST("getpendingJoblist.php")
    Call<TechPendingJobListWrapper> getTechPendingJobList(@Field("tid") String pid);


    @FormUrlEncoded
    @POST("getFaultList.php")
    Call<FaultListWrapper> getFaultList(@Field("e_id") String e_id, @Field("c_id") String c_id, @Field("t_id") String t_id);


    @FormUrlEncoded
    @POST("fault_list_item_remove.php")
    Call<RemoveFaultItemsWrapper> RemoveItemFaultList(@Field("e_id") String e_id, @Field("c_id") String c_id, @Field("t_id") String t_id, @Field("fid") String fid);



    @FormUrlEncoded
    @POST("getAcceptedJobList.php")
    Call<TechAcceptJobListWrapper> getTechAcceptJobList(@Field("tid") String pid);


    @FormUrlEncoded
    @POST("getcompleteJobList.php")
    Call<TechAcceptJobListWrapper> getTechCompletedJobList(@Field("tid") String pid);



    @FormUrlEncoded
    @POST("QrStatusUpdate.php")
    Call<QRScanDetailWrapper> getUpdateQRStatus(@Field("code") String code, @Field("buttonsubmit") String submitcode);

    @FormUrlEncoded
    @POST("getQRStatus.php")
    Call<QRScanUpdateWrapper> getFlagStatus(@Field("code") String code);


    @Multipart
    @POST("file.php")
    Call<okhttp3.ResponseBody> updateProfileRetrofit(@Part MultipartBody.Part item_image);


}