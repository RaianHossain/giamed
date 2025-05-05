<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    // Show all appointments
    public function index()
    {
        $appointments = Appointment::all();
        $total_appointments = $appointments->count();
        return view('appointments.index', compact('appointments', 'total_appointments'));
    }

    // Show create form
    public function create()
    {
        return view('appointments.create');
    }

    // // Store new appointment
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'phone'           => 'required|string|max:20',
            'date'            => 'required|date',
            'time'            => 'required|string|max:20',
            'special_request' => 'nullable|string',
        ]);

        $validated['ip_address'] = $request->ip();

        Appointment::create($validated);

        return redirect()->route('dashboard-appointments')->with('success', 'Appointment created successfully.');
    }

    public function store_api(Request $request)
    {
        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'phone'           => 'required|string|max:20',
            'date'            => 'required|date',
            'time'            => 'required|string|max:20',
            'special_request' => 'nullable|string',
        ]);

        $validated['ip_address'] = $request->ip();

        Appointment::create($validated);

        return response()->json(['success' => true, 'message' => 'Appointment created successfully.']);
    }

    public function update(Request $request, $appointmentId)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,canceled',
        ]);

        $appointment = Appointment::findOrFail($appointmentId);
        $appointment->status = $request->status;
        $appointment->save();

        return response()->json(['success' => true, 'message' => 'Status updated successfully.']);
    }



    // // Show a specific appointment
    // public function show($appointmentId)
    // {
    //     $appointment = Appointment::findOrFail($appointmentId);
    //     return view('appointments.show', compact('appointment'));
    // }

    // // Show edit form
    // public function edit($appointmentId)
    // {
    //     $appointment = Appointment::findOrFail($appointmentId);
    //     return view('appointments.edit', compact('appointment'));
    // }

    // // Update an appointment
    // public function update(Request $request, $appointmentId)
    // {
    //     $appointment = Appointment::findOrFail($appointmentId);

    //     $validated = $request->validate([
    //         'name'            => 'required|string|max:255',
    //         'phone'           => 'required|string|max:20',
    //         'date'            => 'required|date',
    //         'time'            => 'required|string|max:20',
    //         'special_request' => 'nullable|string',
    //         'status'          => 'required|in:pending,confirmed,canceled',
    //     ]);

    //     $validated['ip_address'] = $request->ip();

    //     $appointment->update($validated);

    //     return redirect()->route('dashboard-appointments')->with('success', 'Appointment updated successfully.');
    // }

    // // Delete an appointment
    // public function destroy($appointmentId)
    // {
    //     $appointment = Appointment::findOrFail($appointmentId);

    //     $appointment->update([
    //         'deleted_at' => now(),
    //         'ip_address' => request()->ip(),
    //     ]);

    //     $appointment->delete();

    //     return redirect()->route('dashboard-appointments')->with('success', 'Appointment deleted successfully.');
    // }

    // // Toggle appointment status
    // public function status($appointmentId)
    // {
    //     $appointment = Appointment::findOrFail($appointmentId);

    //     $newStatus = match ($appointment->status) {
    //         'pending'   => 'confirmed',
    //         'confirmed' => 'canceled',
    //         'canceled'  => 'pending',
    //     };

    //     $appointment->update([
    //         'status'     => $newStatus,
    //         'ip_address' => request()->ip(),
    //     ]);

    //     return redirect()->back()->with('success', "Status updated to {$newStatus}.");
    // }
}
