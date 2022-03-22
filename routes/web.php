<?php
use App\Http\Controllers\Admin\BusinessParcelController;
use App\Http\Controllers\Admin\CostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Frontend\FrontendIndexController;
use App\Http\Controllers\Frontend\ParcelServiceController;
use App\Http\Controllers\Frontend\CourierServiceController;
use App\Http\Controllers\Admin\OtpVerifyController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingsApiController;
use App\Http\Controllers\Admin\CoverageDistrictController;
use App\Http\Controllers\Admin\CoverageAreaController;
use App\Http\Controllers\Admin\PersonalParcelController;
use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\Admin\AdminParcelController;
use App\Http\Controllers\Admin\RoleManageMentController;
use App\Http\Controllers\Auth\BusinessRegisterController;

use App\Http\Controllers\LocalizationController;
use App\Models\Support;
use Illuminate\Support\Facades\Auth;

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('/', [FrontendIndexController::class, 'index']);
Auth::routes();
// business register route
Route::get('business/register', [BusinessRegisterController::class, 'create'])->name('business.register');
Route::post('business/store', [BusinessRegisterController::class, 'store'])->name('business.register.store');

Route::group(['middleware'=> ['isban', 'auth'] ], function() {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
});
 
Route::middleware(['auth'])->group(function () {

    /*====================================================== 
                    Common Route Start
    /*======================================================*/
  
    Route::get('profile', [ProfileController::class, 'profileView'])->name('view.profile');
    Route::get('profile/edit', [ProfileController::class, 'profileEdit'])->name('profile.edit');
    Route::post('profile/update/', [ProfileController::class, 'updateProfile'])->name('update.profile');
    // change password
    Route::get('password', [ProfileController::class, 'PasswordView'])->name('profile.view');
    Route::post('password/change/', [ProfileController::class, 'changePassword'])->name('password.change');

    // support route
    Route::get('support', [SupportController::class, 'create'])->name('support.create');
    Route::post('support/store', [SupportController::class, 'store'])->name('support.store');
    Route::get('support/message', [SupportController::class, 'messageView'])->name('message.view');
    Route::get('message/single/view/{id}', [SupportController::class, 'messageSingleView'])->name('message.single.view');
    Route::get('support/message/delete/{id}', [SupportController::class, 'messageDelete']);

     
    /*====================================================== 
                    Common Route End
    /*======================================================*/


    /*====================================================== 
                    Admin Route Start
    /*======================================================*/

    // settings controller route
    Route::get('/setting', [SettingsApiController::class, 'settingPageView'])->name('setting.view');
    Route::post('/sms/post', [SettingsApiController::class, 'smsPost']);
    Route::get('/sms/all', [SettingsApiController::class, 'getSMS']);
    Route::get('sms/edit/{id}', [SettingsApiController::class, 'smsEdit']);
    Route::post('sms/udate/{id}', [SettingsApiController::class, 'smsUpdate']);

    // coverage distric
    Route::resource('coverageDistrict', CoverageDistrictController::class);
    Route::get('coverageDistrict/delete/{id}', [ CoverageDistrictController::class, 'coverageDistrictDelete']);

    // Coverage Area
    Route::resource('coverageArea', CoverageAreaController::class);
    Route::get('coverageArea/inactive/{id}', [ CoverageAreaController::class, 'coverageAreaInactive'])->name('coverageArea.inactive');
    Route::get('coverageArea/active/{id}', [ CoverageAreaController::class, 'coverageAreaActive'])->name('coverageArea.active');
    Route::get('coverageArea/delete/{id}', [ CoverageAreaController::class, 'coverageAreaDelete']);

    // admin parcel  
    Route::get('All/Personal/Parcel/', [AdminParcelController::class, 'personalAllParcel'])->name('allPersonalParcelView');
    Route::get('Personal/Parcel/picked/{id}', [AdminParcelController::class, 'personalParcelPicked'])->name('personal.parcel.picked');
    Route::get('Personal/Parcel/Deliver/{id}', [AdminParcelController::class, 'personalParcelDelivery'])->name('personal.parcel.deliver');
    Route::get('Personal/Parcel/Cancel/{id}', [AdminParcelController::class, 'personalParcelCancel'])->name('personal.parcel.cancel');
    Route::get('Single/Personal/Parcel/{id}', [AdminParcelController::class, 'adminSinglePersonalParcel'])->name('adminSinglePersonalParcel');
    Route::get('Personal/Single/Parcel/{id}', [AdminParcelController::class, 'personalSingleParcelView'])->name('personalSingleParcelView');
 
    // admin parcel delete
    Route::get('All/Personal/Parcel/delete/{id}', [AdminParcelController::class, 'adminParcelDelete']);
    Route::get('admintrash', [AdminParcelController::class, 'adminTrashParcelIndex'])->name('admin.trash.parcel.index');


    // Admin View all parcel
    Route::get('All/Payment', [AdminParcelController::class, 'paymentindex'])->name('view.allpayment');


    // Admin view all marchent parcel
    Route::get('All/Business/Parcel/', [AdminParcelController::class, 'marchentAllParcel'])->name('allBusinessParcelView');
    Route::get('Business/Single/Parcel/{id}', [AdminParcelController::class, 'adminSingleBusinessParcelView'])->name('adminSingleBusinessParcelView');

    
    // Admin Cost section
    Route::resource('cost', CostController::class);
    Route::get('cost/delete/{id}', [CostController::class, 'costDelete']);


    // contact
    Route::get('all/users', [RoleManageMentController::class, 'allUserData'])->name('allUsers');
    Route::get('all/merchant', [RoleManageMentController::class, 'allMerchantData'])->name('allMerchant');
    
    Route::get('all/admin', [RoleManageMentController::class, 'allAdminData'])->name('allAdmin');
    Route::get('all/editor', [RoleManageMentController::class, 'allEditorData'])->name('allEditor');
   
    // Role management
    Route::get('change/editor/{id}', [RoleManageMentController::class, 'editorRole'])->name('editor.role.change');
    Route::get('change/admin/{id}', [RoleManageMentController::class, 'adminRole'])->name('admin.role.change');
    Route::get('change/user/{id}', [RoleManageMentController::class, 'userRole'])->name('user.role.change');
    Route::get('change/merchant/{id}', [RoleManageMentController::class, 'merchantRole'])->name('merchant.role.change');
    Route::get('banned/{id}', [RoleManageMentController::class, 'banned'])->name('banned');
    Route::get('banned/active/{id}', [RoleManageMentController::class, 'bannedActive'])->name('banned.active');
    Route::get('/role/delete/{id}', [RoleManageMentController::class, 'roleDelete'])->name('role.delete');
    Route::get('all/banned', [RoleManageMentController::class, 'allbanned'])->name('allbanned');

    /*====================================================== 
                    Admin Route End
    /*======================================================*/ 

     
    /*====================================================== 
                    Personal Route start
    /*======================================================*/

    // Personal page
    Route::get('personal', [PersonalParcelController::class, 'index'])->name('personal.parcel.index');
    Route::get('personal/parcel', [PersonalParcelController::class, 'create'])->name('personal.parcel');
    Route::post('personal/parcel/post', [PersonalParcelController::class, 'parcelPost'])->name('parcel.post');
    
    // Personal Parcel delete
    Route::get('parcel/delete/{id}', [PersonalParcelController::class, 'parcelDelete']);
    Route::get('trash', [PersonalParcelController::class, 'trashParcelIndex'])->name('trash.parcel.index');
    Route::get('trash/parcel/restore/{id}', [PersonalParcelController::class, 'personalParcelRestore']);
    Route::get('trash/parcel/delete/{id}', [PersonalParcelController::class, 'personalParcelPermanentDelete']);

    /*====================================================== 
                    Personal Route start
    /*======================================================*/

 
    /*====================================================== 
                    Business Route start
    /*======================================================*/

    
    // Business parcel
    Route::get('business', [BusinessParcelController::class, 'index'])->name('business.parcel.index');
    Route::get('business/parcel', [BusinessParcelController::class, 'create'])->name('business.parcel');
    Route::get('business/parcel/view/{id}', [BusinessParcelController::class, 'viewBusinessParcel'])->name('business.parcel.view');
    Route::post('business/parcel/post', [BusinessParcelController::class, 'businessParcelPost'])->name('business.post');
 
    Route::get('businessParcel/delete/{id}', [BusinessParcelController::class, 'businessParcelDelete']);
    Route::get('business/trash', [BusinessParcelController::class, 'businessTrashParcelIndex'])->name('business.trash.parcel.index');

    Route::get('business/trash/delete/{id}', [BusinessParcelController::class, 'businessParcelPermanentDelete']);
        
    /*====================================================== 
                    Business Route End
    /*======================================================*/

});

// profile
Route::post('/edit/phone/{id}', [ProfileController::class, 'editPhone'])->name('edi.phone');
Route::get('resend-otp', [OtpVerifyController::class, 'resendOTP'])->name('resend.otp');

// frontend route
Route::get('/verify', [OtpVerifyController::class, 'index'])->name('verify');
Route::post('/post-verify', [OtpVerifyController::class, 'verifyOTP'])->name('verifyOTP');
Route::get('/create/account', [FrontendIndexController::class, 'createAccount'])->name('create.account');
Route::post('/search-area', [FrontendIndexController::class, 'findSearchArea']);

// Localization
Route::get('/language/{locale}', [LocalizationController::class, 'setLang']);

// calculation route
Route::post('/calculation',[FrontendIndexController::class, 'calculation'])->name('calculation');
Route::get('/totalcost', [FrontendIndexController::class, 'calculationTotalCost'])->name('calculationTotalCost');

// Parcel page route
Route::get('/parcel/service', [ParcelServiceController::class, 'index'])->name('parcel.index');

Route::get('/courier/service', [CourierServiceController::class, 'index'])->name('courier.index');
Route::get('/terms', [FrontendIndexController::class, 'termsIndex'])->name('terms.index');

Route::get('/order/track', [FrontendIndexController::class, 'orderTrack'])->name('order.track');








