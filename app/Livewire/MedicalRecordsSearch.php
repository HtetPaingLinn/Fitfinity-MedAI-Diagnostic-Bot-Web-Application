<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Medical_record; // Assuming this is your model

class MedicalRecordsSearch extends Component
{
    use WithPagination;

    public $search = '';

    protected $updatesQueryString = ['search'];

    public function render()
    {
        $all_record = Medical_record::where('username', 'like', '%' . $this->search . '%')
            ->orWhere('doctor_name', 'like', '%' . $this->search . '%')
            ->orWhere('current_disease', 'like', '%' . $this->search . '%')
            ->orWhere('medications', 'like', '%' . $this->search . '%')
            ->join('appointments', 'medical_record.appointment_id', '=', 'appointments.id')
            ->join('dr_schedule', 'appointments.schedule_id', '=', 'dr_schedule.id')
            ->join('doctoraccount', 'dr_schedule.doctor_id', '=', 'doctoraccount.id')
            ->join('user_account', 'appointments.patient_id', '=', 'user_account.id')
            ->select('medical_record.current_disease', 'medical_record.medications', DB::raw('DATE(medical_record.created_at) as date'), 'dr_schedule.*', 'doctoraccount.doctor_name', 'user_account.username')
            ->paginate(12);

        return view('livewire.medical-records-search', ['all_record' => $all_record]);
    }
}

