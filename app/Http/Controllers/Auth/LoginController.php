<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Services\NewsServiceInterface;
use App\Contracts\Services\UsersServiceInterface;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UsersServiceInterface $usersService, NewsServiceInterface $newsService)
    {
        $this->middleware('guest')->except('logout');
        $this->usersService = $usersService;
        $this->newsService = $newsService;
    }

    /**
     * login function
     *
     * @param Request $request
     * @return void
     */

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $inputVal = $this->usersService->login($request);

        if (Auth::attempt(['email' => $inputVal['email'], 'password' => $inputVal['password']])) {
            if (auth()->user()->is_admin == 1) {
                return redirect()->route('admin.home');
            } else {
                $news = $this->newsService->getAllNews();
                return redirect()->route('news.list', compact('news'));
            }
        } else {
            return redirect()->route('users.loginPage')
                ->with('error', config('constant.LOGIN_ERROR_MSG'));
        }
    }

    /**
     * go login page function
     *
     * @return void
     */

    public function getLoginPage()
    {
        return view('auth.login');
    }
}
