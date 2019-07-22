<?php 
namespace App\Http\Controllers;

session_start();

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class ItemsController extends Controller{
	function getItems(){
		$org_id = $_SESSION['organization_id'];
		
		$items = DB::select("SELECT item_id, item_name, item_description, date_acquired, item_value, quantity FROM auction_items WHERE organization_id = ?", [$org_id]);
				
		return json_encode($items);
	}
	
	function getSingleItem(){
		$item_id = $_POST['item_id'];
		
		$item = DB::select("SELECT item_name, item_description, date_acquired, item_value, quantity, category, donated_by, item_image_url FROM auction_items WHERE item_id = ?", [$item_id]);
		
		return json_encode($item);
	}
	
	function saveSingleItem(){
		$item_id = filter_input(INPUT_POST, 'itemId');
		$item_name = filter_input(INPUT_POST, 'itemName');
		$item_description = filter_input(INPUT_POST, 'itemDescription');
		$date_acquired = filter_input(INPUT_POST, 'dateAcquired');
		$item_value = filter_input(INPUT_POST, 'itemValue');
		$quantity = filter_input(INPUT_POST, 'itemQuantity');
		$category = filter_input(INPUT_POST, 'itemCategory');
		$item_image = file_get_contents($_FILES['itemImage']['tmp_name']);
		
		var_dump($item_image);
		
		$args = array(
			'item_name'			=> $item_name, 
			'item_description'	=> $item_description, 
			'date_acquired'		=> $date_acquired, 
			'item_value'		=> $item_value, 
			'organization_id'	=> $_SESSION['organization_id'], 
			'quantity'			=> $quantity, 
			'category'			=> $category, 
		);
		
		if($item_id){
			$save_item = DB::table('auction_items')->where('item_id', '=', $item_id)->update($args);
		}else{
			$save_item = DB::table('auction_items')->insertGetId($args);
		}
		
		return json_encode($save_item);
		
	}
	
	function deleteItem(){
		$item_id  = filter_input(INPUT_POST, 'item_id');
				
		$delete_item = DB::table('auction_items')->where('item_id', '=', $item_id)->delete();
		
		return json_encode($delete_item);
	}

}