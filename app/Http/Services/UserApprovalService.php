<?php

namespace App\Http\Services;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserApprovalService
{

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function approveUserProfile()
    {
        try {
            $Validator = Validator::make($this->request->only('user_id','status_id'), [
                'user_id' =>'required|int',
                'status_id' =>'required|int',
            ]);
            $user = User::with('profile')->find($this->request->user_id);
            if ($Validator->fails()) {
                return  $Validator->errors();
             }
             dd($user);
            if(empty($user->ref_status_id) || $user->ref_status_id == 1){

            }

        } catch (\Throwable $th) {
            Log::error($th);
        }
    }
}
