<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Http\Request;

class CommonService
{

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function userProfile(User $user)
    {
        return $user->load('profile');
    }

    public function userUpdateProfile(User $user)
    {
        
    }
}
