<?php
/**
 * Class AuthenticateController
 */
 class AuthenticateController extends BaseController{
 	
	//home
	public function home(){
		return View::make('index');
	}
	
	public function index(){
		
		//if user did not authenticated
		if(Auth::guest()){
			return View::make('login');
		}else{
			return Redirect::route('home.index');
			//return View::make('index');
		}
	}
	
	//method login check_login
	public function store(){
		
		//get user ->first();
		// $user = CaUser::where('username','=',trim(Input::get('username')))->first();
		
		// //if user exits then verify password
		// if($user!=null){
			// $inputPassword=trim(Hash::make(Input::get('password')));
			
			// //check password
			// if(strcmp($user->password, $inputPassword)==0){
				// Auth::login($user);
				// //Redirect::to('index');
				// return Redirect::route('home.index');
			// }else{
				// return Redirect::route('auth.login');
			// }
		// }
		if(Input::has('username'))
		{
			$data = array('username'=>Input::get('username'),'password'=>Input::get('password'));
			if(Auth::attempt($data))
			{
				return Redirect::route('home.index');
		
			}else{
				return Redirect::route('auth.login');
			}
		}
	}

	//method logout
	public function destroy() {

        // Logout user from Auth Controller
        Auth::logout();

        return Redirect::route('auth.login');
    }
	
 }
