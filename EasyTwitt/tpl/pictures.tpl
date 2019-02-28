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

            <div class="w3-container w3-margin-top">
                <h3><i class="fa fa-thumbs-o-up"></i> User's Pictures </h3>
            </div>
            [[if empty($pictures)]]
            <span><h3>No pictures</h3></span>
            [[else]]
            [[foreach $pictures as $picture]] 
            <div class="w3-row w3-quarter">

                <div class="w3-margin-bottom w3-white">

                   
                    <div class="w3-container w3-white">
                        <img src="[[$picture->path]]" alt="Pic" width=430 height=430 >
                        
                        <h4><span ><i class="fa fa-photo"> [[$picture->about]]</i></span> </h4>
                        
                        
                        <span style="color:blue"> <h5><i class="fa fa-map-marker"> [[$picture->location->town]], [[$picture->location->state]] </i></h5></span>
                       
                        </div>
                        <a href="ShowTwitt.php?id=[[$picture->id]]" class="w3-button w3-block w3-black w3-margin-bottom"><i class="fa fa-user-o"></i> Show Twitt</a>
                        <input type="hidden" name="twittID" value="[[$picture->id]]">
                    </div>

                </div>


           
            [[/foreach]]
            [[/if]]
             </div>
       




    </body>
</html>