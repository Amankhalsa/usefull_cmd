
<?php

// Get auth Logged user auth Id

use App\Models\Decision;
use App\Models\User;
use App\Models\UserDesignation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

// Get User Id
function authUserId(){
   return auth()->id();
}

// get User Comapny Id
function authCompanyId(){
    return Auth::user()->company_id;
}

// Get Company Profiles
function getProfiles(){
    $profiles = User::select('id')->where('company_id',  auth()->id())->get();    
    return json_decode(json_encode($profiles), true);;
}

// Get Designation
function getDesignation($id){
    $desig = UserDesignation::where('id', $id)->first();
    return $desig->name;
}

// get User Name
function getUserName($id){
    $user = User::where('id', $id)->first();
    return $user->name;
}

// get User email
function getUserEmail($id){
    $user = User::where('id', $id)->first();
    return $user->email;
}
// Mathced user name by name 
// get User email
function getTagedUserDetail($id){
    $user = User::where('username', $id)->first();
    return $user;
}
function getDecision($id){
    $decision = Decision::where('id', $id)->first();
     return $decision;
}
// get User Pic
function getUserPic($id){
    $user = User::where('id', $id)->first();
    return $user->profile_photo_path;
}

// User User image path
function getFilePath($value) {
    return url('/storage'.'/'.$value);
}
// evidence-img  image path
function getEvidanceFiles($value) {
    return url('/storage/evidence-img'.'/'.$value);
}

// Get Time Only
function getTimeOnly($datetime)
{
    return Carbon::parse($datetime)->diffForHumans();
}