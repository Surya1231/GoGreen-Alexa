package com.example.hackathon.fragments;

import android.Manifest;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.net.Uri;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentManager;
import androidx.fragment.app.FragmentTransaction;

import com.example.hackathon.AboutUs;
import com.example.hackathon.EditProfile;
import com.example.hackathon.LoginActivity;
import com.example.hackathon.R;
import com.example.hackathon.ReportActivity;
import com.example.hackathon.adapters.MyListAdapter;
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.android.material.bottomnavigation.BottomNavigationView;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.firestore.DocumentReference;
import com.google.firebase.firestore.DocumentSnapshot;
import com.google.firebase.firestore.FirebaseFirestore;
import com.google.firebase.firestore.Source;


public class Profile_fragment extends Fragment {

    ListView listView;
    String[] listItem;
    String t;

    public Profile_fragment()
    {}

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        final View v=inflater.inflate(R.layout.fragment_profile_fragment,container,false);
        setHasOptionsMenu(true);

        listView=(ListView)v.findViewById(R.id.options);

        FirebaseFirestore db=FirebaseFirestore.getInstance();
        DocumentReference docref=db.collection("User").document(FirebaseAuth.getInstance().getCurrentUser().getPhoneNumber());
        Source source=Source.CACHE;



        docref.get(source).addOnCompleteListener(new OnCompleteListener<DocumentSnapshot>() {
            @Override
            public void onComplete(@NonNull Task<DocumentSnapshot> task) {

                if(task.isSuccessful())
                {

                    DocumentSnapshot document=task.getResult();
                    if(document.exists())
                    {
                        TextView name=(TextView)v.findViewById(R.id.name_value);
                        TextView email=(TextView)v.findViewById(R.id.email_value);
                        TextView tokens=(TextView)v.findViewById(R.id.token_value);
                        TextView phone=(TextView)v.findViewById(R.id.phone_value);
                        name.setText(document.getString("name"));
                        email.setText(document.getString("email"));
                        int tokens1=document.getLong("tokens").intValue();
                        tokens.setText("Balance : " + Integer.toString(tokens1));
                        t = tokens.getText().toString();
                        phone.setText(document.getId());

                    }
                }
                else
                {
                    TextView name=(TextView)v.findViewById(R.id.name_value);
                    TextView email=(TextView)v.findViewById(R.id.email_value);
                    TextView tokens=(TextView)v.findViewById(R.id.token_value);
                    TextView phone=(TextView)v.findViewById(R.id.phone_value);
                    name.setText("Fetching from db");
                    email.setText("Fetching from db");
//                  int tokens1=document.getLong("tokens").intValue();
                    tokens.setText("Fetching from db");
                    phone.setText("Fetching from db");


                }
            }
        });
        setUpOptions();

        //return inflater.inflate(R.layout.fragment_profile_fragment, container, false);
        return v;
    }

    private void setUpOptions() {


        listItem = getResources().getStringArray(R.array.array_options);
        final MyListAdapter adapter=new MyListAdapter(getActivity(), listItem);
        listView.setAdapter(adapter);
        listView.setMinimumHeight(320);
        listView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> adapterView, View view, int position, long l) {
                String value=adapter.getItem(position);
                switch (position)
                {
                    case 0: //Edit profile
                    {

                        startActivity(new Intent(getActivity(), EditProfile.class));

                        Toast.makeText(getContext(),value,Toast.LENGTH_SHORT).show();

                        break;
                    }

//
                    case 1: //Call support
                    {

                        if (ContextCompat.checkSelfPermission(getActivity(),
                                Manifest.permission.CALL_PHONE)
                                != PackageManager.PERMISSION_GRANTED) {

                            ActivityCompat.requestPermissions(getActivity(),
                                    new String[]{Manifest.permission.CALL_PHONE},
                                    101);

                            // MY_PERMISSIONS_REQUEST_CALL_PHONE is an
                            // app-defined int constant. The callback method gets the
                            // result of the request.
                        } else {
                            //You already have permission
                            try {
                                Intent callIntent = new Intent(Intent.ACTION_CALL);
                                callIntent.setData(Uri.parse("tel:" + "7016210268"));//change the number
                                startActivity(callIntent);
                            } catch (SecurityException e) {
                                e.printStackTrace();
                            }
                        }

                        break;
                    }
                    case 2://Info fragment
                    {
                        BottomNavigationView navigationView =(BottomNavigationView) getActivity().findViewById(R.id.bottom_nav);
                        navigationView.getMenu().getItem(0).setChecked(true);
                        FragmentManager fragmentManager=getActivity().getSupportFragmentManager();
                        FragmentTransaction fragmentTransaction=fragmentManager.beginTransaction();
                        fragmentTransaction.replace(R.id.main_frame,new info_fragment());
                        fragmentTransaction.addToBackStack(null);
                        fragmentTransaction.commit();
                        break;
                    }
                    case 3://report an issue
                    {
                        startActivity(new Intent(getActivity(), ReportActivity.class));

                        break;
                    }
                    case 4://about us
                    {
                        startActivity(new Intent(getActivity(), AboutUs.class));


                        break;
                    }


                }






            }
        });

    }

    public void logout()
    {
        FirebaseAuth firebaseAuth;
        FirebaseAuth.AuthStateListener authStateListener = new FirebaseAuth.AuthStateListener() {
            @Override
            public void onAuthStateChanged(@NonNull FirebaseAuth firebaseAuth) {
                if (firebaseAuth.getCurrentUser() == null){
                    //Do anything here which needs to be done after signout is complete
                    startActivity(new Intent(getActivity(), LoginActivity.class));
                }
                else {
                }
            }
        };
//Init and attach
        firebaseAuth = FirebaseAuth.getInstance();
        firebaseAuth.addAuthStateListener(authStateListener);

//Call signOut()
        firebaseAuth.signOut();
    }


    @Override
    public void onCreateOptionsMenu(Menu menu, MenuInflater inflater) {
        super.onCreateOptionsMenu(menu, inflater);
        inflater.inflate(R.menu.main, menu);
    }

    //handle option clicks

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {

        int id = item.getItemId();
        switch (id) {
            case R.id.action_logout:
                FirebaseAuth.getInstance().signOut();
                getActivity().finish();
                startActivity(new Intent(getActivity(), LoginActivity.class));
                break;
        }
        return super.onOptionsItemSelected(item);
    }


}
