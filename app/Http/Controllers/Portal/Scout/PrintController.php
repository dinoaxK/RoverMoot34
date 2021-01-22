<?php

namespace App\Http\Controllers\Portal\Scout;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrintController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $participant = Participant::where('user_id', Auth::user()->id)->first();
        return view('portal.scout.application', compact('participant'));
    }
}
