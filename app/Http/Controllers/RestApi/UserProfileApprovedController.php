<?php

namespace App\Http\Controllers\RestApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\UserApprovalService;

class UserProfileApprovedController extends Controller
{
    public function __construct()
    {

    }

    public function approveProfile(UserApprovalService $userApprovalService)
    {
        return $userApprovalService->approveUserProfile();
    }
}
