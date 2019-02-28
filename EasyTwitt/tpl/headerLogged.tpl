<!DOCTYPE HTML>

<html lang="en">
    <head>
    <meta charset="UTF-8">
	<title>EasyTwitt</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- Map -->
	<script src="map.js"></script>

	<!-- Back to top -->
	<script src="top.js"></script>

	<!-- Smooth scrolling -->
	<script src="smooth.js"></script>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

	<link rel="stylesheet" href="start.css">
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle white-text" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar white-text"></span>
                        <span class="icon-bar white-text"></span>
                        <span class="icon-bar white-text"></span>                        
                    </button>
                    <a class="navbar-brand white-text" href="index.php"><strong>EasyTwitt</strong></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a class="white-text" href="actionInbox.php">Messages</a></li>
                        <li><a class="white-text" href="ShowNotifications.php">Notifications</a></li>
                        <li><a class="white-text" href="#contact">Help</a></li>
                        
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><form action="actionLog.php" method="get"> <button class="btn btn-primary navbar-btn" style="margin: 5px;" type="submit"><span class="glyphicon glyphicon-user"></span> Profile</button></form> </li>
                        <li><form action="index.php" method="post"> <button class="btn btn-danger navbar-btn" style="margin: 5px;" type="submit" name="btnLogout"><span class="glyphicon glyphicon-log-in"></span> Logout</button></form> </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
    </body>
</html>