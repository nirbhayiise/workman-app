/*
 * Copyright (c) 2017. Truiton (http://www.truiton.com/).
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *       http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * Contributors:
 * Mohit Gupt (https://github.com/mohitgupt)
 *
 */

package com.np.onei.servicesapp.adapters;

import android.annotation.SuppressLint;
import android.content.Context;
import android.content.Intent;
import android.graphics.Typeface;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;

import androidx.recyclerview.widget.RecyclerView;

import com.np.onei.servicesapp.R;
import com.np.onei.servicesapp.intfc.FaultAnalysisItemRemove;
import com.np.onei.servicesapp.models.FaultListItems;
import com.np.onei.servicesapp.models.TechPendingListItems;
import com.np.onei.servicesapp.ui.DetailReqActivity;
import com.np.onei.utils.ApplicationController;

import java.util.List;

public class FaultListAdapter extends RecyclerView
        .Adapter<FaultListAdapter
        .DataObjectHolder> {
   Context cntext;
   ApplicationController obj;
    Typeface sonictonicfonts;
    FaultAnalysisItemRemove FAIRObj;
    private static String LOG_TAG = "CategoryRecyclerViewAdapter";
    private List<FaultListItems> mDataset;


    public static class DataObjectHolder extends RecyclerView.ViewHolder
           {
        TextView faulttxt,prove;
               LinearLayout deletefaultItem;
               ImageView notaprove;


        public DataObjectHolder(View itemView) {
            super(itemView);
            faulttxt = (TextView) itemView.findViewById(R.id.faulttxt);
            prove = (TextView) itemView.findViewById(R.id.prove);
            notaprove = (ImageView) itemView.findViewById(R.id.notaprove);
          //  deletefaultItem = (LinearLayout) itemView.findViewById(R.id.deletefaultItem);


            //Log.i(LOG_TAG, "Adding Listener");

        }


    }


    public FaultListAdapter(Context cnt, List<FaultListItems> myDataset,FaultAnalysisItemRemove Iobj) {
        mDataset = myDataset;
        cntext=cnt;
        obj=(ApplicationController)cntext.getApplicationContext();
        FAIRObj=Iobj;
    }

    @Override
    public DataObjectHolder onCreateViewHolder(ViewGroup parent,
                                               int viewType) {
        View view = LayoutInflater.from(parent.getContext())
                .inflate(R.layout.fault_list_row, parent, false);

        DataObjectHolder dataObjectHolder = new DataObjectHolder(view);
       // cntext=parent.getContext();
        return dataObjectHolder;
    }

    @Override
    public void onBindViewHolder(DataObjectHolder holder, @SuppressLint("RecyclerView") int position) {

             holder.faulttxt.setText(mDataset.get(position).getFDetails());
             try{
                 if(mDataset.get(position).getPay_approve().equals("1"))
                 {
                     holder.prove.setVisibility(View.VISIBLE);
                     holder.notaprove.setVisibility(View.GONE);
                 }else{
                     holder.notaprove.setVisibility(View.VISIBLE);
                     holder.prove.setVisibility(View.GONE);
                 }
                 holder.notaprove.setOnClickListener(new View.OnClickListener() {
                     @Override
                     public void onClick(View v) {
                         FAIRObj.removeFaultItems(mDataset.get(position).getFId());
                     }
                 });
             }catch (Exception e)
             {
                e.printStackTrace();
             }



    }

    public void addItem(FaultListItems dataObj, int index) {
        mDataset.add(index, dataObj);
        notifyItemInserted(index);
    }

    public void deleteItem(int index) {
        mDataset.remove(index);
        notifyItemRemoved(index);
    }

    @Override
    public int getItemCount() {
        return mDataset.size();
    }



}