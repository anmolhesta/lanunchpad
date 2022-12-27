<?php

namespace App\Http\Controllers\RestApi;

use App\Http\Controllers\Controller;
use  App\Http\Services\StudentService;
use  App\Http\Services\TeacherService;
use  App\Http\Services\StudentLoginService;
use  App\Http\Services\CommonService;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {

    }
    public function StudentRegister(StudentService $studentService)
    {
        return $studentService->studentRegisterService();
    }

    public function StudentLogin(StudentLoginService $studentLoginService)
    {
        return $studentLoginService->studentLoginService();

    }
    public function UserDetails(CommonService $commonService)
    {
        return $commonService->userProfile(Auth::user());
    }

    public function UserProfileUpdate(CommonService $commonService)
    {
        return $commonService->userUpdateProfile(Auth::user());
    }


    public function TeacherRegister(TeacherService $teacherService)
    {
        return $teacherService->teacherRegisterService();
    }

    public function TeacherUserDetails(CommonService $commonService)
    {
        return $commonService->userProfile(Auth::user());
    }

    public function TeacherUserProfileUpdate(CommonService $commonService)
    {
        return $commonService->userUpdateProfile(Auth::user());
    }
}
