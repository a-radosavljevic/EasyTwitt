<!DOCTYPE html>
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
        <script src="tpl/js/map.js"></script>

        <!-- Back to top -->
        <script src="tpl/js/top.js"></script>

        <!-- Smooth scrolling -->
        <script src="tpl/js/smooth.js"></script>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

        <link rel="stylesheet" href="tpl/css/start.css">
    <link rel="stylesheet" href="tpl/index.css">
    <link rel="stylesheet" href="tpl/style.css">
    <link rel="stylesheet" href="tpl/index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body style="margin-top: 50px">
    
    <div>
        <form action="ChangeProfile.php" style="border:1px solid #ccc" method="POST" enctype="multipart/form-data">
            <div class="container">
                <h1>Change profile</h1>
				<p>Change desired information.</p>
				<hr>

				<a href="btnDelete" class="w3-button w3-red w3-block" name="btnDeleteUser">
					Delete your profile
				</a>
				<hr>

                <label for="txtName"><b>Enter your name</b></label>
                <input type="text" placeholder="Name" name="txtName" value="[[$user->name]]" required>

                <label for="txtSurname"><b>Enter your surname</b></label>
                <input type="text" placeholder="Surname" name="txtSurname" required value="[[$user->surname]]">

                <hr>

                <label for="txtUsername"><b>Enter your username</b></label>
                <input type="text" placeholder="Username" name="txtUsername" value="[[$user->username]]" required>

               
                <label for="txtPassword"><b>Enter your password</b></label>
                <input type="password" placeholder="password" name="txtPassword" required value="[[$user->password]]">

                <label for="txtPassword2"><b>Enter your password again</b></label>
                <input type="password" placeholder="Enter your password again" name="txtPassword2" value="[[$user->password]]" required>

                <hr>

               
            
                    <div class="clearfix">
						<button type="submit" class="w3-button w3-block w3-blue" name="btnCancel">Cancel</button>
						<button type="submit" class="w3-button w3-block w3-blue" name="btnSaveChangedProfile">Change</button>
					</div>
            </div>
        </form>
    </div>
</body>
</html>