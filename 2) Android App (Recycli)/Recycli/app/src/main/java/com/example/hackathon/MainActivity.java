package com.example.hackathon;

import android.graphics.Color;
import android.graphics.drawable.ColorDrawable;
import android.os.Bundle;
import android.util.Log;
import android.view.MenuItem;

import androidx.annotation.NonNull;
import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentTransaction;

import com.example.hackathon.fragments.Home_fragment;
import com.example.hackathon.fragments.info_fragment;
import com.example.hackathon.fragments.Profile_fragment;
import com.example.hackathon.fragments.Ticket_fragment;
import com.google.android.material.bottomnavigation.BottomNavigationView;

public class MainActivity extends AppCompatActivity {

    BottomNavigationView botnavview;
    Home_fragment home_fragment;
    Ticket_fragment ticket_fragment;
    info_fragment info_fragment;
    Profile_fragment profile_fragment;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        ActionBar ab = getSupportActionBar();
        ab.setBackgroundDrawable(getResources().getDrawable(R.drawable.mygradation));


        Log.e("fragments", "oncreate");
       // getSupportActionBar().setTitle(Html.fromHtml("<font color=\"white\">" + getString(R.string.app_name) + "</font>"));
        botnavview=findViewById(R.id.bottom_nav);
        info_fragment=new info_fragment();
        ticket_fragment=new Ticket_fragment();
        profile_fragment=new Profile_fragment();
        setFragment(ticket_fragment



        );
        Log.e("fragments", "oncreate");
        botnavview.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem menuItem) {

                switch (menuItem.getItemId())
                {
                    case R.id.info_nav:
                        setFragment(ticket_fragment);
                        return true;

                    case R.id.recycle_nav:
                        setFragment(info_fragment);
                        return true;

                    case R.id.profile_nav:
                        setFragment(profile_fragment);
                        return true;

                    default:
                        Log.e("Fragment", "home");
                        setFragment(home_fragment);
                        return true;
                }

            }
        });

    }

    //@Override
//    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
//        super.onActivityResult(requestCode, resultCode, data);
//        if (requestCode == 0) {
//
//            if (resultCode == RESULT_OK) {
//                String contents = data.getStringExtra("SCAN_RESULT");
//                Toast.makeText(this, "Qr success",Toast.LENGTH_SHORT).show();
//                home_fragment.setTextViewText(contents);
//                Log.d("Fragment", "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"+contents);
//
//
//
//
//            }
//            if(resultCode == RESULT_CANCELED){
//
//
//
//                Log.d("Fragment", "111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111");
//                home_fragment.setTextViewText("Noooo");
//                Toast.makeText(this, "Qr fail",Toast.LENGTH_SHORT).show();
//
//                //handle cancel
//            }
//        }
//    }



    private void setFragment(Fragment f)
    {
        Log.e("Fragment", "home");
        FragmentTransaction ft1 = getSupportFragmentManager().beginTransaction();
        ft1.replace(R.id.main_frame, f, "");
        ft1.commit();
    }


}
