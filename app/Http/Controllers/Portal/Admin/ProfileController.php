<?php

namespace App\Http\Controllers\Portal\Admin;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        $participant = Participant::find($id);
        return view('portal.admin.register.profile', compact('participant'));
    }

    public function application($id)
    {
        $participant = Participant::find($id);
        return view('portal.admin.register.application', compact('participant'));
    }

    public function payment($id)
    {
        $participant = Participant::find($id);
        return view('portal.admin.register.payment', compact('participant'));
    }
}
