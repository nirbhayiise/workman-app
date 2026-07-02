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
import com.np.onei.servicesapp.models.HistoryUserItemsDatum;
import com.np.onei.servicesapp.ui.SatisfyActivity;
import com.np.onei.utils.ApplicationController;

import java.util.List;

public class HistoryListAdapter extends RecyclerView
        .Adapter<HistoryListAdapter
        .DataObjectHolder> {
   Context cntext;
   ApplicationController obj;
    Typeface sonictonicfonts;
    FaultAnalysisItemRemove FAIRObj;
    private static String LOG_TAG = "CategoryRecyclerViewAdapter";
    private List<HistoryUserItemsDatum> mDataset;


    public static class DataObjectHolder extends RecyclerView.ViewHolder
           {
        TextView odrId,servicename,tech,Works,pay,payment,status,pin,feedbck;
        LinearLayout lay1;



        public DataObjectHolder(View itemView) {
            super(itemView);
            odrId = (TextView) itemView.findViewById(R.id.odrId);
            servicename = (TextView) itemView.findViewById(R.id.servicename);
            tech = (TextView) itemView.findViewById(R.id.tech);
            Works = (TextView) itemView.findViewById(R.id.Works);
            pay = (TextView) itemView.findViewById(R.id.pay);
            payment = (TextView) itemView.findViewById(R.id.payment);
            feedbck = (TextView) itemView.findViewById(R.id.feedbck);
            status = (TextView) itemView.findViewById(R.id.status);
            pin = (TextView) itemView.findViewById(R.id.pin);
            lay1 = (LinearLayout) itemView.findViewById(R.id.lay1);

          //  deletefaultItem = (LinearLayout) itemView.findViewById(R.id.deletefaultItem);


            //Log.i(LOG_TAG, "Adding Listener");

        }


    }


    public HistoryListAdapter(Context cnt, List<HistoryUserItemsDatum> myDataset) {
        mDataset = myDataset;
        cntext=cnt;
        obj=(ApplicationController)cntext.getApplicationContext();

    }

    @Override
    public DataObjectHolder onCreateViewHolder(ViewGroup parent,
                                               int viewType) {
        View view = LayoutInflater.from(parent.getContext())
                .inflate(R.layout.enquiry_history_row, parent, false);

        DataObjectHolder dataObjectHolder = new DataObjectHolder(view);
       // cntext=parent.getContext();
        return dataObjectHolder;
    }

    @Override
    public void onBindViewHolder(DataObjectHolder holder, int position) {
//TextView odrId,servicename,tech,Works,pay,payment;
        holder.odrId.setText(mDataset.get(position).getEId());
        holder.servicename.setText(mDataset.get(position).getS_name());
        holder.tech.setText(mDataset.get(position).getTech_name());
        holder.Works.setText(mDataset.get(position).getDetails());
        holder.pay.setText(mDataset.get(position).getAmountPaid());
        holder.status.setText(mDataset.get(position).getWorkFlgStatus());
        holder.payment.setText(mDataset.get(position).getWorkFlgStatus());
        if(mDataset.get(position).getWorkFlgStatus().equals("Complete"))
        {
            holder.feedbck.setVisibility(View.VISIBLE);
            holder.feedbck.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    obj.setReqId(mDataset.get(position).getEId());
                    cntext.startActivity(new Intent(cntext,SatisfyActivity.class));
                }
            });

        }else{
            holder.feedbck.setVisibility(View.GONE);
        }
        holder.pin.setText(mDataset.get(position).getSecurity_code());
             holder.lay1.setOnClickListener(new View.OnClickListener() {
                 @Override
                 public void onClick(View v) {
                  //   FAIRObj.removeFaultItems(mDataset.get(position).getFId());
                 }
             });


    }

    public void addItem(HistoryUserItemsDatum dataObj, int index) {
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