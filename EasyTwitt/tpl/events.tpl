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
        <!--<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
    </head>


    <body class="w3-main w3-light-grey" style="margin-top: 50px;">

        <div class="w3-container">
        <div class="w3-row w3-quarter w3-light-gray" id="mySidebar">
           <!-- <a href="javascript:void(0)" onclick="w3_close()" title="Close Sidemenu" class="w3-bar-item w3-button w3-hide-large w3-large">Zatvori <i class="fa fa-remove"></i></a>-->
            
           <div class="w3-bar-item w3-light-gray">
                    <h4><i class="fa fa-pencil"></i> Change criteria to explore events</h4>
                </div>
           <form action="EventsAction.php" method="GET">
                 <button class="w3-button w3-block w3-blue" type="submit" name="btnAllEvents"  value="Show"><i class="fa fa-search w3-margin-left"></i> Show all events</button>
          
                <!--<script>
                    function w3_open() {
                        document.getElementById("mySidebar").style.display = "block";
                    }
                    function w3_close() {
                        document.getElementById("mySidebar").style.display = "none";
                    }
                </script>-->
                
                <br>
                <br>
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
            <form action="EventsAction.php" method="GET">
                <div class="w3-bar-item w3-light-gray">
                    <h4><i class="fa fa-search"></i> Search by name </h4>
                </div>
                <br>
                <div class="w3-bar-item">
                    <label><i class="fa fa-clock-o"></i> Event's name </label>
                    <input class="w3-input w3-border" type="text" name="eventName" required>
                </div>
                <br>
                <button class="w3-button w3-block w3-blue" type="submit" name="sbmEventName" value="Show"><i class="fa fa-search w3-margin-left"></i> Find</button>
                <input type="hidden" name="user" value="[[$user]]">
            </form>
            <br>
            <br>
            <form action="EventsAction.php" method="GET">
                <div class="w3-bar-item w3-light-gray">
                    <h4><i class="fa fa-search"></i> Search by date </h4>
                </div>
                <br>
                <div class="w3-bar-item">
                    <label><i class="fa fa-clock-o"></i> Date </label>
                    <input class="w3-input w3-border" type="date" name="eventDate" required>
                </div>
                <br>
                <button class="w3-button w3-block w3-blue" type="submit" name="sbmDate" value="Show"><i class="fa fa-search w3-margin-left"></i> Find</button>
                <input type="hidden" name="user" value="[[$user]]">
                <hr>
                <hr>
                <a href="createEvent.php" class="w3-button w3-block w3-blue" type="submit" name="sbmDate" value="Show"><i class="fa fa-search w3-margin-left"></i> Create Event</a>
              
            </form>

        </div>



        <div class="w3-row w3-threequarter">

            <div class="w3-container w3-margin-top">
                <h3><i class="fa fa-thumbs-o-up"></i> Events </h3>
            
          
		
			<div class="[ col-xs-12 col-sm-8 ]">
				<ul class="event-list">
            [[if empty($events)]]
            <span><h3>Event not found</h3></span>
            [[else]]
            [[foreach $events as $event]] 
            
					<li>
						<time datetime="">
							<span class="day">[[$event->day]]</span>
							<span class="month">[[substr(date('F', mktime(0, 0, 0, $event->month, 10)), 0,3)]]</span>
							
						</time>
						
						<div class="info">
							<h2 class="title">[[$event->name]]</h2>
							<p class="desc">[[$event->day]]/[[$event->month]]/[[$event->year]]</p>
                                                        
                                                        <br>
                                                        [[if EventDB::EventsHost($event->id)->username==$user]]
                    
                    <i class="fas fa-landmark pull-right">Host</i>
                    [[/if]]
                       
                                                        <span><h4>[[$event->location->town]], [[$event->location->state]]</h4></span>
                                                        
                        
                        
                        </div>
                        <a href="eventAction.php?event=[[$event->id]]" class="w3-button w3-block w3-black w3-margin-bottom"><i class="fa fa-calendar"></i> Show Event</a>
                                        </li>
                                        <hr>
			        [[/foreach]]
                                </ul>
                        </div>			
						
					
            <!--<div class="w3-row w3-quarter">

                <div class="w3-margin-bottom w3-white">
                    
                    
                    <img src="tpl\Media\event.gif" alt="Event" style="width:370px; height: 370px;">

                    <div class="w3-container w3-white">

                       
                        <h3><span style="color:blue"><i class="fa fa-calendar"></i></span> [[$event->name]] </h3>
                        <br>
                        <span><small><em>[[$event->day]]/[[$event->month]]/[[$event->year]]</em></small></span>
                        <br>
                        <span><small>[[$event->location->town]], [[$event->location->state]]</small></span>
                        [[if EventDB::EventsHost($event->id)->username==$user]]
                    
                    <i class="fas fa-landmark pull-right">Host</i>
                    [[/if]]
                        
                        </div>
                        <a href="eventAction.php?event=[[$event->id]]" class="w3-button w3-block w3-black w3-margin-bottom"><i class="fa fa-calendar"></i> Show Event</a>
                        
                    </div>

                </div>-->


           
                    
    
           
           
            </div>
            [[/if]]
        </div>
        </div>




    </body>
</html>