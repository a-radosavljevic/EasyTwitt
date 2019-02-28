<!DOCTYPE html>
<html>
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
       <link rel="stylesheet" href="tpl/css/events.css">
    <!--<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <style>
        html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
    </style>
    </head>
    <body class="w3-light-grey">

        <!-- Page Container -->
        <div class="w3-content w3-margin-top" style="max-width:1400px">

            <!-- The Grid -->
            <div class="w3-row-padding" style="margin-top: 60px; height: 100%">

                <!-- Left Column -->
                <div class="w3-quarter">

                    <div class="w3-white w3-text-grey w3-card-4">
                        <div class="w3-display-container">
                            <img src="tpl/Media/event.gif" style="width:100%" alt="Avatar">
                           
                        </div>


                        <div class="w3-container">
                            <br>


                            <p><strong><i class="fa fa-star fa-fw w3-margin-right w3-large w3-text-red"></i>[[$event->name]]</strong></p>
                           
                            <p><strong><a href="actionProfile.php?user=[[$host->username]]"><i class="fa fa-landmark fa-fw w3-margin-right w3-large w3-text-red"></i> Host: [[$host->username]]</a></strong></p><p class="title"></p>

                            <form action="eventAction.php" method="POST">
                                 <input type="hidden" name="hdnEvent" value="[[$event->id]]">
                                [[if $yes]]
                               <button class="w3-button w3-red w3-block" type="submit" name="submit" disabled>Going</button>
                                [[else]]
                                <button class="w3-button w3-red w3-block" type="submit" name="subGoing">Going</button>
                               
                                [[/if]]
                            </form>
                            <br>
                            <!-- <form action="actionBrisanjeOglasa.php" method="post">
                             <button class="w3-button w3-red w3-block" type="submit" name="submit">OBRIŠI OVAJ OGLAS</button> <!-- OVO JE MUSTERIJA SAMA SEBI DA BRISE OGLAS -->
                            <!-- </form>-->
                        </div>

                    </div><br>

                    <!-- End Left Column -->
                </div>

                <!-- Right Column -->
                <div class="w3-half">

                    <div class="w3-container w3-card w3-white w3-margin-bottom">
                        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-in fa-info w3-margin-right w3-xxlarge w3-text-red"></i>Info</h2>
                        <div class="w3-container">
                            
                            <p>
                            <h3> [[$event->info]] </h3>
                            </p>
                            <hr>
                             <h4><i class="fas fa-map fa-fw w3-margin-right"></i>
                                Number of guests: [[$event->location->town]], [[$event->location->state]]</h4>
                            <hr>
                            <h4><i class="fa fa-calendar fa-fw w3-margin-right"></i>
                               Date: [[$event->day]]/[[$event->month]]/[[$event->year]]</h4>
                            <hr>
                            <h4><i class="fas fa-clock fa-fw w3-margin-right"></i>
                                Time: [[$event->hour]]:[[$event->minute]]</h4>
                            <hr>
                            <h4><i class="fas fa-users fa-fw w3-margin-right"></i>
                                Number of guests: [[$event->noGuests]]</h4>
                            
                        </div>
                        <div class="w3-container">
                            [[if $me]]
                             <a href="ChangeEvent.php?id=[[$event->id]]" class="w3-button w3-block w3-red w3-mobile" style="text-decoration: none" > Edit Event</a>
                            <a href="eventAction.php?deleteEvent" class="w3-button w3-block w3-red w3-mobile" style="text-decoration: none"> Delete Event</a>
                           
                            [[/if]]
                            <hr>
                            <div>
                                <h4 class="w3-opacity">Friends Going</h4>
                                [[if !empty($friends)]]
                                [[foreach $friends as $friend]]
                                <div class="w3-row">
                                    <img src="tpl/Media/friend" width="100px">
                                    [[$friend->name]] [[$friend->username]] 
                                    @[[$friend->username]] <br>
                                    <a href="actionProfile.php?user=[[$friend->username]]" class="w3-button  w3-blue w3-mobile pull-right" style="text-decoration: none"> Show Profile</a>
                                   
                                </div>
                                <hr>
                                [[/foreach]]
                                [[/if]]
                            </div>
                           
                        </div>
                    </div>

                    <!-- End Right Column -->
                </div>
                			[[if $isToday]]
				<div class="w3-quarter well" style="background-color: white">
				
				<h3><strong>Live chat</strong></h3>

				<form action="actionCommentLiveChat.php" method="post">
				<input type="hidden" name="hdnEvent" value="[[$event->id]]">
                    [[foreach redisEventMessages::getAllMessagesForEvent($event) as $comment]]
						
						<p>[[$comment]]</p>
										
					[[/foreach]]
					<input type="text" name="txtComm">
					<button type="submit" name="btnSubmit">Send</button> 
				</form>
                    <!-- End Left Column -->
                </div>
				[[/if]]
                <!-- End Grid -->
            </div>

            <!-- End Page Container -->
        </div>

    </body>
</html>
