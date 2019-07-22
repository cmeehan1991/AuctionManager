var csrf_token = $('meta[name="csrf-token"]').attr('content');

function getItems(){

	console.log(csrf_token);
	var data = {
		'_token': csrf_token,
	};
	
	var items_display = "";
		
	$.post('getItems', data, function(items){
		if(items.length > 0){
			$.each(items, function(key, item){
				items_display += "<tr>";
				items_display += "<td><input type='checkbox'></td>";
				items_display += "<td>" + item.item_id + "</td>";
				items_display += "<td>" + item.item_name + "</td>";
				items_display += "<td>" + item.item_description + "</td>";
				items_display += "<td>" + item.quantity + "</td>";
				items_display += "<td>$" + item.item_value + "</td>";
				items_display += "<td>" + item.date_acquired + "</td>";
				items_display += "<td><a href='auction-manager#!/auction-items/edit/" + item.item_id + "'>Edit</a></td>";
				items_display += "<td><a href='#' onclick='return deleteItem(" + item.item_id + ")'>Delete</a></td>";
				items_display += "</tr>";
			});
		}
	}, 'json').fail(function(response){
		console.log('error');
		console.log(response);
	}).done(function(){
		$('.auction-items--table tbody').empty();
		$('.auction-items--table>tbody').append(items_display);
	});
}

function deleteItem(itemId){
	window.preventDefault();
}

function getSingleItem(item_id){
	var data = {
		"item_id": item_id, 
		"_token": csrf_token
	}
	
	var itemData;
		
	$.post('getSingleItem', data, function(response){
		if(response.length > 0){
			itemData = response;
		}
	}, 'json')
	.fail(function(errorMsg){
		console.log(errorMsg);
	})
	.done(function(){
		$.each(itemData, function(key, value){
			
			var localDateTime = value.date_acquired.replace(' ', 'T');
			
			$('input[name="itemId"]').val(item_id);
			$('select[name="itemCategory"]').val(value.category);
			$('input[name="itemName"]').val(value.item_name);
			$('textarea[name="itemDescription"]').val(value.item_description);
			$('input[name="itemValue"]').val(value.item_value);
			$('input[name="itemQuantity"]').val(value.quantity);
			$('input[name="dateAcquired"]').val(localDateTime);
			$('input[name="donorName"]').val(value.donated_by);
		});
	});
}

function saveItem(){	
	var data = $('form[name="single-item-form"]').serialize();
	data += "&_token=" + csrf_token;
	
	console.log("data");
	console.log(data);
	
	var itemId = null;
	
	$.post('saveSingleItem', data, function(response){
		
		if(response === 0){
			itemId = $('input[name="itemId"]').val();
		}
		if(response.length > 0){
			$.each(response, function(key, value){
				if(value.success === true){
					itemId = value.item_id;
				}
			});
		}
	}, 'json')
	.fail(function(error){
		console.log("Error!");
		console.log(error);
		return false;
	})
	.done(function(){
		if(itemId !== null){
			$('input[name="itemId"]').val(itemId);
			$('.toast-body').text("Item saved");
			$('.toast').toast('show');
		}
		return false;
	});
}

function deleteItem(item_id){
	var response = confirm("Are you sure you want to delete this item? This action cannot be undone.");
	
	var the_id = item_id === undefined ? $('input[name="itemId"]').val() : item_id;
			
	if(response === true && the_id !== ""){
		var data = {
			'item_id': the_id,
			'_token': csrf_token
		};
		$.post('deleteSingleItem', data, function(response){
			console.log(response);
		})
		.fail(function(error){
			console.log("Error!");
			console.log(error);
		})
		.done(function(){
			if(item_id === undefined){
				window.location.replace("auction-manager#!/auction-items");
			}else{
				getItems();
			}
			
		});
	}
	
	return false;
}

function uploadTemporaryImage(){
	$.post(temporaryImage, )
}

function showImagePreview(){
	var img = $('input[name="itemImage"]').prop('files')[0];
	var reader = new FileReader();
	if(img){
		reader.onload = function(event){
			$('.item-image--edit-image').attr('src', event.target.result);
		}
		reader.readAsDataURL(img);
		$('.item-image--edit').css('background-color', 'transparent');
	}
	//$('.item-image--edit-image').attr('src', img);
}
