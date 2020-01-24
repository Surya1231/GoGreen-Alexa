package com.example.hackathon;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import androidx.appcompat.app.AppCompatActivity;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentTransaction;

import com.example.hackathon.fragments.Appreport;
import com.example.hackathon.fragments.Busreport;
import com.example.hackathon.fragments.Qrreport;

public class ReportActivity extends AppCompatActivity {


    Button app_button,bus_button,qr_button;

    Fragment appfragment,qrfragment,busfragment;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_report);
        app_button=findViewById(R.id.app_issue);
        bus_button=findViewById(R.id.busissue);
        qr_button=findViewById(R.id.qr_button);

        appfragment=new Appreport();
        busfragment=new Busreport();
        qrfragment=new Qrreport();

        app_button.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                setFragment(appfragment);

            }
        });

        bus_button.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                setFragment(busfragment);


            }
        });


        qr_button.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                setFragment(qrfragment);

            }
        });





    }

    private void setFragment(Fragment f)
    {
        FragmentTransaction ft1 = getSupportFragmentManager().beginTransaction();
        ft1.replace(R.id.report_frame, f, "");
        ft1.commit();
    }
}
