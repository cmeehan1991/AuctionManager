<?php 
namespace App\Http\Controllers;
session_start();

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class DashboardController extends Controller{
	public function getLists(){
		echo "lists";
	}
}