<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request)
    {
        if ($request->user()->hasRole('admin')) {
            return redirect()->to('/admin/dashboard');
        } else {
            return redirect()->to('/');
        }
    }
}
