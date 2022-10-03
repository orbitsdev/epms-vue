<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{

    public function changePassword(ChangePasswordRequest $request, User $user){


        $user->update([
            'password'=> Hash::make($request->password),
        ]);

        return redirect()->route('users.index');
    }
}
