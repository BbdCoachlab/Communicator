$(document).ready(function(){
	var ref;
	var jsonUser;
	function checkURL(event)
	{
		var url = event.url;
		var target = "http://localhost/bbdcom/index.php"
		if(url.indexOf(target+"?error") >-1){
			alert("An error occurred please try again");
			browserClose(event);			
		}
		
		if(event.url.indexOf(target+"?code") >-1){					
			var param = url.split("?code=");							
			var code = param[1];			
			getUserInfo(code, event)										
		}
	}
	
	function browserError(event)
	{
		browserClose(event);
		alert("An error occurred. Please try again.");
	}
	
	function browserClose(event)
	{
		ref.close();
		ref.removeEventListener('loadstart', checkURL);
        ref.removeEventListener('loadstop', checkURL);
        ref.removeEventListener('loaderror', browserError);
        ref.removeEventListener('exit', bowserClose);
			
	}

	$("#login").click(function(){				 
		 ref = window.open('https://www.yammer.com/dialog/oauth?client_id=nEjhbfN94g3w2nAYczxEw&redirect_uri=', '_blank', 'location=no');	
         ref.addEventListener('loadstart', checkURL);
         ref.addEventListener('loadstop', checkURL);
         ref.addEventListener('loaderror', browserError);
         ref.addEventListener('exit', browserClose);	         
	});
	
	function getUserInfo(code, event)
	{
		$.ajax({
		type: "POST",
		url: "https://www.yammer.com/oauth2/access_token.json?client_id=nEjhbfN94g3w2nAYczxEw&client_secret=lRzKMLwXRtQWvVik4wp7TxwTsqWsLvxD8dEIsT1xryU&code="+code,	
		success: function(jsonObj, status)
				{
					if($.trim(status) == "success")
					{
						//alert(JSON.stringify(jsonObj));
						window.location.replace("home.html");
						browserClose(event);
					}
					else
					{
						alert(status);
						console.log("here");
						ref.browserClose(event);
					}
				}		
});
	}
});
