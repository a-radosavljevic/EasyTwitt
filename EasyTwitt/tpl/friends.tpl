<html>
    <head>
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
        
          <link rel="stylesheet" href="tpl/css/friends.css">
       
        <!--<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
    </head>


    <body class="w3-main w3-light-grey" style="margin-top: 50px;">

        <div class="w3-container">
        <div class="w3-row w3-quarter w3-light-gray" id="mySidebar">
           <!-- <a href="javascript:void(0)" onclick="w3_close()" title="Close Sidemenu" class="w3-bar-item w3-button w3-hide-large w3-large">Zatvori <i class="fa fa-remove"></i></a>-->
             <div class="w3-bar-item w3-light-gray">
                    <h4><i class="fa fa-pencil"></i> Search people </h4>
                </div>
                <br>
                <!--<script>
                    function w3_open() {
                        document.getElementById("mySidebar").style.display = "block";
                    }
                    function w3_close() {
                        document.getElementById("mySidebar").style.display = "none";
                    }
                </script>-->
               

             <form action="Friends.php" method="GET">
                
                <button class="w3-button w3-block w3-blue" type="submit" name="sbmFindPeople" value="Show"><i class="fa fa-search w3-margin-left"></i> Find People</button>
                <input type="hidden" name="user" value="[[$user]]">
            </form>
<br>
<form action="Friends.php" method="GET">
     <button class="w3-button w3-block w3-blue" type="submit" name="sbmMyFriends" value="Show"><i class="fa fa-search w3-margin-left"></i> Show My Friends </button>
                <input type="hidden" name="user" value="[[$user]]">
</form>
 <div class="w3-bar-item w3-light-gray">
                    <h4><i class="fa fa-pencil"></i> Change criteria</h4>
                </div>
                <br>
                <form action="Friends.php" method="GET">
                <div class="w3-bar-item">
                    <label><i class="fa fa-map"></i> Town </label>
                    <select name="selLok" class="w3-select w3-border">
                        [[foreach $locations as $location]]
                        <option value="[[$location->id]]">[[$location->town]],[[$location->state]]</option>
                        [[/foreach]]
                    </select>
                </div>
<input type="hidden" name="user" value="[[$user]]">
<br>
               
<br>
                <button class="w3-button w3-block w3-blue" type="submit" name="sbmTown" value="Show"><i class="fa fa-search w3-margin-left"></i> Find</button>
            </form>
            <br>
            <div class="w3-bar-item w3-light-gray w3-center">
                    <h4></h4>
                </div>
            <br>
            <form action="Friends.php" method="GET">
                <div class="w3-bar-item w3-light-gray">
                    <h4><i class="fa fa-search"></i> Search by name </h4>
                </div>
                <br>
                <div class="w3-bar-item">
                    <label><i class="fa fa-clock-o"></i> Name and Surname</label>
                    <input class="w3-input w3-border" type="text" name="userNameSurname" required>
                </div>
                <br>
                <button class="w3-button w3-block w3-blue" type="submit" name="sbmNameSurname" value="Show"><i class="fa fa-search w3-margin-left"></i> Find</button>
                <input type="hidden" name="user" value="[[$user]]">
            </form>
            <br>
            <br>
            <form action="Friends.php" method="GET">
                <div class="w3-bar-item w3-light-gray">
                    <h4><i class="fa fa-search"></i> Search by username </h4>
                </div>
                <br>
                <div class="w3-bar-item">
                    <label><i class="fa fa-clock-o"></i> Username </label>
                    <input class="w3-input w3-border" type="text" name="userUsername" required>
                </div>
                <br>
                <button class="w3-button w3-block w3-blue" type="submit" name="sbmUsername" value="Show"><i class="fa fa-search w3-margin-left"></i> Find</button>
                <input type="hidden" name="user" value="[[$user]]">
            </form>

        </div>



        <div class="w3-row w3-threequarter">

            <div class="w3-container w3-margin-top">
                <h3><i class="fa fa-thumbs-o-up"></i> Users </h3>
            </div>
            [[if empty($friends)]]
            <span><h3>User not found</h3></span>
            [[else]]
            
            [[foreach $friends as $friend]] 
            
<div class="w3-row w3-quarter">
                <div class="w3-margin-bottom w3-white">

                    <!--[[if $majstor->slika!=null]]
                    <img src="[[$majstor->slika]]" alt="Majstor" style="width:300px; height: 300px;">
                    [[else]]
                    <img src="slike/luka.jpg" alt="Majstor" style="width:300px; height: 300px;">
                    [[/if]]-->
                    <div class="w3-container w3-white">

                        <!--[[if $majstor->online]]
                        <h3><span style="color:green"><i class="fa fa-circle"></i></span>  [[$majstor->ime]] [[$majstor->prezime]]</h3>
                        [[else]]-->
                        <h3><span style="color:blue"><i class="fa fa-user-o"></i></span> [[$friend->name]] [[$friend->surname]]</h3>
                        <br>
                        <span><small><em>@[[$friend->username]]</em></small></span>
                        <br>
                        <span><small>[[$friend->location->town]], [[$friend->location->state]]</small></span>
                        <!--[[/if]]-->
                        <!--<h6 class="w3-opacity">[[foreach from=$majstor->lokacije item=lok]] [[$lok->mesto]] [[/foreach]]</h6>
                        <!--<p>[[foreach from=$majstor->zanati item=zan]] [[$zan->tip]] [[/foreach]]</p>

                        <div class="w3-container w3-red">
                            <!--<h2><i class="fa fa-star"></i> Ocena<label style="float:right"> [[$majstor->ocena]]</label></h2>
                             [[if $majstor->ocena==null]]
                            <h2><i class="fa fa-star"></i> Ocena<label style="float:right"> X</label></h2>
                            [[else]]
                            <h2><i class="fa fa-star"></i> Ocena<label style="float:right"> [[$majstor->ocena]]</label></h2>
                            [[/if]]-->
                        </div>
                        <a href="actionProfile.php?user=[[$friend->username]]" class="w3-button w3-block w3-black w3-margin-bottom"><i class="fa fa-user-o"></i> Show Profile</a>
                        
                    </div>

               


          </div>
            [[/foreach]]
              
            [[/if]]
             </div>
        </div>
        </div>




    </body>
</html>