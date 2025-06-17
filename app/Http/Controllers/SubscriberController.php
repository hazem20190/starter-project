<?php

namespace App\Http\Controllers;

use App\Models\subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(request $request)
    {
        $data = $request->validate([
            'email' => 'required|unique:subscribers,email|email',
        ]);
        subscriber::create($data);
        return back()->with('status', 'Email subscribe successuflly');
    }
    public function store2(request $request)
    {
        $data2 = $request->validate([
            'email' => 'required|unique:subscribers,email|email',
        ]);
        subscriber::create($data2);
        return back()->with('status2', 'Email subscribe successuflly');
    }
}
