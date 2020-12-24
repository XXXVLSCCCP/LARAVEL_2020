<?php

namespace App\Http\Controllers\Auth;




use App\Repositories\UserRepository;
use App\User;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $userRepository;
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->userRepository = new UserRepository();


    }

    public function authVk(){
        return Socialite::driver('vkontakte')->redirect();



    }
    public function responseVk(){

        $userData = Socialite::driver('vkontakte')->user();
        $user = $this->userRepository->getOrCreateUserBySocData($userData, 'vkontakte');


        Auth::login($user);

        return redirect('/');




    }


    public function authFacebook(){
        return Socialite::driver('facebook')->redirect();

    }
    public function responseFacebook(){

        $userData = Socialite::driver('facebook')->user();
        $user = $this->userRepository->getOrCreateUserBySocData($userData, 'facebook');

        Auth::login($user);

        return redirect('/');


    }
}
