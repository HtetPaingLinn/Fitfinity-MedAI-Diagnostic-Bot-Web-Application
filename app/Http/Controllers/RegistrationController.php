<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomRequestName;
use App\Models\Admin;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\DoctorSchedule;
use App\Models\Medical_record;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use function Laravel\Prompts\error;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('Auth.registration');
    }

    public function create_dsh_admin(){
        if(!auth()->guard('admin')->check()){
            return redirect('/login');
        }
        $user = auth()-> guard('admin') -> user();
        $doctors = Doctor::join('departments', 'doctoraccount.dept_id', '=', 'departments.id')
            ->join('roles', 'doctoraccount.role_id', '=', 'roles.id')
            ->select('doctoraccount.*', 'departments.dept_name', 'roles.role_name')
            ->paginate(8);

        $schd = DoctorSchedule::whereIn('doctor_id', $doctors->pluck('id'))->get();

        $medical_records = DB::table('medical_record')
            ->join('appointments', 'medical_record.appointment_id', '=', 'appointments.id')
            ->join('dr_schedule', 'appointments.schedule_id', '=', 'dr_schedule.id')
            ->join('doctoraccount', 'dr_schedule.doctor_id', '=', 'doctoraccount.id')
            ->join('departments', 'doctoraccount.dept_id', '=', 'departments.id')
            ->join('roles', 'doctoraccount.role_id', '=', 'roles.id')
            ->select('appointments.*', 'doctoraccount.doctor_name', 'departments.dept_name', 'roles.*')
            ->get();

        $appointments = Appointment::join('dr_schedule', 'appointments.schedule_id', '=', 'dr_schedule.id')
            ->join('doctoraccount', 'dr_schedule.doctor_id', '=', 'doctoraccount.id')
            ->join('roles', 'doctoraccount.role_id', '=', 'roles.id')
            ->join('departments', 'doctoraccount.dept_id', '=', 'departments.id')
            ->select('appointments.date', 'doctoraccount.doctor_name', 'departments.dept_name', 'roles.*')
            ->get();

        $patientCount = Medical_record::join('appointments', 'medical_record.appointment_id', '=', 'appointments.id')
            ->join('dr_schedule', 'appointments.schedule_id', '=', 'dr_schedule.id')
            ->join('doctoraccount', 'dr_schedule.doctor_id', '=', 'doctoraccount.id')
            ->select('doctoraccount.doctor_name', 'appointments.date', DB::raw('COUNT(appointments.id) as total_patients'))
            ->groupBy('dr_schedule.doctor_id', 'appointments.date')
            ->get();

        $totalIncomeAllDay = $appointments->sum(function($appointment) {
            return $appointment->basic_salary + 20000;
        });

        $totalIncomeByDay = $appointments->groupBy(function($appointment) {
            return \Carbon\Carbon::parse($appointment->date)->format('l');
        })->map(function($dayAppointments) {
            return $dayAppointments->sum(function($appointment) {
                return $appointment->basic_salary + 20000;
            });
        });

        $todayUserCount = User::whereDate('created_at', today())->count();
        $totalUserCount = User::count();
        $rate = $totalUserCount > 0 ? ($todayUserCount / $totalUserCount) * 100 : 0;
        $rateChange = number_format($rate, 1);

        $appointmentCount = Appointment::count();

        $topDoctors = Appointment::join('dr_schedule', 'appointments.schedule_id', '=', 'dr_schedule.id')
            ->join('doctoraccount', 'dr_schedule.doctor_id', '=', 'doctoraccount.id')
            ->join('roles', 'doctoraccount.role_id', '=', 'roles.id')
            ->join('departments', 'doctoraccount.dept_id', '=', 'departments.id')
            ->select('doctoraccount.*','departments.dept_name', 'roles.role_name', DB::raw('COUNT(appointments.id) as total_appointments'))
            ->groupBy('dr_schedule.doctor_id')
            ->orderByDesc('total_appointments')
            ->take(5)
            ->get();

        Redirect::setIntendedUrl(url()->previous());
        return view('Dashboards.adm_dashboard1', [
            'user' => $user,
            'doctors' => $doctors,
            'schd' => $schd,
            'appointments' => $appointments,
            'patientCount' => $patientCount,
            'userCount' => $totalUserCount,
            'rate' => $rateChange,
            'appointmentCount' => $appointmentCount,
            'total_income_allDay' => $totalIncomeAllDay,
            'total_income_byDay' => $totalIncomeByDay,
            'topDoctors' => $topDoctors,
            'medical_records' => $medical_records
        ]);
    }

    public function create_dsh2_admin(){
        if(!auth()->guard('admin')->check()){
            return redirect('/login');
        }
        $user = auth()-> guard('admin') -> user();

        Redirect::setIntendedUrl(url()->previous());
        return view('Dashboards.adm_dashboard2', [
            'user' => $user
        ]);
    }

    public function store_admin(Request $request){

        // Validate the request data
        $admin = $request->validate([
            'admin_name' => ['required', 'string', 'min:1', 'max:30'],
            'email' => [
                'required',
                'unique:admin_account,email',
                'string',
                'min:3',
                'max:255',
                'regex:/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/',
            ],
            'phoneNo' => [
                'required',
                'digits_between:7,10'
            ],
            'password' => [
                'required',
                'min:8',
                'max:255',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,20}$/',
            ],
        ]);

        $admin['phone'] = '09' . $admin['phoneNo'];

        // Create the user
        $uuu = Admin::create($admin);

        // Log the user in
        Auth::login($uuu);

        // Redirect to the home page
        return redirect("/");
    }

    public function store(Request $request)
    {
        if(!auth()->guard('web')->check()){
            return redirect('/login');
        }
        $messages = [
            'photo.mimes' => 'You must give a file of type: jpeg, png, jpg, gif.',
        ];
        // Validate the request data
        $user = $request->validate([
            'username' => ['required', 'string', 'min:1', 'max:30'],
            'email' => [
                'required',
                'unique:user_account,email',
                'string',
                'min:3',
                'max:255',
                'regex:/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/',
            ],
            'phoneNo' => [
                'required',
                'digits_between:7,10'
            ],
            'date_of_birth' => [
                'required',
                'date',
                'before_or_equal:-15 years',
                'after_or_equal:-100 years'
            ],
            'password' => [
                'required',
                'min:8',
                'max:255',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,20}$/',
                'confirmed'
            ],
            'weight' => [
                'required',
                'numeric',
                'between:30,300'
            ],
            'height' => [
                'required',
                'numeric',
                'between:50,250'
            ],
            'gender' => [
                'required',
                'in:Male,Female,Other'
            ],
            'blood' => [
                'required',
                'in:A,B,O,AB'
            ],
            'state' => [
                'required'
            ],
            'city' => [
                'required'
            ],
            'citizen' => [
                'required'
            ],
            'NRCnumber' => [
                'required',
                'regex:/^[0-9]{6}$/'
            ],
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ], $messages);

        // Debug uploaded file
        Log::info($request->file('photo'));

        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('images', 'public');
            $user['photo'] = $imagePath;
        } else {
            $defaultProfilePicPath = 'images/default_profile.jpg';
            $user['photo'] = $defaultProfilePicPath;
        }

        // Combine NRC parts into a single string
        $user['NRC'] = $user['state'] . '/' . $user['city'] . $user['citizen'] . $user['NRCnumber'];
        $user['phone'] = '09' . $user['phoneNo'];

        // Remove individual NRC parts from the $user array
        unset($user['state'], $user['city'], $user['citizen'], $user['NRCnumber'], $user['phoneNo']);

        // Create the user
        $uuu = User::create($user);

        // Log the user in
        Auth::login($uuu);

        // Redirect to the home page
        return redirect("/");
    }

    public function update(Request $request)
    {
        if(!auth()->guard('web')->check()){
            return redirect('/login');
        }
        $request->validate([
            'username' => ['min:3', 'max:255'],
            'email' => [
                'string',
                'min:3',
                'max:255',
                'regex:/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/',
            ],
            'phone' => [
                'digits_between:7,11'
            ],
            'blood' => [
                'in:A,B,O,AB'
            ],
        ]);

        $user = Auth::user();

        $user->update($request->only('username', 'email', 'phone', 'blood', 'password'));

        return redirect('/user_profile');
    }

    public function update_admin_account(Request $request)
    {
        if(!auth()->guard('admin')->check()){
            return redirect('/login');
        }
        $validator = Validator::make($request->all(), [
            'admin_name' => ['string', 'min:1', 'max:30'],
            'email' => [
                'string',
                'min:3',
                'max:255',
                'regex:/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/',
            ],
            'phone' => [
                'digits_between:7,11'
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $admin = auth()->guard('admin')->user();
        try{
            $admin->update($request->only('admin_name', 'email', 'phone'));
            return redirect()->back()->with('success', 'Account updated successfully!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Account update fails!');
        }

        return redirect() -> back();
    }

    public function update_admin_pwd(Request $request){

        if(!auth()->guard('admin')->check()){
            return redirect('/login');
        }
        $validated_pwd = $request->validate([
            'old_password' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', 'string', 'min:8', 'max:255', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,20}$/'],
        ]);

        $admin = auth() -> guard('admin') -> user();

        if(Hash::check($validated_pwd['old_password'], $admin['password'])){
            $admin['password'] = Hash::make($validated_pwd['password']);
            $admin->save();
            return redirect()->back()->with('success', 'Password updated successfully!');
        }else{
            return redirect()->back()->with('error', 'Old password is incorrect!');
        }
    }

    public function update_admin_photo(Request $request)
    {
        if(!auth()->guard('admin')->check()){
            return redirect('/login');
        }
        $admin = auth()->guard('admin')->user();

        $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('images', 'public');
            $admin->photo = $photoPath;
        }

        $admin->save();

        return redirect('/adm_dashboard');
    }

    public function update_photo(Request $request)
    {
        if(!auth()->guard('web')->check()){
            return redirect('/login');
        }
        $user = auth()->user();

        $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('images', 'public');
            $user['photo'] = $photoPath;
        }

        $user->save();

        return redirect('/user_profile');
    }

    public function update_pwd(Request $request){
        if(!auth()->guard('web')->check()){
            return redirect('/login');
        }
        $validated = $request->validate([
           'old_password' => ['required', 'string', 'min:8', 'max:255'],
           'password' => ['required', 'confirmed', 'string', 'min:8', 'max:255', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,20}$/'],
        ]);

        $user = Auth::user();

        if(Hash::check($validated['old_password'], $user['password'])){
            $user['password'] = Hash::make($validated['password']);
            $user->save();
            return redirect()->back()->with('success', 'Password updated successfully!');
        }else{
            return redirect()->back()->with('error', 'Old password is incorrect!');
        }
    }

    public function create_login()
    {
        return view('auth.login');
    }

    public function check()
    {
        $role = request()->input('role');
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $user = null;
        $guard = 'web'; // Default guard

        switch ($role) {
            case 'patient':
                $user = User::where('email', $attributes['email'])->first();
                $redirectTo = '';
                break;
            case 'doctor':
                $user = Doctor::where('email', $attributes['email'])->first();
                $guard = 'doctor';
                $redirectTo = 'dr_dashboard';
                break;
            case 'admin':
                $user = Admin::where('email', $attributes['email'])->first();
                $guard = 'admin';
                $redirectTo = 'adm_dashboard';
                break;
            default:
                return back()->withErrors([
                    'role' => 'Invalid role selected.'
                ]);
        }

        if (!$user || !Hash::check($attributes['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => 'Invalid login credentials. Please try again.'
            ]);
        }

        Auth::guard($guard)->login($user);

        request()->session()->regenerate();

        Log::info('Authenticated user:', ['user' => Auth::guard($guard)->user()]);

        return redirect('/' . $redirectTo);
    }

    public function destroy()
    {
        $guard = Auth::guard('admin')->check() ? 'admin' : 'web';
        Auth::guard($guard)->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}


