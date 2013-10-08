(function(window,$) {
	
	
	var loginModel = function LoginModel(){	
		var browser;				
	}
	
	loginModel.prototype.startLogin = function(){		
		var loginObj = this;
		browser = window.open('https://www.yammer.com/dialog/oauth?client_id=nEjhbfN94g3w2nAYczxEw&redirect_uri=', '_blank', 'location=no');		
		browser.addEventListener('loadstart', checkURL);
		browser.addEventListener('loadstop', checkURL);
		browser.addEventListener('loaderror', checkURL);
		browser.addEventListener('exit', browserClose);
		loginObj.browser = browser;
	};
	
		function checkURL(event){		
		var url = event.url;
		var target = "http://localhost/bbdcom/index.php"
		
		//check if yammer returns an error
		if(url.indexOf(target+"?error") >-1) {			
			browserClose(event);
			window.location.replace("index.html");
			alert("An error occurred please try again");			
		}
		
		//check if yammer returns an access code
		else if(event.url.indexOf(target+"?code") >-1)
		{													
			var param = url.split("?code=");							
			var code = param[1];	
			browserClose(event);				
			getUserInfo(code, event);												
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
		this.browser.close();
		this.browser.removeEventListener('loadstart', checkURL);
        this.browser.removeEventListener('loadstop', checkURL);
        this.browser.removeEventListener('loaderror', checkURL);
        this.browser.removeEventListener('exit', browserClose);	        	
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

	window.loginModel = loginModel;
	
})(window,$);
