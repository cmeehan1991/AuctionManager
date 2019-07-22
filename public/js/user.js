function userSignIn(){
	var data = $('form[name="user-signin"]').serialize();

	$.post("login", data, function(response){
		console.log(response);
		if(response.success === true){
			window.location.replace("auction-manager");
		}
	}, 'json')
	.fail(function(xhr, status, error){
		console.log("fail");
		console.log(xhr);
		console.log(status);
		console.log(error);
	})
	.done(function(){
		console.log("finished")
	});
	
	return false;
}