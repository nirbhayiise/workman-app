package com.np.onei.servicesapp.intfc;

import com.np.onei.servicesapp.models.NGStateDatum;

import java.util.List;

public interface StateCityCallBack {

void StateListSuccess(List<NGStateDatum> data );
void ErrorStateList();

}
