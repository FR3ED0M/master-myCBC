<!DOCTYPE html >
<html>
<head>
<title>myCBC Login</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="body_bg">
<div> 
	<div LayoutAlign="center">

<style>
#body_bg
{ 
background-color:#2A75B3; 
}

#login-form{ 

background:#C5CFD1; 
border: 3 px solid #eeeee; 
padding:9px 9px;
 width:300px; 
 border-radius:5px; 
}
</style>

<h3>myCBC Login</h3>
    <form id="login-form" method="post" action="session.php" >
        <table border-width="0.5" >
            <tr>
                <td><label for="user_id">User Name</label></td>
                <td><input type="text" name="user_id" id="user_id"></td>
            </tr>
            <tr>
                <td><label for="user_pass">Password</label></td>
                <td><input type="password" name="user_pass" id="user_pass"></input></td>
            </tr>
			
            <tr>
				
                <td><input type="submit" value="Submit" />
                <td><input type="reset" value="Reset"/>
				
            </tr>
        </table>
    </form>
		</div>

		<?
	
	
		?>
		</div>
</body>
</html>