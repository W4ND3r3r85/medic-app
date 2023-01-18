<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Validation\Rule;
use App\Models\User;

class AppointmentsController extends Controller
{
    public function store(){
       $x = request()->validate([
            'appointment_date' => ['required','date','after:tomorrow']
        ]);

    Appointment::create([
        'user_id' => auth()->user()->id,
        'appointment_date' => request('appointment_date'),
    ]);
        return redirect('user-appointments')->with('success', 'Your appointment has been submitted for approval.');
    }

    public function index()
    {
        $appointments = Appointment::with('user')->paginate(20);
        return view('appointments', compact('appointments'));
    }

    public function show()
    {
        $appointments = Appointment::where('user_id', '=', auth()->user()->id)->get();
        return view('user-appointments', compact('appointments'));
    }

    public function delete()
    {
        Appointment::where('appointment_date', '=', request('appointment_date'))->delete();
        return redirect('/')->with('success','Your appointment has been deleted, please choose another more suitable time for you.');
    }

    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'status' => ['string'],
            'message' => ['exclude_if:status,approved', 'string', 'required']
        ]);
        $appointment->update(['status' => $request->status]);
        if($request->status == 'rejected') {
            Message::create([
                'appointment_id' => $appointment->id,
                'message' => $request->message,
                'type' => 'reject'
            ]);
        }
        return redirect('appointments')->with('success', __('messages.appointment.' . $request->status));
    }
}
