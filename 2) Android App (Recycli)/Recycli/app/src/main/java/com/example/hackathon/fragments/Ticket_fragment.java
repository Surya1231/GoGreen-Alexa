package com.example.hackathon.fragments;


import android.app.Activity;
import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.media.ThumbnailUtils;
import android.os.Bundle;
import android.provider.MediaStore;
import android.util.DisplayMetrics;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentTransaction;

import com.example.hackathon.R;
import com.example.hackathon.classes.Classification;
import com.example.hackathon.classes.ImageUtils;
import com.example.hackathon.classes.MnistClassifier;
import com.example.hackathon.classes.MnistModelConfig;
import com.example.hackathon.classes.WasteModelConfig;
import com.example.hackathon.classes.waste_classifier;

import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.util.List;

import butterknife.ButterKnife;


public class Ticket_fragment extends Fragment {


   // Button scan, request;

    final int CAMERA_PIC_REQUEST = 1337;
    ImageView img;
    View v;
    TextView tv,rate;
    private MnistClassifier mnistClassifier;
    private waste_classifier wasteClassifier;

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        v = inflater.inflate(R.layout.fragment_info_fragment,container,false);
        ButterKnife.bind(getContext(),v);
        loadRecycleClassifier();
        img = v.findViewById(R.id.avatarIv);
        tv = v.findViewById(R.id.res);
        rate = v.findViewById(R.id.rating);
        return v;

    }

    private void loadRecycleClassifier() {
        try {
            mnistClassifier = MnistClassifier.classifier(getContext().getAssets(), MnistModelConfig.MODEL_FILENAME);
        } catch (IOException e) {
            //  Toast.makeText(this, "MNIST model couldn't be loaded. Check logs for details.", Toast.LENGTH_SHORT).show();
            e.printStackTrace();
        }
    }
    @Override
    public void onStart() {
        super.onStart();
        img.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent cameraIntent = new Intent(MediaStore.ACTION_IMAGE_CAPTURE);
                startActivityForResult(cameraIntent,CAMERA_PIC_REQUEST);
                //   Intent intent1 = new Intent(getContext(), CameraActivity.class);
                //    startActivity(intent1);
            }
        });
    }
    @Override
    public void onActivityResult(int requestCode, int resultCode, @Nullable Intent data) {
        if(requestCode==CAMERA_PIC_REQUEST){
            Bitmap image = (Bitmap)data.getExtras().get("data");
            ByteArrayOutputStream str = new ByteArrayOutputStream();
            image.compress(Bitmap.CompressFormat.PNG, 100, str);
            byte[] byteArray = str.toByteArray();
            onImageCaptured(byteArray);

        }

        super.onActivityResult(requestCode, resultCode, data);
    }


    private void onImageCaptured(byte[] picture) {
        Bitmap bitmap = BitmapFactory.decodeByteArray(picture, 0, picture.length);
        Bitmap squareBitmap = ThumbnailUtils.extractThumbnail(bitmap, getScreenWidth1(), getScreenWidth1());

        Bitmap preprocessedImage = ImageUtils.prepareImageForClassification(squareBitmap);
        img.setImageBitmap(bitmap);
        float[][] recognitions = mnistClassifier.recognizeImage(preprocessedImage);
       // tv.setText("Plastic");
       // rate.setText("5");
       Log.d("hello", "onImageCaptured: ");
        int i;
        float max=0;
        int index=0;
        for(i = 0;i<5;i++)
        {
            Log.d("looparr", "onImageCaptured: "+recognitions[0][i]);
            if(recognitions[0][i]>max) {
                max=recognitions[0][i];
                index=i;
                //break;
            }
        }

        tv.setText(MnistModelConfig.OUTPUT_LABELS.get(index).toString());
        switch(index)
        {
            case 0:
                rate.setText("8");
                break;
            case 1:
                rate.setText("7");
                break;
            case 2:
                rate.setText("6");
                break;
            case 3:
                rate.setText("9");
                break;
            case 4:
                rate.setText("5");
                break;

        }
    }

    private int getScreenWidth1() {
        DisplayMetrics displayMetrics = new DisplayMetrics();
        ((Activity)getContext()).getWindowManager().getDefaultDisplay().getMetrics(displayMetrics);
        return displayMetrics.widthPixels;
    }

 /*   private void setFragment(Fragment f)
    {
        Log.e("Fragment", "home");
        FragmentTransaction ft1 = getFragmentManager().beginTransaction();
        ft1.replace(R.id.form, f, "");
        ft1.commit();
    }*/
//
//

}
