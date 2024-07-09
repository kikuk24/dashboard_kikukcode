<?php

namespace App\Http\Controllers;

use App\Models\Subscibers;
use Illuminate\Http\Request;
use App\Mail\SubscriptionConfirmation;
use Illuminate\Support\Facades\Mail;

class SubscibersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscibers',
            'name' => 'required'
        ]);

        $subscibers = Subscibers::create([
            'name' => $request->name,
            'email' => $request->email
        ]);

        Mail::to($request->email)->send(new SubscriptionConfirmation($subscibers));

        return redirect()->back()->with('success', 'Terimakasih sudah berlangganan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subscibers $subscibers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscibers $subscibers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subscibers $subscibers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscibers $subscibers)
    {
        //
    }
}
