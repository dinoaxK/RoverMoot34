<?php

namespace App\Http\Controllers\Portal\Admin;

use App\Exports\UserExport;
use App\Http\Controllers\Controller;
use App\Mail\AdminCreatedMail;
use App\Mail\GeneralEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Excel;
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
            $data = User::where('users.created_at', '!=', Null);        

            if($request->registration!=null){
                $data = $data->where( 'email_verified_at', '!=', Null )->leftJoin('participants', 'users.id', '=', 'participants.user_id');
                if($request->registration == 0){
                    $data = $data->where('application_submit', 0)->orWhere('payment_submit', 0);
                }else if($request->registration == 1){
                    $data = $data->where('application_submit', 1)->orWhere('payment_submit', 1);
                }else if($request->registration == 2){
                    $data = $data->where('application_proof','!=', Null);
                }else if($request->registration == 3){
                    $data = $data->where('payment_status',1)->orWhere('application_status', 1);
                }else if($request->registration == 4){
                    $data = $data->where('participants.id',Null);
                }
            }
            $data = $data->select('users.id', 'name', 'email', 'role', 'status')->get();
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

    public function edit_user_getdetails(Request $request)
    {
        $user = User::find($request->id);
        return $user;
    }

    public function update_user(Request $request)
    {
        $user = User::find($request->editUserId);
        $user->role = $request->editRole;

        if($user->save()):
            return response()->json(['success'=>'success']);
        endif;
        
        return response()->json(['error'=>'error']);
    }

    function excel(Request $request)
    {

        // $user_data = User::get();
        $user_data = User::where('users.created_at', '!=', Null);        

        if($request->registration!=null){
            $user_data = $user_data->where( 'email_verified_at', '!=', Null )->join('participants', 'users.id', '=', 'participants.user_id');
            if($request->registration == 0){
                $user_data = $user_data->where('application_submit', 0)->orWhere('payment_submit', 0);
            }else if($request->registration == 1){
                $user_data = $user_data->where('application_submit', 1)->orWhere('payment_submit', 1);
            }else if($request->registration == 2){
                $user_data = $user_data->where('application_proof','!=', Null);
            }else if($request->registration == 3){
                $user_data = $user_data->where('payment_status',1)->orWhere('application_status', 1);
            }
        }
        $user_data = $user_data->get();
        foreach($user_data as $user)
        {
            $user_array[] = array(
                $user->id,
                $user->name,
                $user->email, 
                $user->email_verified_at,
                $user->role
            );
        }

        $user_array = new UserExport($user_array);
        return Excel::download($user_array, 'Users_'.date('Y-m-d H:i:s').'.xlsx');

        return redirect()->route('admin.register');


    }

    public function send_email(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'subject' => ['required'],
            'emailBody' => ['required'],
        ]);
       
        $data = User::where('users.created_at', '!=', Null)->where( 'email_verified_at', '!=', Null );        

        if($request->registrationemail!=null){
            $data = $data->where( 'email_verified_at', '!=', Null )->leftJoin('participants', 'users.id', '=', 'participants.user_id');
            if($request->registrationemail == 0){
                $data = $data->where('application_submit', 0)->orWhere('payment_submit', 0);
            }else if($request->registrationemail == 1){
                $data = $data->where('application_submit', 1)->orWhere('payment_submit', 1);
            }else if($request->registrationemail == 2){
                $data = $data->where('application_proof','!=', Null);
            }else if($request->registrationemail == 3){
                $data = $data->where('payment_status',1)->orWhere('application_status', 1);
            }else if($request->registrationemail == 4){
                $data = $data->where('participants.id',Null);
            }
        }
        $data = $data->select('users.id', 'name', 'email', 'role', 'status')->get();

        if($validator->fails()):
            return response()->json(['errors'=>$validator->errors()]);
        else:

            foreach ($data as $participant):
                $details = [
                    'name' => $participant->name,
                    'email' => $participant->email,
                    'message' => $request->emailBody,
                    'subject' => $request->subject
                ];

                // echo $participant->email;
                if(Mail::to($participant->email)->send(new GeneralEmail($details))):
                else: 
                    sleep(10);
                endif;
            endforeach;
            return response()->json(['success'=>'success']);

        endif;
        return response()->json(['error'=>'error']);
    }
}
