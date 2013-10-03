$(function()
{
	/*
	*browser is the in app web browser used for yammer oauth, it is global becuase it is
	*used in several methods in this script file
	*/
	var broswer;
		
	function checkURL(event)
	{		
		var url = event.url;
		var target = "http://localhost/bbdcom/index.php"
		
		//check if yammer returns an error
		if(url.indexOf(target+"?error") >-1)
		{			
			browserClose(event);
			window.location.replace("index.html");
			alert("An error occurred please try again");			
		}
		
		//check if yammer returns an access code
		else if(event.url.indexOf(target+"?code") >-1)
		{										
			var param = url.split("?code=");							
			var code = param[1];			
			getUserInfo(code, event);
			browserClose(event);										
		}
		
		else if($.trim(event.type) == "loaderror")
		{			
			browserClose(event);
			window.location.replace("index.html");
			alert("An error occurred. Please try again. \n"+event.message);
		}		
	}	
	
	function browserClose(event)
	{
		broswer.close();
		broswer.removeEventListener('loadstart', checkURL);
        broswer.removeEventListener('loadstop', checkURL);
        broswer.removeEventListener('loaderror', checkURL);
        broswer.removeEventListener('exit', browserClose);		
	}
	
	function getUserInfo(code, event)
	{			
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "https://www.yammer.com/oauth2/access_token.json?client_id=nEjhbfN94g3w2nAYczxEw&client_secret=lRzKMLwXRtQWvVik4wp7TxwTsqWsLvxD8dEIsT1xryU&code="+code,	
			success: function(jsonObj, status)
					{
						if($.trim(status) == "success")
						{												
							var obj = eval(jsonObj);
							var network = obj.network.name;
							if($.trim(network) == "bbd.co.za")
							{							
								window.location.replace("home.html");													
							}
							else
							{								
								window.location.replace("index.html");
								alert("You are not authorized to use this application.");
							}						
						}
						else
						{
							alert(status);														
							window.location.replace("index.html");
						}
					}		
		});
	}
	
	$("#login").click(function(){					
		broswer = window.open('https://www.yammer.com/dialog/oauth?client_id=nEjhbfN94g3w2nAYczxEw&redirect_uri=', '_blank', 'location=no');	
		broswer.addEventListener('loadstart', checkURL);
		broswer.addEventListener('loadstop', checkURL);
		broswer.addEventListener('loaderror', checkURL);
		broswer.addEventListener('exit', browserClose);	         
	});
});