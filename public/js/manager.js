$(document).ready(function(){
		
	var currentUrl = window.location.href;
	//setActiveMenuItem(currentUrl);
	
	$('.nav-link').on('click', function(e){
		$('.nav-link').parent().removeClass('active');
		$(this).parent().addClass('active');		
	});
})

function toggleSideBar(){
	var status = $('.sidebar').data('collapse');
		
	if(status === 'collapsed'){
		$('.sidebar').data('collapse', 'open');
	}else{
		$('.sidebar').data('collapse', 'collapsed');
	}
	
	$('.sidebar').animate({
		width:"toggle"
	}, 500, function(){
		var icon = $('.sidebar-toggle').find('i');
		
		if(status === 'open'){
			icon.removeClass().addClass('fas fa-chevron-right');
		}
		
		if(status === 'collapsed'){
			icon.removeClass().addClass('fas fa-chevron-left');
		}	
		
	});
}

function setActiveMenuItem(currentUrl){
	
	$('.nav-link').parent().removeClass('active');
	$('.nav-link').each(function(link){
		if(currentUrl.indexOf($(this).attr('href')) > -1){
			$(this).parent().addClass('active');
		}
	});
}