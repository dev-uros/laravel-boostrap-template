<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivateAccountRequest;
use App\Http\Requests\AuthenticateRequest;
use App\Http\Requests\GenerateResetPasswordEmailRequest;
use App\Services\ActivateAccountService;
use App\Services\GenerateResetPasswordEmailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(private ActivateAccountService $activateAccountService,
    private GenerateResetPasswordEmailService                  $generateResetPasswordEmailService){}
    public function login(){
        return view('auth.login');
    }

    public function authenticate(AuthenticateRequest $request){
        if (Auth::attempt($request->validated())) {

            $request->session()->regenerate();

            return redirect(route('home'));

        }


        return back()->withErrors([

            'email' => 'The provided credentials do not match our records.',

        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();



        $request->session()->invalidate();



        $request->session()->regenerateToken();



        return redirect(route('login'));
    }

    public function setPassword($email, $token){
        return view('auth.set-password',
        ['email'=>$email, 'token'=>$token]);
    }
    public function activateAccount(ActivateAccountRequest $request){
        $userAuthenticated = $this->activateAccountService->handle($request->validated());

        if($userAuthenticated){
            $request->session()->regenerate();
            return redirect(route('home'));
        }else{
            return back()->withErrors([

                'email' => 'The provided credentials do not match our records.',

            ])->onlyInput('email');
        }
    }

    public function forgotPassword(){
        return view('auth.forgot-password');
    }

    public function generateResetPasswordEmail(GenerateResetPasswordEmailRequest $request){

        $this->generateResetPasswordEmailService->handle($request->validated());
        return redirect(route('login'))->with('message', 'Reset password email sent, check your email');
    }

    public function resetPassword($email, $token){
        return view('auth.reset-password',
            ['email'=>$email, 'token'=>$token]);
    }
}
