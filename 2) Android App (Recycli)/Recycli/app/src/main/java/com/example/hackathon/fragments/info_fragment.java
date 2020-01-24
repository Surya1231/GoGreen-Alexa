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
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentTransaction;

import com.example.hackathon.CameraActivity;
import com.example.hackathon.R;

import butterknife.ButterKnife;

import com.example.hackathon.classes.Classification;
import com.example.hackathon.classes.ImageUtils;
import com.example.hackathon.classes.MnistClassifier;
import com.example.hackathon.classes.WasteModelConfig;
import com.example.hackathon.classes.waste_classifier;

import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.util.List;

public class info_fragment  extends Fragment {

   waste_classifier mnistClassifier;
   Button scan,request;
   TextView addr;
    final int CAMERA_PIC_REQUEST = 1337;
    View v;
    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        v = inflater.inflate(R.layout.fragment_ticket_fragment, container, false);
        setHasOptionsMenu(true);

        scan = v.findViewById(R.id.scanImage);
//        request = v.findViewById(R.id.request);
        addr = v.findViewById(R.id.catagory);

        scan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

            }
        });
        ButterKnife.bind(getContext(),v);
        loadMnistClassifier();
        return v;
    }
    private void loadMnistClassifier() {
        try {
            mnistClassifier = waste_classifier.classifier(getContext().getAssets(), WasteModelConfig.MODEL_FILENAME);
        } catch (IOException e) {
          //  Toast.makeText(this, "MNIST model couldn't be loaded. Check logs for details.", Toast.LENGTH_SHORT).show();
            e.printStackTrace();
        }
    }
    @Override
    public void onStart() {
        super.onStart();
        scan = v.findViewById(R.id.scanImage);
        scan.setOnClickListener(new View.OnClickListener() {
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

            Bitmap bitmap = BitmapFactory.decodeByteArray(byteArray, 0, byteArray.length);
            Bitmap squareBitmap = ThumbnailUtils.extractThumbnail(bitmap, getScreenWidth(), getScreenWidth());

            Bitmap preprocessedImage = ImageUtils.prepareImageForClassification(squareBitmap);


            float[][] recognitions = mnistClassifier.recognizeImage(preprocessedImage);
            float r = recognitions[0][0];
            float c;
            if(r>=0.6)
                addr.setText("RECYCLABLE");
            else
                addr.setText("ORGANIC");
            Log.d("finalstat", "onImageCaptured: "+r);
        }

        super.onActivityResult(requestCode, resultCode, data);
    }
    private void setFragment(Fragment f)
    {
        Log.e("Fragment", "home");
        FragmentTransaction ft1 = getFragmentManager().beginTransaction();
        ft1.replace(R.id.main_frame, f, "");
        ft1.commit();
    }
    private int getScreenWidth() {
        DisplayMetrics displayMetrics = new DisplayMetrics();
        ((Activity)getContext()).getWindowManager().getDefaultDisplay().getMetrics(displayMetrics);
        return displayMetrics.widthPixels;
    }
}
