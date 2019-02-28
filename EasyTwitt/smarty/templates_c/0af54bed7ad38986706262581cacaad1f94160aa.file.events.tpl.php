<?php /* Smarty version Smarty-3.1.13, created on 2019-01-15 23:57:21
         compiled from "tpl\events.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22005c3bd50c1689c8-40478454%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0af54bed7ad38986706262581cacaad1f94160aa' => 
    array (
      0 => 'tpl\\events.tpl',
      1 => 1547472224,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22005c3bd50c1689c8-40478454',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5c3bd50c3c12f5_11133685',
  'variables' => 
  array (
    'locations' => 0,
    'location' => 0,
    'user' => 0,
    'events' => 0,
    'event' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3bd50c3c12f5_11133685')) {function content_5c3bd50c3c12f5_11133685($_smarty_tpl) {?><html>
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
                        <?php  $_smarty_tpl->tpl_vars['location'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['location']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['locations']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['location']->key => $_smarty_tpl->tpl_vars['location']->value){
$_smarty_tpl->tpl_vars['location']->_loop = true;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['location']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['location']->value->town;?>
,<?php echo $_smarty_tpl->tpl_vars['location']->value->state;?>
</option>
                        <?php } ?>
                    </select>
                </div>
                <input type="hidden" name="user" value="<?php echo $_smarty_tpl->tpl_vars['user']->value;?>
">
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
                <input type="hidden" name="user" value="<?php echo $_smarty_tpl->tpl_vars['user']->value;?>
">
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
                <input type="hidden" name="user" value="<?php echo $_smarty_tpl->tpl_vars['user']->value;?>
">
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
            <?php if (empty($_smarty_tpl->tpl_vars['events']->value)){?>
            <span><h3>Event not found</h3></span>
            <?php }else{ ?>
            <?php  $_smarty_tpl->tpl_vars['event'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['event']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['events']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['event']->key => $_smarty_tpl->tpl_vars['event']->value){
$_smarty_tpl->tpl_vars['event']->_loop = true;
?> 
            
					<li>
						<time datetime="">
							<span class="day"><?php echo $_smarty_tpl->tpl_vars['event']->value->day;?>
</span>
							<span class="month"><?php echo substr(date('F',mktime(0,0,0,$_smarty_tpl->tpl_vars['event']->value->month,10)),0,3);?>
</span>
							
						</time>
						
						<div class="info">
							<h2 class="title"><?php echo $_smarty_tpl->tpl_vars['event']->value->name;?>
</h2>
							<p class="desc"><?php echo $_smarty_tpl->tpl_vars['event']->value->day;?>
/<?php echo $_smarty_tpl->tpl_vars['event']->value->month;?>
/<?php echo $_smarty_tpl->tpl_vars['event']->value->year;?>
</p>
                                                        
                                                        <br>
                                                        <?php if (EventDB::EventsHost($_smarty_tpl->tpl_vars['event']->value->id)->username==$_smarty_tpl->tpl_vars['user']->value){?>
                    
                    <i class="fas fa-landmark pull-right">Host</i>
                    <?php }?>
                       
                                                        <span><h4><?php echo $_smarty_tpl->tpl_vars['event']->value->location->town;?>
, <?php echo $_smarty_tpl->tpl_vars['event']->value->location->state;?>
</h4></span>
                                                        
                        
                        
                        </div>
                        <a href="eventAction.php?event=<?php echo $_smarty_tpl->tpl_vars['event']->value->id;?>
" class="w3-button w3-block w3-black w3-margin-bottom"><i class="fa fa-calendar"></i> Show Event</a>
                                        </li>
                                        <hr>
			        <?php } ?>
                                </ul>
                        </div>			
						
					
            <!--<div class="w3-row w3-quarter">

                <div class="w3-margin-bottom w3-white">
                    
                    
                    <img src="tpl\Media\event.gif" alt="Event" style="width:370px; height: 370px;">

                    <div class="w3-container w3-white">

                       
                        <h3><span style="color:blue"><i class="fa fa-calendar"></i></span> <?php echo $_smarty_tpl->tpl_vars['event']->value->name;?>
 </h3>
                        <br>
                        <span><small><em><?php echo $_smarty_tpl->tpl_vars['event']->value->day;?>
/<?php echo $_smarty_tpl->tpl_vars['event']->value->month;?>
/<?php echo $_smarty_tpl->tpl_vars['event']->value->year;?>
</em></small></span>
                        <br>
                        <span><small><?php echo $_smarty_tpl->tpl_vars['event']->value->location->town;?>
, <?php echo $_smarty_tpl->tpl_vars['event']->value->location->state;?>
</small></span>
                        <?php if (EventDB::EventsHost($_smarty_tpl->tpl_vars['event']->value->id)->username==$_smarty_tpl->tpl_vars['user']->value){?>
                    
                    <i class="fas fa-landmark pull-right">Host</i>
                    <?php }?>
                        
                        </div>
                        <a href="eventAction.php?event=<?php echo $_smarty_tpl->tpl_vars['event']->value->id;?>
" class="w3-button w3-block w3-black w3-margin-bottom"><i class="fa fa-calendar"></i> Show Event</a>
                        
                    </div>

                </div>-->


           
                    
    
           
           
            </div>
            <?php }?>
        </div>
        </div>




    </body>
</html><?php }} ?>