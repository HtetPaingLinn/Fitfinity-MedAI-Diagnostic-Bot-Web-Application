<?php
namespace App\Http\Controllers;

use App\Http\Requests\CustomRequestName;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
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

    public function submit_doctor_data(Request $request)
    {
        $doctor = $request -> validate([
            'doctor_name' => ['required', 'string', 'min:1', 'max:30'],
            'email' => [
                'required',
                'unique:doctoraccount,email',
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
            'dept_id' => [
                'required',
                'in:1,2,3,4,5,6,7'
            ],
            'role_id' => [
                'required',
                'in: 1,2,3'
            ]
        ]);
        $doctor['phone'] = '09' . $doctor['phoneNo'];

        // Create the user
        $uuu = Doctor::create($doctor);

        // Log the user in
        Auth::login($uuu);
        $request->session()->put('form1_data', $doctor);

        return redirect('/adm_dashboard')->with('form1Submitted', true);
    }
    public function submit_doctor_schedule(Request $request)
    {
        $validatedData = $request->validate([
            'phone' => 'required|string|max:15',
            'city' => 'required|string|max:255',
        ]);

        $form1Data = $request->session()->get('form1_data');

        $allData = array_merge($form1Data, $validatedData);

        $request->session()->forget('form1_data');

        return redirect('/adm_dashboard');
    }
}




