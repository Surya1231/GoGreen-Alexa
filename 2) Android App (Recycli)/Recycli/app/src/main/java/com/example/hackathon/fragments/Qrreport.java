package com.example.hackathon.fragments;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.fragment.app.Fragment;

import com.example.hackathon.R;
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.firestore.FirebaseFirestore;
import com.google.firebase.firestore.QueryDocumentSnapshot;
import com.google.firebase.firestore.QuerySnapshot;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

public class Qrreport extends Fragment {


    public Qrreport() {
        // Required empty public constructor
    }

    Spinner stopspinner;
    Button submit_btn;

    EditText et;
    FirebaseFirestore db;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment

        View v =inflater.inflate(R.layout.fragment_qrreport, container, false);
        submit_btn=v.findViewById(R.id.submit_qr);
         et = v.findViewById(R.id.textView10);


        submit_btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                HashMap<String,Object>map=new HashMap<>();
                map.put("tag","qr");
                map.put("phone", FirebaseAuth.getInstance().getCurrentUser().getPhoneNumber().toString());
                map.put("stop",et.getText().toString());

                db.collection("Report").document().set(map);



                Toast.makeText(getContext(),"Report added",Toast.LENGTH_SHORT).show();





            }
        });






        return v;
    }


}
