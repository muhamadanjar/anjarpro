<?php namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use App\Services\AnjarService;
use App\Lib\AHelper;
use Session;
use App\User;

class CAuthController extends Controller {

    protected $redirectTo = 'dashboard';
    protected $redirectPathEditor = 'map';

    public function __construct(Guard $auth,AnjarService $setting){
        $this->auth = $auth;
        
        $this->setting = $setting;
        $this->_s = new AHelper();
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function getLogin() {

        return view('cauth.login'); //or just use the default login page
    }

    public function postLogin(Request $request) {
     

        $this->validate($request, [
            'username' => 'required', 
            'password' => 'required',
        ]);
        $credentials = $request->only('username', 'password');
        
        if (Auth::attempt($credentials,$request->has('remember')))
        {   
            $user = User::find(Auth::user()->id);
            $user->latestlogin = date('Y-m-d H:i:s');
            $user->save();
            $this->_s->updateSessionMenu();
           
            return redirect()->intended($this->redirectPath());
        }

        

        return redirect($this->loginPath())
                    ->withInput($request->only('username', 'remember'))
                    ->withErrors([
                        'username' => $this->getFailedLoginMessage(),
                    ]);
    }

    

    public function getLogout()
    {
        $this->auth->logout();
       
     
        Session::forget('menusess');
        Session::forget('menusessnav');
        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }

    protected function getFailedLoginMessage()
    {
        return 'Username dan password yang anda masukan salah.';
    }

    public function redirectPath(){
        if (property_exists($this, 'redirectPath'))
        {
            return $this->redirectPath;
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }

    

    public function loginPath()
    {
        return property_exists($this, 'loginPath') ? $this->loginPath : '/cauth/login';
    }

    
}
