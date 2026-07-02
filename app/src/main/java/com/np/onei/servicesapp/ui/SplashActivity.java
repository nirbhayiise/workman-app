package com.np.onei.servicesapp.ui;

import android.app.PendingIntent;
import android.content.Intent;
import android.os.Bundle;

import android.util.Log;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.np.onei.servicesapp.R;

public class SplashActivity extends AppCompatActivity {


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.spl);

        ImageView logo = findViewById(R.id.splash_logo);
        TextView text = findViewById(R.id.splash_text);

        // Animate the logo with a smooth scale and fade
        logo.animate()
                .alpha(1f)
                .scaleX(1f)
                .scaleY(1f)
                .setDuration(1200)
                .setInterpolator(new android.view.animation.DecelerateInterpolator())
                .start();

        // Animate the text fading in slightly after
        text.animate()
                .alpha(1f)
                .setDuration(1000)
                .setStartDelay(400)
                .start();

        // Navigate to next screen after animation
        new android.os.Handler(android.os.Looper.getMainLooper()).postDelayed(new Runnable() {
            @Override
            public void run() {
                try {
                    Intent indexscreen = new Intent(getBaseContext(), LoginActivity.class);
                    indexscreen.putExtra("key", "value");
                    startActivity(indexscreen);
                    finish();
                } catch(Exception e) {
                    e.printStackTrace();
                }
            }
        }, 2500);
    }
    private Thread.UncaughtExceptionHandler handleCrash =
            new Thread.UncaughtExceptionHandler() {
                @Override
                public void uncaughtException(Thread thread, Throwable e) {
                    Log.e("error", e.toString());
                    Toast.makeText(SplashActivity.this, ""+e.toString(), Toast.LENGTH_SHORT).show();
                    //send email here
                }
            };

}
