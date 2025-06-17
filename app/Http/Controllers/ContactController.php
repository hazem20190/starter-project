<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // public function store(request $request)
    // {
    //     $data = $request->validate([
    //         'name'      => 'required|string',
    //         'email'     => 'required|email',
    //         'subject'   => 'required|string',
    //         'message'   => 'required|string'
    //     ]);
    //     Contact::create($data);
    //     return back()->with('status.contact', 'The message send successfully');
    // }

    public function store(StoreContactRequest $request)
    {
        $data = $request->validated();
        Contact::create($data);
        return back()->with('status.contact', 'The Message Send Successuflly');
    }
}
