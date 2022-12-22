<?php

namespace App\Http\Controllers\RestApi;

use App\Http\Controllers\Controller;
use  App\Http\Services\StudentService;
use  App\Http\Services\StudentLoginService;

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
}
