<?php

namespace App\Http\Controllers;

use App\User;
use App\Transaction;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Hash;
use Redirect;
use Auth;

class HomeController extends Controller
{
	/*
	*  Displays merchant login page
	*/
	public function getLogin()
	{
		return view('login');
	}

	/*
	*  Displays merchant registration page
	*/
	public function getRegister()
	{
		return view('register');
	}

	/*
	*  Displays merchant homepage while logged in
	*/
	public function home()
	{
		return view('home');
	}

	/*
	*  Displays merchant profile edit page while logged in
	*/
	public function edit()
	{
		$details = User::where('memberID', Auth::user()->getAuthIdentifier())->first();
		return view('edit')->with('details', $details);
	}

	/*
	*  Performs the action of merchant profile editing and redirects to homepage while logged in
	*/
	public function putEdit()
	{
		$input = Input::all();

		$i = Auth::user()->getAuthIdentifier();

		$rules = array(
			'companyName' => 'required',
            'companyType' => 'required',
            'companyAddress' => 'required',
            'contactPerson' => 'required',
            'contactDesignation' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',
            'bankAccountTitle' => 'required',
            'bankAccountNumber' => 'required',
            'bankName' => 'required',
            'branch' => 'required'
			);
		
		$v = Validator::make($input, $rules);

		if($v->passes())
		{
			$companyName = $input['companyName'];
			$companyType = $input['companyType'];
			$companyAddress = $input['companyAddress'];
			$contactPerson = $input['contactPerson'];
			$contactDesignation = $input['contactDesignation'];
			$mobile = $input['mobile'];
			$email = $input['email'];
			$bankAccountTitle = $input['bankAccountTitle'];
			$bankAccountNumber = $input['bankAccountNumber'];
			$bankName = $input['bankName'];
			$branch = $input['branch'];

			//$ip = $input['ip'];
			//$active = $input['active'];

			$user = User::where('memberID',Auth::user()->getAuthIdentifier())->first();
			
			User::where('memberID',Auth::user()->getAuthIdentifier())->update(array(
	            'companyName' => $companyName,
	            'companyType' => $companyType,
	            'companyAddress' => $companyAddress,
	            'contactPerson' => $contactPerson,
	            'contactDesignation' => $contactDesignation,
	            'mobile' => $mobile,
	            'email' => $email,
	            'bankAccountTitle' => $bankAccountTitle,
	            'bankAccountNumber' => $bankAccountNumber,
	            'bankName' => $bankName,
	            'branch' => $branch
	            //'ip' => $ip,
	            //'active' => $active
        	));

        	return Redirect::to('home');

        } else {

			return Redirect::to('edit')->withInput()->withErrors($v);
		}
		
	}

	/*
	*  Displays the page for password change while logged in
	*/
	public function editPassword()
	{
		$details = User::where('memberID', Auth::user()->getAuthIdentifier())->first();
		return view('editPassword')->with('details', $details);
	}

	/*
	*  Performs the action of password change and redirects to homepage while logged in
	*/
	public function putEditPassword()
	{
		$input = Input::all();

		$i = Auth::user()->getAuthIdentifier();

		$rules = array(
			'current' => 'required',
            'password' => 'required|confirmed'
			);
		
		$v = Validator::make($input, $rules);

		if($v->passes())
		{
			$credentials = array
			    (
			    	'memberID' => $i,
			        'password' => md5($input['current'])
			    );

			$user = User::where($credentials)->first();

			if(!empty($user)){

				$password = $input['password'];
				$password = md5($password);

				$user = User::where('memberID',Auth::user()->getAuthIdentifier())->first();
				
				User::where('memberID',Auth::user()->getAuthIdentifier())->update(array(
		            'password' => $password
	        	));

	        	return Redirect::to('home');

	        } else {

			return Redirect::to('editPassword');

        	}

		} else {

			return Redirect::to('editPassword')->withInput()->withErrors($v);
		}
		
	}

	/*
	*  Displays TX Details page of merchant while logged in
	*/
	public function transactions()
	{
		$transactions = Transaction::where('merchant_id', Auth::user()->getAuthIdentifier())->get();

        return view('transactions')->with('transactions', $transactions);
	}

	/*
	*  Performs the action of merchant registration and redirects to merchant login page
	*/
    public function postRegister()
    {
		$input = Input::all();

		$rules = array(
			'companyName' => 'required',
            'companyType' => 'required',
            'companyAddress' => 'required',
            'contactPerson' => 'required',
            'contactDesignation' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',
            'bankAccountTitle' => 'required',
            'bankAccountNumber' => 'required',
            'bankName' => 'required',
            'branch' => 'required',
            'password' => 'required|confirmed'
			);
		
		$v = Validator::make($input, $rules);

		if($v->passes())
		{
			$password = $input['password'];
			$password = md5($password);

			$member = new User();

			$member->companyName = $input['companyName'];
			$member->companyType = $input['companyType'];
			$member->companyAddress = $input['companyAddress'];
			$member->contactPerson = $input['contactPerson'];
			$member->contactDesignation = $input['contactDesignation'];
			$member->mobile = $input['mobile'];
			$member->email = $input['email'];
			$member->bankAccountTitle = $input['bankAccountTitle'];
			$member->bankAccountNumber = $input['bankAccountNumber'];
			$member->bankName = $input['bankName'];
			$member->branch = $input['branch'];
			$member->password = $password;
			$member->ip = '69.143.94.33';
			$member->active = 'Yes';
			
			if($member->save()){
				return Redirect::to('/');
			}
			else{
				return Redirect::to('register');
			}

		} else {

			return Redirect::to('register')->withInput()->withErrors($v);
		}
	}

	/*
	*  Performs the action of merchant login and redirects to homepage when logged in
	*/
	public function postLogin()
	{
		$rules = array
        (
                    'memberID' => 'required',
                    'password' => 'required'
        );

        $allInput = Input::all();
        $validation = Validator::make($allInput, $rules);

        // dd($allInput);


        if ($validation->fails())
        {

            return Redirect::to('/')
                        ->withInput()
                        ->withErrors($validation);
        } else
        {

            $credentials = array
            (
                        'memberID' => $allInput['memberID'],
                        'password' => md5($allInput['password'])
            );

            $user = User::where($credentials)->first();
            
            if($user){

	            $loggedin = Auth::login($user);
	            
	            if (Auth::user())
	            {
	            	return redirect()->intended('home');

	            } else
	            {
	                return Redirect::to('/')
	                            ->withInput()
	                            ->withErrors('Error in Email Address or Password.');
	            }

            }else{
            	return Redirect::to('/')
	                            ->withInput()
	                            ->withErrors('Error in Email Address or Password.');
            }
        }
        return 'Do Login Executes';
	}

	/*
	*  Performs the action of merchant logout and redirects to merchant login page
	*/
	public function logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}

}
