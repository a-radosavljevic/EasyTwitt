<?php /* Smarty version Smarty-3.1.13, created on 2019-01-15 23:25:47
         compiled from "tpl\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:262455b0d98e0f09c68-48483425%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db97a3f8af80d260372ece8474eb31d980e7a586' => 
    array (
      0 => 'tpl\\index.tpl',
      1 => 1547594710,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '262455b0d98e0f09c68-48483425',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5b0d98e10e16c5_12015924',
  'variables' => 
  array (
    'name' => 0,
    'surname' => 0,
    'username' => 0,
    'city' => 0,
    'state' => 0,
    'me' => 0,
    'fof' => 0,
    'user' => 0,
    'locations' => 0,
    'location' => 0,
    'twitts' => 0,
    'num' => 0,
    'i' => 0,
    'userr' => 0,
    'commercials' => 0,
    'comment' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b0d98e10e16c5_12015924')) {function content_5b0d98e10e16c5_12015924($_smarty_tpl) {?><!DOCTYPE HTML>

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
    </head>
    
    <body>
        
       <div class="container-fluid full-page">
            <div class="row spacing">
                <div class="col-sm-3 text-center">
                    <div class="well">
                        <img src="tpl/Media/avatar.png" alt="Boss" style="height:300px; width:80%;" class="img-rounded">
                        <h3><strong><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['surname']->value;?>
</strong></h3>
                        <h4>@<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</h4>
                        <h3><strong><?php echo $_smarty_tpl->tpl_vars['city']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['state']->value;?>
</strong></h3>
                        <form action="ChangeProfile.php" method="GET">
                        <button class="btn btn-block btn-primary" name="btnChangeProfile"><h3>Edit profile</h3></button>
                        </form>
                    </div>
                    
                    <div class="well">
                        <?php if ($_smarty_tpl->tpl_vars['me']->value){?>
                         <div style="width: 100%; border-bottom: 1px solid #006dcc;"><a href="MyTwitts.php" class="btn btn" style="width: 100%; color: black;"><h3>My Twitts</h3></a></div>
                        <div style="width: 100%; border-bottom: 1px solid #006dcc;"><a href="ShowPictures.php" class="btn" style="width: 100%; color: black;"><h3>My Photos</h3></a></div>
                        <div style="width: 100%; border-bottom: 1px solid #006dcc;"><a href="EventsAction.php" class="btn" style="width: 100%; color: black;"><h3>My Events</h3></a></div>
                         <div style="width: 100%; border-bottom: 1px solid #006dcc;"><a href="CommercialsAction.php" class="btn" style="width: 100%; color: black;"><h3>My Commercials</h3></a></div>
                        <!--<div style="width: 100%;"><a href="#" class="btn" style="width: 100%; color: black;"><h3>Friends</h3></a></div>-->
                         <?php }?>
                         <div style="width: 100%; border-bottom: 1px solid #006dcc;"><a href="Friends.php" class="btn btn" style="width: 100%; color: black;"><h3>Friends</h3></a></div>
                         
                    
                    </div>
                    <!--
                    <div class="well">
                        <h3><strong>My interests</strong></h3>
                        <hr>
                            <button class="btn btn-primary">Football</button>
                            <button class="btn btn-primary">Food</button>
                            <button class="btn btn-primary">News</button>
                            <button class="btn btn-primary">Art</button>
                            <button class="btn btn-primary">Movies</button>
                            <button class="btn btn-primary">Music</button>
                        
                    </div>-->
                    
                    <div class="well">
                        <h3><strong>People you may know</strong></h3>
                        <hr>
                        <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fof']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
                        <div class="media">
                            <div class="media-left">
                              <img src="tpl/Media/avatar.png" class="media-object" style="width:60px">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $_smarty_tpl->tpl_vars['user']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->surname;?>
 <span><small><em>@<?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
</em></small></span>
                                    <br> <span><small><?php echo $_smarty_tpl->tpl_vars['user']->value->location->town;?>
, <?php echo $_smarty_tpl->tpl_vars['user']->value->location->state;?>
</small></span></h4>
                               
                             <button class="btn btn-primary" onclick="location.href='actionProfile.php?user=<?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
'">Show profile</button>
                            </div>
                            <hr>
                            
                            <hr>
                          </div>
                        <?php } ?>
                        <!--
                        <div class="media">
                            <div class="media-left">
                              <img src="tpl/Media/aleksandar1.jpg" class="media-object" style="width:60px">
                            </div>
                            <div class="media-body">
                              <h4 class="media-heading">Mika Mikic <span><small>Belgrade, Serbia</small></span></h4>
                              <button class="btn btn-primary">Show profile</button>
                              <button class="btn btn-primary">Add as a friend</button>
                            </div>
                            <hr>
                            
                            <hr>
                          </div>
                        
                        <div class="media">
                            <div class="media-left">
                              <img src="tpl/Media/aleksandar1.jpg" class="media-object" style="width:60px">
                            </div>
                            <div class="media-body">
                              <h4 class="media-heading">Marko Markovic <span><small>Kragujevac, Serbia</small></span></h4>
                              <button class="btn btn-primary">Show profile</button>
                              <button class="btn btn-primary">Add as a friend</button>
                            </div>
                            <hr>
                            
                            <hr>
                          </div>-->
                        
                    </div>

                </div>


                <div class="col-sm-9">
                    <div class="well">
                        <div class="form-group">
                            <form action="newTwitt.php" method="POST" enctype="multipart/form-data">
                            <label for="usr"><h3><strong>Write a twitt</strong></h3></label>
                            <input type="text" name="twittText" class="form-control" id="usr" placeholder="What's up?">
                            <input type="checkbox" name="chkCommercial"> Check if you are posting a Commercial
                            <div>
                      <input type="hidden" name="MAX_FILE_SIZE" value="20000000">
                <input name="fajl_input" type="file" id="fajl_input" accept="image/*" onchange="loadFile(event)">
            
                <img id="output"/> <input type="text" name="picCaption" placeholder="Caption this photo">
            </div > 
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
                            <button class="btn btn-primary btn-block" name="btnPost" style="margin-top: 20px">Post</button>
                             <hr>
                            </form>
                        </div>
                    </div>

                    <div class="well">
                        <?php if (!(empty($_smarty_tpl->tpl_vars['twitts']->value))){?>
                        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['num']->value+1 - (0) : 0-($_smarty_tpl->tpl_vars['num']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
                         
                        <div class="media table table-hover" >
                            <div class="media-left">
                              <img src="tpl/Media/avatar.png" class="media-object" style="width:60px" onclick="location.href='actionProfile.php?user=<?php echo $_smarty_tpl->tpl_vars['twitts']->value[$_smarty_tpl->tpl_vars['i']->value]->user->username;?>
'">
                            </div>
                            <div class="media-body"  onclick="location.href='ShowTwitt.php?id=<?php echo $_smarty_tpl->tpl_vars['twitts']->value[$_smarty_tpl->tpl_vars['i']->value]->id;?>
'">
                                <h4 class="media-heading"><?php echo $_smarty_tpl->tpl_vars['twitts']->value[$_smarty_tpl->tpl_vars['i']->value]->user->name;?>
 <?php echo $_smarty_tpl->tpl_vars['twitts']->value[$_smarty_tpl->tpl_vars['i']->value]->user->surname;?>
 <span><small><em>@<?php echo $_smarty_tpl->tpl_vars['twitts']->value[$_smarty_tpl->tpl_vars['i']->value]->user->username;?>
</em></small></span> <span><small><?php echo $_smarty_tpl->tpl_vars['twitts']->value[$_smarty_tpl->tpl_vars['i']->value]->day;?>
/<?php echo $_smarty_tpl->tpl_vars['twitts']->value[$_smarty_tpl->tpl_vars['i']->value]->month;?>
/<?php echo $_smarty_tpl->tpl_vars['twitts']->value[$_smarty_tpl->tpl_vars['i']->value]->year;?>
</small></span></h4>
                             <!--<button class="btn btn-primary" onclick="location.href='actionProfile.php?user=<?php echo $_smarty_tpl->tpl_vars['twitts']->value[$_smarty_tpl->tpl_vars['i']->value]->user->username;?>
'">Show profile</button>-->
                                <p>
                                  <?php echo $_smarty_tpl->tpl_vars['twitts']->value[$_smarty_tpl->tpl_vars['i']->value]->text;?>

                              </p>
                               <?php if (!(empty($_smarty_tpl->tpl_vars['twitts']->value[$_smarty_tpl->tpl_vars['i']->value]->photos))){?>
                                <img src="<?php echo $_smarty_tpl->tpl_vars['twitts']->value[$_smarty_tpl->tpl_vars['i']->value]->photos[0]->path;?>
" class="media-object" style="width:100px">
                                <?php }?>
                            </div>
                            <table>
                                <tr>
                                    <td>
                             <form action="actionLog" method="post">
                            <?php if (TwittDB::DidUserLikedTwitt($_smarty_tpl->tpl_vars['userr']->value,$_smarty_tpl->tpl_vars['twitts']->value[$_smarty_tpl->tpl_vars['i']->value])){?>
                             <button name="btnLike" class="btn" disabled ><i class="fa fa-heart"></i></button>
                            <?php }else{ ?>
                            <button name="btnLike" class="btn"><i class="fa fa-heart"></i></button>
                           
                            <?php }?>
                            <?php echo $_smarty_tpl->tpl_vars['twitts']->value[$_smarty_tpl->tpl_vars['i']->value]->likesNO;?>

                             <input type="hidden" name="hdnTwittId" value=<?php echo $_smarty_tpl->tpl_vars['twitts']->value[$_smarty_tpl->tpl_vars['i']->value]->id;?>
>
                             </form>
                                    </td>
                                    <td>
                            <button class="btn"  onclick="location.href='ShowTwitt.php?id=<?php echo $_smarty_tpl->tpl_vars['twitts']->value[$_smarty_tpl->tpl_vars['i']->value]->id;?>
'"> <i class="fa fa-reply" ></i></button>
                                    </td>
                            </tr>
                            </table>
                           <!-- <button class="btn btn-primary">Retwitt</button> -->
                           <!-- <button class="btn btn-primary">Show comments</button>-->
                           
                          </div>
                         
                         <hr>
                           <?php if ($_smarty_tpl->tpl_vars['i']->value<count($_smarty_tpl->tpl_vars['commercials']->value)){?>
                               <?php if (Commercial::checkCommercialDate($_smarty_tpl->tpl_vars['commercials']->value[$_smarty_tpl->tpl_vars['i']->value])==1){?>
                        
                           
                            <div class="media-left">
                              <img src="tpl/Media/avatar.png" class="media-object" style="width:60px" >
                            </div>
                            <div class="media-body">
                                
                                <h4 class="media-heading"><?php echo CommercialDB::CommercialsUser($_smarty_tpl->tpl_vars['commercials']->value[$_smarty_tpl->tpl_vars['i']->value]->id)->name;?>
 <?php echo CommercialDB::CommercialsUser($_smarty_tpl->tpl_vars['commercials']->value[$_smarty_tpl->tpl_vars['i']->value]->id)->surname;?>
 <span><small><em>@<?php echo CommercialDB::CommercialsUser($_smarty_tpl->tpl_vars['commercials']->value[$_smarty_tpl->tpl_vars['i']->value]->id)->username;?>
</em></small></span> 
                                    <span>Expiration Date</span>
                                    <span><?php echo $_smarty_tpl->tpl_vars['commercials']->value[$_smarty_tpl->tpl_vars['i']->value]->day;?>
/<?php echo $_smarty_tpl->tpl_vars['commercials']->value[$_smarty_tpl->tpl_vars['i']->value]->month;?>
/<?php echo $_smarty_tpl->tpl_vars['commercials']->value[$_smarty_tpl->tpl_vars['i']->value]->year;?>
</span></h4>
                             <!--<button class="btn btn-primary" onclick="location.href='actionProfile.php?user=<?php echo $_smarty_tpl->tpl_vars['twitts']->value[$_smarty_tpl->tpl_vars['i']->value]->user->username;?>
'">Show profile</button>-->
                                <p>
                                  <?php echo $_smarty_tpl->tpl_vars['commercials']->value[$_smarty_tpl->tpl_vars['i']->value]->text;?>

                              </p>
                              
                                <img src="<?php echo $_smarty_tpl->tpl_vars['commercials']->value[$_smarty_tpl->tpl_vars['i']->value]->filePath;?>
" class="media-object" style="width:100px">
                               
                            </div>
                               <form action="actionCommentCommertial.php" method="post">
                            <table>
                                <tr>
                                    
                                    <td>
                                        <input type="text" name="txtComm">
                                        <input type="hidden" name="commUser" value="<?php echo CommercialDB::CommercialsUser($_smarty_tpl->tpl_vars['commercials']->value[$_smarty_tpl->tpl_vars['i']->value]->id)->username;?>
">
                             <input type="hidden" name="hdnCommercialId" value=<?php echo $_smarty_tpl->tpl_vars['commercials']->value[$_smarty_tpl->tpl_vars['i']->value]->id;?>
>
                            
                                    </td>
                                    <td>
                           <button class="btn"  type="submit" name="btnSubmit"> <i class="fa fa-reply" ></i></button>
                                    </td>
                                     <td>
                            <button class="btn"  onclick="document.getElementById('<?php echo $_smarty_tpl->tpl_vars['commercials']->value[$_smarty_tpl->tpl_vars['i']->value]->id;?>
').style.display = 'block'"> <i class="fa fa-reply" >Show Comments</i></button>
                                    </td>
                            </tr>
                            </table>
                              </form>
                             
							  <!--	MODAL ZA KOMENTARE REKLAMA -->
								<div id="<?php echo $_smarty_tpl->tpl_vars['commercials']->value[$_smarty_tpl->tpl_vars['i']->value]->id;?>
" class="w3-modal">
								<div class="w3-modal-content">

								<header class="w3-container w3-red"> 
								<span onclick="document.getElementById('<?php echo $_smarty_tpl->tpl_vars['commercials']->value[$_smarty_tpl->tpl_vars['i']->value]->id;?>
').style.display = 'none'" 
										class="w3-button w3-display-topright">&times;</span>
                    
								<p>Commercial</p>
								</header>

								<div class="w3-container">
								<hr>
										<?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = redisCommercialComments::getComments($_smarty_tpl->tpl_vars['commercials']->value[$_smarty_tpl->tpl_vars['i']->value]->id,$_smarty_tpl->tpl_vars['commercials']->value[$_smarty_tpl->tpl_vars['i']->value]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value){
$_smarty_tpl->tpl_vars['comment']->_loop = true;
?>
										
											<p><?php echo $_smarty_tpl->tpl_vars['comment']->value;?>
</p>
										
										<?php } ?>
										
								<br>
								<hr>
								</div>
								<footer class="w3-container w3-black">
								<span name="btnOdustani" onclick="document.getElementById('<?php echo $_smarty_tpl->tpl_vars['commercials']->value[$_smarty_tpl->tpl_vars['i']->value]->id;?>
').style.display = 'none'" 
									class="w3-button w3-red "><i class="fa fa-remove"></i> Hide </span>
								</footer>

            </div>
        </div>
                               
                           <!-- <button class="btn btn-primary">Retwitt</button> -->
                           <!-- <button class="btn btn-primary">Show comments</button>-->
                            <?php }?>
                         <?php }?>
                        <?php }} ?>
                        <?php }?>
                           
                           </div>
                           
                         
                         <hr>
                        
                        <!--  <div class="media">
                            <div class="media-left">
                              <img src="tpl/Media/aleksandar1.jpg" class="media-object" style="width:60px">
                            </div>
                            <div class="media-body">
                              <h4 class="media-heading">Mika Mikic <span><small>10 minutes ago</small></span></h4>
                              <p>Use a element with the .media class to create a container for media objects.

                                Use the .media-left class to align the media object (image) to the left, or the .media-right class to align it to the right.
                                
                                Text that should appear next to the image, is placed inside a container with class="media-body".
                                
                                Additionally, you can use .media-heading for headings.</p>
                                <img src="tpl/Media/social1.jpg" class="img-rounded" style="height: 100px; width: 100px;">
                                <img src="tpl/Media/social2.jpg" class="img-rounded" style="height: 100px; width: 100px;">
                            </div>
                            <hr>
                            <button class="btn btn-primary">Like</button>
                            <button class="btn btn-primary">Comment</button>
                            <button class="btn btn-primary">Retwitt</button>
                            <button class="btn btn-primary">Show comments</button>
                            <hr>
                          </div>

                          <div class="media">
                            <div class="media-left">
                              <img src="tpl/Media/aleksandar1.jpg" class="media-object" style="width:60px">
                            </div>
                            <div class="media-body">
                              <h4 class="media-heading">Marko Markovic <span><small>10 minutes ago</small></span></h4>
                              <p>Use a element with the .media class to create a container for media objects.

                                Use the .media-left class to align the media object (image) to the left, or the .media-right class to align it to the right.
                                
                                Text that should appear next to the image, is placed inside a container with class="media-body".
                                
                                Additionally, you can use .media-heading for headings.</p>
                            </div>
                            <hr>
                            <button class="btn btn-primary">Like</button>
                            <button class="btn btn-primary">Comment</button>
                            <button class="btn btn-primary">Retwitt</button>
                            <hr>
                          </div>

                          <div class="media">
                            <div class="media-left">
                              <img src="tpl/Media/aleksandar1.jpg" class="media-object" style="width:60px">
                            </div>
                            <div class="media-body">
                              <h4 class="media-heading">Jovan Jovanovic <span><small>10 minutes ago</small></span></h4>
                              <p>Use a element with the .media class to create a container for media objects.

                                Use the .media-left class to align the media object (image) to the left, or the .media-right class to align it to the right.
                                
                                Text that should appear next to the image, is placed inside a container with class="media-body".
                                
                                Additionally, you can use .media-heading for headings.</p>
                            </div>
                            <hr>
                            <button class="btn btn-primary">Like</button>
                            <button class="btn btn-primary">Comment</button>
                            <button class="btn btn-primary">Retwitt</button>
                            <hr>
                          </div>

                          <div class="media">
                            <div class="media-left">
                              <img src="tpl/Media/aleksandar1.jpg" class="media-object" style="width:60px">
                            </div>
                            <div class="media-body">
                              <h4 class="media-heading">Nikola Nikolic <span><small>10 minutes ago</small></span></h4>
                              <p>Use a element with the .media class to create a container for media objects.

                                Use the .media-left class to align the media object (image) to the left, or the .media-right class to align it to the right.
                                
                                Text that should appear next to the image, is placed inside a container with class="media-body".
                                
                                Additionally, you can use .media-heading for headings.</p>
                            </div>
                            <hr>
                            <button class="btn btn-primary">Like</button>
                            <button class="btn btn-primary">Comment</button>
                            <button class="btn btn-primary">Retwitt</button>
                            <hr>
                          </div>

                          <div class="media">
                            <div class="media-left">
                              <img src="tpl/Media/aleksandar1.jpg" class="media-object" style="width:60px">
                            </div>
                            <div class="media-body">
                              <h4 class="media-heading">John Doe <span><small>10 minutes ago</small></span></h4>
                              <p>Use a element with the .media class to create a container for media objects.

                                Use the .media-left class to align the media object (image) to the left, or the .media-right class to align it to the right.
                                
                                Text that should appear next to the image, is placed inside a container with class="media-body".
                                
                                Additionally, you can use .media-heading for headings.</p>
                            </div>
                            <hr>
                            <button class="btn btn-primary">Like</button>
                            <button class="btn btn-primary">Comment</button>
                            <button class="btn btn-primary">Retwitt</button>
                            <hr>
                          </div>-->
                    </div>

                </div>
            </div>
        
        
    </body>
</html><?php }} ?>