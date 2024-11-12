<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\DoctorSchedule;
use App\Models\Medical_record;
use Carbon\Carbon;
use Exception;
use Faker\Provider\Medical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{

    public function createDoctor(Request $request)
    {
        if(!auth()->guard('admin')->check()){
            return redirect('/login');
        }
        // Validate the form data
        $validatedData = $request->validate([
            'doctor_name' => 'required|string|max:255',
            'email' => 'required|email|unique:doctoraccount,email',
            'phoneNo' => 'required|string|digits_between:7,10',
            'password' => 'required|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,20}$/',
            'dept_id' => 'required|in:1,2,3,4,5,6,7',
            'role_id' => 'required|in: 1,2,3',
            'shift' => 'required|array|max:5',
            'shift.*' => 'string',
        ]);

        // Create a new doctor
        $doctor = Doctor::create([
            'doctor_name' => $validatedData['doctor_name'],
            'email' => $validatedData['email'],
            'phone' => '09' . $validatedData['phoneNo'],
            'password' => bcrypt($validatedData['password']),
            'dept_id' => $validatedData['dept_id'],
            'role_id' => $validatedData['role_id'],
        ]);

        $doctor_id = $doctor->id;

        foreach ($validatedData['shift'] as $shift) {
            list($day, $time) = explode(',', $shift);
            DoctorSchedule::create([
                'doctor_id' => $doctor_id,
                'day' => $day,
                'shift' => $time,
            ]);
        }

        // Redirect to the doctor schedule page
        return redirect()->back()->with('success', 'Doctor added successfully!');
    }

    public function create_dsh_doctor(){
        if(!auth()->guard('admin')->check()){
            return redirect('/login');
        }
        $doctorID = auth()-> guard('doctor') -> user() -> id;
        $today = Carbon::today()->toDateString();
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $appointments = Appointment::where('doctor_id', $doctorID)
            ->whereDate('date', $today)
            ->join('dr_schedule', 'appointments.schedule_id', '=', 'dr_schedule.id')
            ->join('doctoraccount', 'dr_schedule.doctor_id', '=', 'doctoraccount.id')
            ->join('user_account', 'appointments.patient_id', '=', 'user_account.id')
            ->leftJoin('medical_record', 'appointments.id', '=', 'medical_record.appointment_id')
            ->select('appointments.id as appointment_id', 'doctoraccount.*', 'appointments.*', 'user_account.*', 'dr_schedule.shift', 'medical_record.id as medical_record_id')
            ->get();

        $upcomingAppointments = Appointment::where('doctor_id', $doctorID)
            ->whereDate('appointments.date', '>', $today)
            ->join('dr_schedule', 'appointments.schedule_id', '=', 'dr_schedule.id')
            ->join('doctoraccount', 'dr_schedule.doctor_id', '=', 'doctoraccount.id')
            ->join('user_account', 'appointments.patient_id', '=', 'user_account.id')
            ->select('doctoraccount.*', 'appointments.*', 'user_account.*')
            ->get();

        $doctor_today_income = Medical_record::where('dr_schedule.doctor_id', $doctorID)
            ->whereDate('appointments.date', $today)
            ->join('appointments', 'medical_record.appointment_id', '=', 'appointments.id')
            ->join('dr_schedule', 'appointments.schedule_id', '=', 'dr_schedule.id')
            ->join('doctoraccount', 'dr_schedule.doctor_id', '=', 'doctoraccount.id')
            ->join('user_account', 'appointments.patient_id', '=', 'user_account.id')
            ->join('roles', 'doctoraccount.role_id', '=', 'roles.id')
            ->select('medical_record.created_at', 'user_account.username', 'roles.basic_salary')
            ->get();

        $doctor_monthly_income = Medical_record::where('dr_schedule.doctor_id', $doctorID)
            ->whereYear('medical_record.created_at', $currentYear)
            ->whereMonth('medical_record.created_at', $currentMonth)
            ->join('appointments', 'medical_record.appointment_id', '=', 'appointments.id')
            ->join('dr_schedule', 'appointments.schedule_id', '=', 'dr_schedule.id')
            ->join('doctoraccount', 'dr_schedule.doctor_id', '=', 'doctoraccount.id')
            ->join('roles', 'doctoraccount.role_id', '=', 'roles.id')
            ->selectRaw('DATE(medical_record.created_at) as date, COUNT(*) as patient_count, roles.basic_salary')
            ->groupBy('date', 'roles.basic_salary')
            ->get();

        $all_record = DB::table('medical_record')
            ->join('appointments', 'medical_record.appointment_id', '=', 'appointments.id')
            ->join('dr_schedule', 'appointments.schedule_id', '=', 'dr_schedule.id')
            ->join('doctoraccount', 'dr_schedule.doctor_id', '=', 'doctoraccount.id')
            ->join('user_account', 'appointments.patient_id', '=', 'user_account.id')
            ->join('departments', 'doctoraccount.dept_id', '=', 'departments.id')
            ->select('medical_record.current_disease', 'medical_record.medications', DB::raw('DATE(medical_record.created_at) as date'),
                              'dr_schedule.*', 'doctoraccount.doctor_name', 'user_account.username', 'departments.dept_name')
            ->get();

        return view('Dashboards.doctor_dashboard', [
            'appointments' => $appointments,
            'upcomingAppointments' => $upcomingAppointments,
            'doctor_today_income' => $doctor_today_income,
            'doctor_monthly_income' => $doctor_monthly_income,
            'all_record' => $all_record
        ]);
    }

    public function add_record(Request $request){
        if(!auth()->guard('doctor')->check()){
            return redirect('/login');
        }
        $validatedRec = $request->validate([
            'appointment-id' => 'integer',
            'allergies' => 'required|string|max:255',
            'surgery_history' => 'required|string|max:255',
            'family_history' => 'required|string|max:255',
            'past_med_history' => 'required|string|max:255',
            'current_disease' => 'required|string|max:255',
            'medications_data' => 'required|string|max:400',
        ]);

        Medical_record::create([
            'appointment_id' => $validatedRec['appointment-id'],
            'allergies' => $validatedRec['allergies'],
            'surgery_history' => $validatedRec['surgery_history'],
            'family_history' => $validatedRec['family_history'],
            'past_med_history' => $validatedRec['past_med_history'],
            'current_disease' => $validatedRec['current_disease'],
            'medications' => $validatedRec['medications_data'],
        ]);

        return redirect()->back()->with('success', 'Record added successfully!');
    }

    public function update_doctor_account(Request $request)
    {
        if(!auth()->guard('doctor')->check()){
            return redirect('/login');
        }
        $validatedDr = Validator::make($request->all(), [
            'doctor_name' => ['string', 'min:1', 'max:30'],
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

        if ($validatedDr->fails()) {
            return redirect()->back()->withErrors($validatedDr);
        }

        $doctor = auth()->guard('doctor')->user();
        try{
            $doctor->update($request->only('doctor_name', 'email', 'phone'));
            return redirect()->back()->with('success', 'Account updated successfully!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Account update fails!');
        }

        return redirect() -> back();
    }

    public function update_doctor_pwd(Request $request){

        if(!auth()->guard('doctor')->check()){
            return redirect('/login');
        }
        $validated_pwd = $request->validate([
            'old_password' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', 'string', 'min:8', 'max:255', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,20}$/'],
        ]);

        $doctor = auth() -> guard('doctor') -> user();

        if(Hash::check($validated_pwd['old_password'], $doctor['password'])){
            $doctor['password'] = Hash::make($validated_pwd['password']);
            $doctor->save();
            return redirect()->back()->with('success', 'Password updated successfully!');
        }else{
            return redirect()->back()->with('error', 'Old password is incorrect!');
        }
    }

    public function search_doctor(){
        if(!auth()->guard('web')->check()){
            return redirect('/login');
        }
        $depts = Department::all();
        $doctors = Doctor::join('departments', 'doctoraccount.dept_id', '=', 'departments.id')
            ->join('roles', 'doctoraccount.role_id', '=', 'roles.id')
            ->select('doctoraccount.*', 'departments.dept_name', 'roles.role_name')
            ->get();

        return view('doctors', [
            'departments' => $depts,
            'doctors' => $doctors
        ]);
    }

    public function view_med_ai(){
        if(!auth()->guard('web')->check()){
            return redirect('/login');
        }
        return view('medAI');
    }

    public function choose_doctor(){
        if(!auth()->guard('web')->check()){
            return redirect('/login');
        }
        $depts = Department::all();
        $doctors = Doctor::join('departments', 'doctoraccount.dept_id', '=', 'departments.id')
            ->join('roles', 'doctoraccount.role_id', '=', 'roles.id')
            ->select('doctoraccount.*', 'departments.dept_name', 'roles.role_name')
            ->get();

        return view('choose_doctor', [
            'departments' => $depts,
            'doctors' => $doctors
        ]);
    }

    public function booking(){
        if(!auth()->guard('web')->check()){
            return redirect('/login');
        }
        $doctors = Doctor::join('departments', 'doctoraccount.dept_id', '=', 'departments.id')
            ->join('roles', 'doctoraccount.role_id', '=', 'roles.id')
            ->select('doctoraccount.*', 'departments.dept_name', 'roles.role_name')
            ->get();

        $schedules = DoctorSchedule::all();

        return view('dr_booking', [
            'doctors' => $doctors,
            'schedules' => $schedules
        ]);
    }

    public function make_appointment(Request $request){
        if(!auth()->guard('web')->check()){
            return redirect('/login');
        }
        $info = $request->validate([
            'date' => ['required'],
            'patient_id' => ['required'],
            'schedule_id' => ['required'],
            'shift' => ['required'],
            'symptoms' => ['required']
        ]);

        $symptomsArray = json_decode($info['symptoms'], true);

        // Check if decoding was successful
        if (json_last_error() === JSON_ERROR_NONE && is_array($symptomsArray)) {
            $symptomsString = implode(', ', $symptomsArray);
        }

        $schedule_exists = Appointment::join('dr_schedule', 'appointments.schedule_id', '=', 'dr_schedule.id')
            ->where('appointments.patient_id', $info['patient_id'])
            ->where('dr_schedule.shift', $info['shift'])
            ->whereDate('appointments.date', $info['date'])
            ->exists();

        $is_limit_reached = Appointment::where('schedule_id', $info['schedule_id']) -> count() == 5;

        if($schedule_exists){
            return redirect()->back()->withErrors(['error' => 'You already have an appointment on ' . $info['date'] . ' at ' . $info['shift'] . '!']);
        }
        elseif ($is_limit_reached) {
            return redirect()->back()->withErrors(['error' => 'There is no more appointment available for this doctor']);
        }
        else {
            Appointment::create([
                'date' => $info['date'],
                'schedule_id' => $info['schedule_id'],
                'patient_id' => $info['patient_id'],
                'former_symptoms' => $symptomsString
            ]);
        }

        return redirect()->back()->with('success', 'Appointment created!');
    }
}
