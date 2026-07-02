package com.np.onei.utils;

import android.content.Context;
import android.database.Cursor;
import android.net.Uri;
import android.provider.MediaStore;

import androidx.loader.content.CursorLoader;

public class CameraUtils {

    static CameraUtils objectRef;
    private  CameraUtils()
    {

    }
    public static CameraUtils getInstanceCamera()
    {
        if(objectRef==null)
        {
            objectRef= new CameraUtils();
        }
        return objectRef;
    }
    public String getRealPathFromURI(Uri contentUri, Context contect) {
        String[] proj = {MediaStore.Images.Media.DATA};
        CursorLoader loader = new CursorLoader(contect, contentUri, proj, null, null, null);
        Cursor cursor = loader.loadInBackground();
        int column_index = cursor.getColumnIndexOrThrow(MediaStore.Images.Media.DATA);
        cursor.moveToFirst();
        String result = cursor.getString(column_index);
        cursor.close();
        return result;
    }

}
