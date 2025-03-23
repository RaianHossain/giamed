<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function home() {
        $services = Service::where('active', 1)->get();
        return view('client.home', compact('services'));
    }

    public function aboutUs() {
        return view('client.about');
    }

    public function shop() {
        return view('client.shop');
    }

    public function serviceDetails($slug) {
        $service = Service::where('slug', $slug)->first();
        $otherServices = Service::where('id', '!=', $service->id)->take(5)->get();
        return view('client.service-details', compact('service', 'otherServices'));
    }

    public function requestAdvice(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);
        $request->all();
        return redirect()->route('client.home')->with('success', 'Your message has been sent successfully!');
    }

    public function allServices() {
        $services = Service::paginate(10);
        return view('client.all-services', compact('services'));
    }
}
