<?php

namespace App\Http\Services;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\TeacherAssignRequest;
use App\Notifications\TeacherAssigned;

class TeacherAssignService
{

    public function __construct(TeacherAssignRequest $request)
    {
        $this->request = $request;
    }

    public function assign()
    {
        try {

            $result = DB::transaction(function () {
                foreach ($this->request->data as $data) {
                    $user = User::find($data['teacher_id']);
                    $student = User::find($data['student_id']);
                    if ($user->hasRole('Teacher') && $student->hasRole('Student')) { {
                            $user->assigned()->sync($data['student_id']);
                            $user->notify(new TeacherAssigned($student));
                        }
                    }
                }
                return true;
            });
            if (!empty($result)) {
                return response()->json(['success' => 'Assignement Successfull.'], 200);
            } else {
                return response()->json(['error' => 'Issue with Assignement.'], 500);
            }
        } catch (\Throwable $th) {
            Log::error($th);
        }
    }
}
