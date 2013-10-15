$(function(){	
	
	var loginBrowser = new loginModel();
			
	$("#login").click(function(){						
		loginBrowser.startLogin();		       
	});
});