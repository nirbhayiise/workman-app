package com.np.onei.servicesapp.intfc;

import android.app.Dialog;
import android.content.Context;
import android.view.View;
import android.view.Window;
import android.webkit.WebView;
import android.widget.Button;
import android.widget.EditText;
import android.widget.LinearLayout;

import com.np.onei.servicesapp.R;
import com.np.onei.utils.SingletonObjectAccess;

public interface ForgotPassCallBack {



     default void  PasswordReturn(Context cnt, ForgotPassResultCallBack forgotrst)
    {
        Dialog dialog= SingletonObjectAccess.DialogObjectReturn(cnt);
       // dialog.requestWindowFeature(Window.FEATURE_NO_TITLE);
        dialog.setCancelable(true);
        dialog.setContentView(R.layout.forgotpass);
        EditText mailtxt=(EditText)dialog.findViewById(R.id.mailtxt);
        Button submtmail=(Button)dialog.findViewById(R.id.submtmail);
        submtmail.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                forgotrst.forgotPasswordSuccess(mailtxt.getText().toString());
                dialog.dismiss();
            }
        });
        dialog.show();
    }
}
