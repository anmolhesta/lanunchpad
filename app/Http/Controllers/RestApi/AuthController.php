<?php

namespace App\Http\Controllers\RestApi;

use App\Http\Controllers\Controller;
use  App\Http\Services\StudentService;

class AuthController extends Controller
{
    public function __construct(StudentService $studentService )
    {
        $this->studentService = $studentService;
    }
    public function StudentRegister()
    {
        return $this->studentService->addStudent();
    }
}
