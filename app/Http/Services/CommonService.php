<?php

namespace App\Http\Services;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

use Illuminate\Http\Request;

class CommonService
{

    public function __construct(Request $request)
    {
        //UserUpdateRequest $request
        $this->request = $request;
    }

    public function userProfile(User $user)
    {
        return $user->load('profile');
    }

    public function userUpdateProfile(User $authuser)
    {
        try {
          //  $validated = $this->request->validated();
            $result = DB::transaction(function () use($authuser) {
                $user = $authuser->update([
                    'name' => $this->request->name,
                    'address' => $this->request->address,
                    'password' => Hash::make($this->request->password),
                    'ref_status_id' => 2,
                ]);

                if ($this->request->file('profile_picture')) {
                    $fileName = time() . '_' . $this->request->file('profile_picture')->getClientOriginalName();
                    $filePath = $this->request->file('profile_picture')->storeAs('uploads/student/avatar', $fileName, 'public');
                    $fileName = time() . '_' . $this->request->file('profile_picture')->getClientOriginalName();
                }

                $profile =  UserProfile::where('user_id',$authuser->id)->update([
                    'profile_picture' => $fileName,
                    'current_school_name' => $this->request->current_school_name,
                    'parent_details' => $this->request->parent_details,
                    'previous_school_name' => $this->request->previous_school_name,
                    'ref_status_id' => 1,
                ]);

                return compact('authuser', 'profile');
            });
            if (!empty($result['profile'])) {
                return response()->json(['token' => $result['authuser']], 200);
            } else {
                return response()->json(['error' => 'Something went wrong.'], 500);
            }
        } catch (\Throwable $th) {
            Log::error($th);
            //return response()->json(['error' => $th->getMessage()], 500);
        } finally {
            if (!empty($th)) {
                if ($th instanceof QueryException || $th instanceof \Throwable)
                    return response()->json(['error' => 'Something went wrong.'], 500);
            }
        }
    }
}
