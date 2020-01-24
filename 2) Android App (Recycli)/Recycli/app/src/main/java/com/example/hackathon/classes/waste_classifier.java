package com.example.hackathon.classes;

import android.content.res.AssetFileDescriptor;
import android.content.res.AssetManager;
import android.graphics.Bitmap;
import android.util.Log;

import org.tensorflow.lite.Interpreter;

import java.io.FileInputStream;
import java.io.IOException;
import java.nio.ByteBuffer;
import java.nio.ByteOrder;
import java.nio.channels.FileChannel;
import java.util.ArrayList;
import java.util.List;
import java.util.PriorityQueue;

import static com.example.hackathon.classes.WasteModelConfig.CLASSIFICATION_THRESHOLD;
import static com.example.hackathon.classes.WasteModelConfig.MAX_CLASSIFICATION_RESULTS;


public class waste_classifier {
    private final Interpreter interpreter;

    private waste_classifier(Interpreter interpreter){
        this.interpreter = interpreter;
    }
    public static waste_classifier classifier(AssetManager assetManager, String modelPath) throws IOException {
        ByteBuffer byteBuffer = loadModelFile(assetManager, modelPath);
        Interpreter interpreter = new Interpreter(byteBuffer);
        return new waste_classifier(interpreter);
    }
    private static ByteBuffer loadModelFile(AssetManager assetManager, String modelPath) throws IOException {
        AssetFileDescriptor fileDescriptor = assetManager.openFd(modelPath);
        FileInputStream inputStream = new FileInputStream(fileDescriptor.getFileDescriptor());
        FileChannel fileChannel = inputStream.getChannel();
        long startOffset = fileDescriptor.getStartOffset();
        long declaredLength = fileDescriptor.getDeclaredLength();
        return fileChannel.map(FileChannel.MapMode.READ_ONLY, startOffset, declaredLength);
    }

    public float[][] recognizeImage(Bitmap bitmap) {
        float[][] result = new float[1][1];
        result[0][0] = 2;
        Log.d("vedu", "recognizeImage: "+result[0][0]);
        ByteBuffer byteBuffer = convertBitmapToByteBuffer(bitmap);
       // float[] result=0;
        Log.d("check", "recognizeImage: ");
        interpreter.run(byteBuffer, result);
        Log.d("vedu", "recognizeImage: "+result[0][0]);
        return result;
    }

    private ByteBuffer convertBitmapToByteBuffer(Bitmap bitmap) {
        ByteBuffer byteBuffer = ByteBuffer.allocateDirect(WasteModelConfig.MODEL_INPUT_SIZE);
        byteBuffer.order(ByteOrder.nativeOrder());
        int[] pixels = new int[WasteModelConfig.INPUT_IMG_SIZE_WIDTH * WasteModelConfig.INPUT_IMG_SIZE_HEIGHT];
        bitmap.getPixels(pixels, 0, bitmap.getWidth(), 0, 0, bitmap.getWidth(), bitmap.getHeight());
        for (int pixel : pixels) {
            float rChannel = (pixel >> 16) & 0xFF;
            float gChannel = (pixel >> 8) & 0xFF;
            float bChannel = (pixel) & 0xFF;
            float pixelValue = (rChannel + gChannel + bChannel) / 3 / 255.f;
            byteBuffer.putFloat(pixelValue);
        }
        return byteBuffer;
    }

 /*   private List<Classification> getSortedResult(float[][] resultsArray) {


            float confidence = resultsArray[0][i];
            if (confidence > CLASSIFICATION_THRESHOLD) {
                WasteModelConfig.OUTPUT_LABELS.size();
                sortedResults.add(new Classification(WasteModelConfig.OUTPUT_LABELS.get(i),confidence));
            }


        return new ArrayList<>(sortedResults);
    }*/
}
