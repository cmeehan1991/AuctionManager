<?php 
namespace App\Http\Controllers;

session_start(); 

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class UserController extends Controller{
	
	public function login(){
		$username = filter_input(INPUT_POST, 'username');
		$password = filter_input(INPUT_POST, 'password');
		
		$results = DB::select("SELECT user_id, org_id, first_name, last_name, organization_name FROM all_users INNER JOIN organizations ON all_users.org_id = organizations.organization_id WHERE (username = ? or email = ?) AND password = MD5(?)", [$username, $username, $password]);
		
		if($results){
			$response = array();
			foreach($results as $result){
				
				$response['user_id']	= $result->user_id;
				$response['success'] 	= true;
				
				$_SESSION['user_id'] = $result->user_id;
				$_SESSION['organization_id'] = $result->org_id;
				$_SESSION['user_first_name'] = $result->first_name;
				$_SESSION['user_last_name'] = $result->last_name;
				$_SESSION['organization_name'] = $result->organization_name;
			}
		}else{
			$response = array(
				'success'	=> false,
				'message'	=> 'Invalid username or password'
			);
		}
					
		return json_encode($response);
	}
}