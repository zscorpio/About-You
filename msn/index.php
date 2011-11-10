<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Displaying User Media Test Page</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script src="https://js.live.net/v5.0/wl.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        var APPLICATION_CLIENT_ID = "000000004407080B",
        REDIRECT_URL = "http://card.zscorpio.com/msn/index.php";
        WL.init({
            client_id: APPLICATION_CLIENT_ID,
            redirect_uri: REDIRECT_URL,
            response_type: "token"
        });
		WL.login(
			{ "scope": "wl.basic" },
			function (response) {
				if (response.status == "connected") {
					showUserData();
				}
				else {
					log("Could not connect, status = " + response.status);
				}
			});

			function showUserData() {
				WL.api(
					"/me", "GET",
					function (response) {
						if (!response.error) {
							var id = response.id;
							var name = response.name;
							var link = response.link;
							$.ajax({   
								type: 'GET',   
								url:'http://card.zscorpio.com/index.php/msn/index',   
								data: 'id='+id+'&name='+name+'&link='+link, 
								success: function(response){   
									if (response) {   
										window.location = 'http://card.zscorpio.com/index.php/admin/info'
									} else {    
										window.location = 'http://card.zscorpio.com/index.php/admin/info'										
									}   
								}   
							})
						}
						else{
							log("API call failed: " + JSON.stringify(response.error).replace(/,/g, "\n"));
						}
					}
				);
			}
			function log(message) {
				var child = document.createTextNode(message);
				var parent = document.body;
				parent.appendChild(child);
				parent.appendChild(document.createElement("br"));
			}
			
    </script>
</head>
<body>
    <div id="signInButton"></div>
    <div id="albums"></div>
</body>
</html>