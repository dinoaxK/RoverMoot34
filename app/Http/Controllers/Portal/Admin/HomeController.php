<?php

namespace App\Http\Controllers\Portal\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Participant;
use App\Models\ScoutDistrict;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        $activities = Activity::latest('created_at')->get();
        $districts = Participant::where('application_submit', 1)->distinct()->select('crew_district')->get();
        // $districts = ScoutDistrict::all();
        // echo $districts;

        
        $file_path = storage_path("logs/laravel.log");
        $laravellog = [];
        if(File::exists($file_path)):
            $laravellog = [
                'lastModified' => new Carbon(File::lastModified($file_path)),
                'size' => File::size($file_path),
                'file' => File::get($file_path)
            ];
        endif;

               
        $file_path1 = storage_path("logs/worker.log");
        $worklog = [];
        if(File::exists($file_path1)):
            $worklog = [
                'lastModified' => new Carbon(File::lastModified($file_path1)),
                'size' => File::size($file_path1),
                'file' => File::get($file_path1)
            ];
        endif;

        return view('portal.admin.home', compact('activities', 'districts', 'laravellog', 'worklog'));
    }

 
}
