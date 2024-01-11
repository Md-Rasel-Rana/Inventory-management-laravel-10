<?php

use App\Http\Controllers\CategoryController;
use App\Http\Middleware\TokenVerificationMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\UserController;




// Web API Routes 
Route::post('/user-Register',[UserController::class,'UserRegistration']);
Route::post('/user-login',[Usercontroller::class,'UserLogin']);
Route::post('/send-Otp',[Usercontroller::class,'SendOTPCode']);
Route::post('/verify-otp',[Usercontroller::class,'verifyOtp']);
Route::post('/reset-password',[UserController::class,'ResetPassword'])->middleware([TokenVerificationMiddleware::class]);

// user Logout admin dashboad 
Route::get('/logOut',[UserController::class,'UserLogout'])->name('logOut');



// Page Routes login logout and otp send reset password
Route::get('/dashBoard',[DemoController::class,'dashBoardPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/userRegistration',[Usercontroller::class,'userRegisterPage'])->name('userRegistration');
Route::get('/userLogin',[Usercontroller::class,'userLoginPage'])->name('userLogin');
Route::get('/sendOtp',[UserController::class,'SendOtpPage']);
Route::get('/verifyOtp',[UserController::class,'VerifyOTPPage']);
Route::get('/resetPassword',[UserController::class,'ResetPasswordPage']);



//Category  Route 
Route::get('/categoryPage',[CategoryController::class,'CategoryPage'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/create-category',[CategoryController::class,'CategoryCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/list-category',[CategoryController::class,'CategoryList'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/update-category",[CategoryController::class,'CategoryUpdate'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/delete-category",[CategoryController::class,'CategoryDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/category-by-id",[CategoryController::class,'CategoryByID'])->middleware([TokenVerificationMiddleware::class]);
