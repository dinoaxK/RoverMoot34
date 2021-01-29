<?php

namespace App\Http\Controllers\Portal\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AdminCreatedMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
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
        return view('portal.admin.users');
    }

    public function get_users_list(Request $request)
    {
        if ($request->ajax()) {
            $data = User::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function deactivate_user(Request $request)
    {         
        $user = User::find($request->id);

        $user->status = 'deactive';

        if($user->save()):
            return response()->json(['success'=>'success']);
        endif;
        return response()->json(['error'=>'error']); 
    }

    public function activate_user(Request $request)
    {         
        $user = User::find($request->id);

        $user->status = 'active';

        if($user->save()):
            return response()->json(['success'=>'success']);
        endif;
        return response()->json(['error'=>'error']); 
    }

    public function create_user(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'name' => ['required'],
            'password' => ['required', 'string', 'min:8'],
            'reTypePassword' => ['required', 'string', 'same:password'],
            'email' => ['required', 'email', 'unique:users'],
            'role' => ['required'],
        ]);

        if($validator->fails()):
            return response()->json(['errors'=>$validator->errors()]);
        else:
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->role = $request->role;
            $user->status ='active';

                
            $details = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ];

            if($user->save()):

                if(Mail::to($request->email)->send(new AdminCreatedMail($details))):
                    else: 
                        return response()->json(['success'=>'success']);
                    endif;

            endif;
        endif;
        return response()->json(['error'=>'error']);
    }
}
