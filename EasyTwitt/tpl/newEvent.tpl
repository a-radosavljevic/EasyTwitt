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

                         
                        </div>

                    </div><br>

                    <!-- End Left Column -->
                </div>

                <!-- Right Column -->
                <div class="w3-half">

                    <div class="w3-container w3-card w3-white w3-margin-bottom">
                        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-in fa-info w3-margin-right w3-xxlarge w3-text-red"></i>Info</h2>
                        <div class="w3-container">
                             <form action="createEvent.php" method="post">
                            <p><strong><i class="fa fa-star fa-fw w3-margin-right w3-large w3-text-red"></i>
                                    Name of event: <input type="text" name="txtName" placeholder="Events name" required>
                                </strong></p>
                            <p>
                                <strong> Event info: <input type="text" name="txtInfo" placeholder="Give some info on event" required=""> </strong>
                            </p>
                            <hr>
                            <h4><i class="fa fa-calendar fa-fw w3-margin-right"></i>
                               Date: <input class="w3-input w3-border" type="date" name="eventDate" required> </h4>
                            <hr>
                            <h4><i class="fas fa-clock fa-fw w3-margin-right"></i>
                                
                                Time: </h4>
                            <select name="selHour">
                                [[for $i= 0 to 23]]
                                <option value=[[$i]]>[[$i]]</option>
                                [[/for]]
                            </select>
                            
                            <select name="selMinute">
                                [[for $i= 0 to 59]]
                                <option value=[[$i]]>[[$i]]</option>
                                [[/for]]
                            </select>
                            
                            <hr>
                             <p>
                            <strong> Location: </strong>
                            <label><i class="fa fa-map"></i> Town </label>
                    <select name="selLok" class="w3-select w3-border">
                        [[foreach $locations as $location]]
                        <option value="[[$location->id]]">[[$location->town]],[[$location->state]]</option>
                        [[/foreach]]
                    </select>
                            </p>
                            <hr>
                            <button class="w3-button w3-red w3-block" type="submit" name="btnCreate">CREATE</button> 
                             </form>
                        </div>
                    </div>

                    <!-- End Right Column -->
                </div>
                
                <!-- End Grid -->
            </div>
            
            <!-- End Page Container -->
        </div>

    </body>
</html>
