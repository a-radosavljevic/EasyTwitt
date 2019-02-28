<?php /* Smarty version Smarty-3.1.13, created on 2019-01-16 00:04:45
         compiled from "tpl\eventProfile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:84765c3bfa4592cc46-44580818%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58899915ecd5b6f3e713339d74bbb6b0dbf56ac7' => 
    array (
      0 => 'tpl\\eventProfile.tpl',
      1 => 1547533566,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84765c3bfa4592cc46-44580818',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5c3bfa45bb96f1_09655771',
  'variables' => 
  array (
    'event' => 0,
    'host' => 0,
    'yes' => 0,
    'me' => 0,
    'friends' => 0,
    'friend' => 0,
    'isToday' => 0,
    'comment' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3bfa45bb96f1_09655771')) {function content_5c3bfa45bb96f1_09655771($_smarty_tpl) {?><!DOCTYPE html>
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


                            <p><strong><i class="fa fa-star fa-fw w3-margin-right w3-large w3-text-red"></i><?php echo $_smarty_tpl->tpl_vars['event']->value->name;?>
</strong></p>
                           
                            <p><strong><a href="actionProfile.php?user=<?php echo $_smarty_tpl->tpl_vars['host']->value->username;?>
"><i class="fa fa-landmark fa-fw w3-margin-right w3-large w3-text-red"></i> Host: <?php echo $_smarty_tpl->tpl_vars['host']->value->username;?>
</a></strong></p><p class="title"></p>

                            <form action="eventAction.php" method="POST">
                                 <input type="hidden" name="hdnEvent" value="<?php echo $_smarty_tpl->tpl_vars['event']->value->id;?>
">
                                <?php if ($_smarty_tpl->tpl_vars['yes']->value){?>
                               <button class="w3-button w3-red w3-block" type="submit" name="submit" disabled>Going</button>
                                <?php }else{ ?>
                                <button class="w3-button w3-red w3-block" type="submit" name="subGoing">Going</button>
                               
                                <?php }?>
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
                            <h3> <?php echo $_smarty_tpl->tpl_vars['event']->value->info;?>
 </h3>
                            </p>
                            <hr>
                             <h4><i class="fas fa-map fa-fw w3-margin-right"></i>
                                Number of guests: <?php echo $_smarty_tpl->tpl_vars['event']->value->location->town;?>
, <?php echo $_smarty_tpl->tpl_vars['event']->value->location->state;?>
</h4>
                            <hr>
                            <h4><i class="fa fa-calendar fa-fw w3-margin-right"></i>
                               Date: <?php echo $_smarty_tpl->tpl_vars['event']->value->day;?>
/<?php echo $_smarty_tpl->tpl_vars['event']->value->month;?>
/<?php echo $_smarty_tpl->tpl_vars['event']->value->year;?>
</h4>
                            <hr>
                            <h4><i class="fas fa-clock fa-fw w3-margin-right"></i>
                                Time: <?php echo $_smarty_tpl->tpl_vars['event']->value->hour;?>
:<?php echo $_smarty_tpl->tpl_vars['event']->value->minute;?>
</h4>
                            <hr>
                            <h4><i class="fas fa-users fa-fw w3-margin-right"></i>
                                Number of guests: <?php echo $_smarty_tpl->tpl_vars['event']->value->noGuests;?>
</h4>
                            
                        </div>
                        <div class="w3-container">
                            <?php if ($_smarty_tpl->tpl_vars['me']->value){?>
                             <a href="ChangeEvent.php?id=<?php echo $_smarty_tpl->tpl_vars['event']->value->id;?>
" class="w3-button w3-block w3-red w3-mobile" style="text-decoration: none" > Edit Event</a>
                            <a href="eventAction.php?deleteEvent" class="w3-button w3-block w3-red w3-mobile" style="text-decoration: none"> Delete Event</a>
                           
                            <?php }?>
                            <hr>
                            <div>
                                <h4 class="w3-opacity">Friends Going</h4>
                                <?php if (!empty($_smarty_tpl->tpl_vars['friends']->value)){?>
                                <?php  $_smarty_tpl->tpl_vars['friend'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['friend']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['friends']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['friend']->key => $_smarty_tpl->tpl_vars['friend']->value){
$_smarty_tpl->tpl_vars['friend']->_loop = true;
?>
                                <div class="w3-row">
                                    <img src="tpl/Media/friend" width="100px">
                                    <?php echo $_smarty_tpl->tpl_vars['friend']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['friend']->value->username;?>
 
                                    @<?php echo $_smarty_tpl->tpl_vars['friend']->value->username;?>
 <br>
                                    <a href="actionProfile.php?user=<?php echo $_smarty_tpl->tpl_vars['friend']->value->username;?>
" class="w3-button  w3-blue w3-mobile pull-right" style="text-decoration: none"> Show Profile</a>
                                   
                                </div>
                                <hr>
                                <?php } ?>
                                <?php }?>
                            </div>
                           
                        </div>
                    </div>

                    <!-- End Right Column -->
                </div>
                			<?php if ($_smarty_tpl->tpl_vars['isToday']->value){?>
				<div class="w3-quarter well" style="background-color: white">
				
				<h3><strong>Live chat</strong></h3>

				<form action="actionCommentLiveChat.php" method="post">
				<input type="hidden" name="hdnEvent" value="<?php echo $_smarty_tpl->tpl_vars['event']->value->id;?>
">
                    <?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = redisEventMessages::getAllMessagesForEvent($_smarty_tpl->tpl_vars['event']->value); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value){
$_smarty_tpl->tpl_vars['comment']->_loop = true;
?>
						
						<p><?php echo $_smarty_tpl->tpl_vars['comment']->value;?>
</p>
										
					<?php } ?>
					<input type="text" name="txtComm">
					<button type="submit" name="btnSubmit">Send</button> 
				</form>
                    <!-- End Left Column -->
                </div>
				<?php }?>
                <!-- End Grid -->
            </div>

            <!-- End Page Container -->
        </div>

    </body>
</html>
<?php }} ?>