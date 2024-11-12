<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('Dashboards.mainpage');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Med AI
    Route::get('/med_ai', [DoctorController::class, 'view_med_ai']);
    Route::get('/choose_doctor', [DoctorController::class, 'choose_doctor']);
    Route::get('/dr_booking', [DoctorController::class, 'booking']);
    Route::post('/make_appointment', [DoctorController::class, 'make_appointment']);
    Route::get('/user_profile', function (){
        $user = Auth::user();

        $quotes = [
            "Health is a state of complete physical, mental, and social well-being and not merely the absence of disease or infirmity - World Health Organization",
            "Health is the greatest gift, contentment the greatest wealth, faithfulness the best relationship - Buddha",
            "He who has health has hope; and he who has hope, has everything - Thomas Carlyle",
            "Give a man health and a course to steer, and he'll never stop to trouble about whether he's happy or not - George Bernard Shaw",
            "Health is a state of complete harmony of the body, mind, and spirit - B.K.S. lyengar",
            "Medicine heals doubts as well as diseases.pl - Karl Marx",
            "Take care of your body. It's the only place you have to live in - Jim Rohn",
            "Your body holds deep wisdom — Mart Cylan"
        ];

        $randomQuote = $quotes[array_rand($quotes)];

        return view('profile', [
            'user' => $user,
            'randomQuote' => $randomQuote
        ]);
    });

    Route::patch('/user_profile', [RegistrationController::class, 'update']);
    Route::patch('/user_profile/photo_update', [RegistrationController::class, 'update_photo']);
    Route::patch('/user_profile/password_update', [RegistrationController::class, 'update_pwd']);

// Admin account update
    Route::patch('/account_update', [RegistrationController::class, 'update_admin_account']);
    Route::patch('/password_update', [RegistrationController::class, 'update_admin_pwd']);
    Route::patch('/photo_update', [RegistrationController::class, 'update_admin_photo']);

// Doctor account update
    Route::patch('/dr_account_update', [DoctorController::class, 'update_doctor_account']);
    Route::patch('/dr_password_update', [DoctorController::class, 'update_doctor_pwd']);

// Live search - medical record
    Route::get('/search-medical-records', [DoctorController::class, 'search']);

    Route::post('/filter_view', [RegistrationController::class, 'filter_view']);

    Route::post('/create_doctor', [DoctorController::class, 'createDoctor']);
    Route::get('/dr_dashboard', [DoctorController::class, 'create_dsh_doctor']);

    Route::get('/adm_dashboard', [RegistrationController::class, 'create_dsh_admin']);
    Route::get('/adm_dashboard2', [RegistrationController::class, 'create_dsh2_admin']);

    Route::get('/doctor_schedule', function () {
        return view('Auth.doctor_schedule');
    });

    Route::post('/add_record', [DoctorController::class, 'add_record']);
    Route::get('/doctor_search', [DoctorController::class, 'search_doctor']);
});



// Authentication
Route::get('/register', [RegistrationController::class, 'create']);
Route::post('/register', [RegistrationController::class, 'store']);

// Log in
Route::get('/login', [RegistrationController::class, 'create_login']);
Route::post('/login', [RegistrationController::class, 'check']);
Route::get('/logout', [RegistrationController::class, 'destroy']);

