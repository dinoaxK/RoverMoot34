<?php

namespace App\Http\Controllers\Portal\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Participant;
use App\Models\ScoutDistrict;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $activities = Activity::all();
        $districts = Participant::distinct()->select('crew_district')->get();
        // echo $districts;
        return view('portal.admin.home', compact('activities', 'districts'));
    }
}
