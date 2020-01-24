package com.example.hackathon;

import android.content.Context;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.media.ThumbnailUtils;
import android.net.Uri;
import android.os.Bundle;
import android.provider.MediaStore;
import android.util.DisplayMetrics;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.camerakit.CameraKitView;
import com.example.hackathon.classes.Classification;
import com.example.hackathon.classes.ImageUtils;
import com.example.hackathon.classes.WasteModelConfig;
import com.example.hackathon.classes.waste_classifier;

import java.io.ByteArrayOutputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.ObjectOutputStream;
import java.util.List;

import butterknife.BindView;
import butterknife.ButterKnife;
import butterknife.OnClick;

public class CameraActivity extends AppCompatActivity {

    @BindView(R.id.vCamera)
    CameraKitView vCamera;

    private waste_classifier mnistClassifier;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_camera);
        ButterKnife.bind(this);
        loadMnistClassifier();
        Button button = findViewById(R.id.btnTakePhoto);
        button.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                onTakePhoto();
            }
        });
    }

    private void loadMnistClassifier() {
        try {
            mnistClassifier = waste_classifier.classifier(getAssets(), WasteModelConfig.MODEL_FILENAME);
        } catch (IOException e) {
            Toast.makeText(this, "MNIST model couldn't be loaded. Check logs for details.", Toast.LENGTH_SHORT).show();
            e.printStackTrace();
        }
    }

    @Override
    protected void onStart() {
        super.onStart();
        vCamera.onStart();
    }

    @Override
    protected void onResume() {
        super.onResume();
        vCamera.onResume();
    }

    @Override
    protected void onPause() {
        vCamera.onPause();
        super.onPause();
    }

    @Override
    protected void onStop() {
        vCamera.onStop();
        super.onStop();
    }

    @Override
    public void onRequestPermissionsResult(int requestCode, String[] permissions, int[] grantResults) {
        super.onRequestPermissionsResult(requestCode, permissions, grantResults);
        vCamera.onRequestPermissionsResult(requestCode, permissions, grantResults);
    }

    public void onTakePhoto() {
        ObjectOutputStream oos;
        vCamera.captureImage((cameraKitView, picture) -> {
            Toast.makeText(this, "Picture clicked", Toast.LENGTH_SHORT).show();
            onImageCaptured(picture);
        });
    }


    private void onImageCaptured(byte[] picture) {
        Bitmap bitmap = BitmapFactory.decodeByteArray(picture, 0, picture.length);
        Bitmap squareBitmap = ThumbnailUtils.extractThumbnail(bitmap, getScreenWidth(), getScreenWidth());

        Bitmap preprocessedImage = ImageUtils.prepareImageForClassification(squareBitmap);

//        float recognitions = mnistClassifier.recognizeImage(picture);
      //  int r = (int)recognitions;
      //  Log.d("finalstat", "onImageCaptured: "+r);
    }
    
    private int getScreenWidth() {
        DisplayMetrics displayMetrics = new DisplayMetrics();
        getWindowManager().getDefaultDisplay().getMetrics(displayMetrics);
        return displayMetrics.widthPixels;
    }
}
