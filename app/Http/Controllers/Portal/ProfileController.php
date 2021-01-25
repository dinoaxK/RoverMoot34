<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
        // CHANGE PASSWORD
        public function changePassword(Request $request)
        {
            if(Hash::check($request->currentPassword, Auth::user()->password)):
                $validator = Validator::make($request->all(), 
                    [     
                        'newPassword'=> ['required', 'string', 'min:8', 'different:currentPassword'],
                        'reNewPassword'=> ['required', 'string', 'same:newPassword']
                    ],
                    [
                        'same'=>'The password must match with re-type password<br>'
                    ]
                );
                if($validator->fails()):
                    return response()->json(['errors'=>$validator->errors()]);
                else:
                    $password = Hash::make($request->newPassword);
                    if(User::where('id', Auth::user()->id)->update(['password'=>$password])):
                        return response()->json(['success'=>'success']);
                    endif;
                endif;
            else:
                $errors = [
                    'currentPassword'=> 'Current Password Does Not Match'
                ];
                return response()->json(['errors'=>$errors]);
            endif;
            return response()->json(['error'=>'error']);
            
        }
        // /CHANGE PASSWORD
}
