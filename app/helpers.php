<?php

use App\Models\Parcel;
use App\Models\Support;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

  function messageCount(){
    return Support::where('status', 1)->count();
  }

  function unreadMessage(){
    $unreadData = Support::where('status', 1)->orderby('id', 'desc')->get();
    return $unreadData;
  }

  
  function totalCostCount()
  {
    return Parcel::where('status', 'delivery')->sum('totalcosts');
  }
  

  function personaltotalCostCount()
  {
    return Parcel::Where('role', 5)->where('status', 'delivery')->where('auth_id', Auth::id())->sum('totalcosts');
  }
  
  function businesstotalCostCount()
  {
    return Parcel::Where('role', 4)->where('status', 'delivery')->where('auth_id', Auth::id())->sum('totalcosts');
  }
  



  
  function todaytotalincomeCount()
  {
    return Parcel::where('status', 'delivery')->where('created_at', date("Y-m-d"))->get()->sum('totalcosts');
  }

  
  function unpaidtotalincomeCount()
  {
    return Parcel::where('status', '!=' , 'delivery')->get()->sum('totalcosts'); 
  }


  function totalMonthlyIncome(){
        return Parcel::select( 
          DB::raw("(COUNT(*)) as count"),  
          DB::raw("MONTHNAME(created_at) as month_name"),
          DB::raw("sum(totalcosts) as amount")
          )
          ->whereYear('created_at', date('Y'))
          ->groupBy('month_name')->orderBy('month', 'asc')
          ->get();
  }
 

  function activeParcel()
  {
    return Parcel::where('status', '!=', 'delivery')->orderBy('id', 'desc')->limit(3)->get();
  }
  
  function delivaryParcelCosts()
  {
    return Parcel::where('status', 'delivery')->orderBy('id', 'desc')->limit(4)->get();
  }


  function onlineUse()
  {
    return User::where('active', 1)->get();
  }




?>