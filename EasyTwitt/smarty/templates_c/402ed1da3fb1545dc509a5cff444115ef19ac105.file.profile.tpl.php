<?php /* Smarty version Smarty-3.1.13, created on 2019-01-15 23:50:01
         compiled from "tpl\profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:326475c3c99e66c69c4-02078121%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '402ed1da3fb1545dc509a5cff444115ef19ac105' => 
    array (
      0 => 'tpl\\profile.tpl',
      1 => 1547585910,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '326475c3c99e66c69c4-02078121',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5c3c99e6ce6010_66261210',
  'variables' => 
  array (
    'name' => 0,
    'surname' => 0,
    'username' => 0,
    'city' => 0,
    'state' => 0,
    'areFriends' => 0,
    'isRequestSent' => 0,
    'accept' => 0,
    'friendsCount' => 0,
    'mf' => 0,
    'user' => 0,
    'num' => 0,
    'i' => 0,
    'twitts' => 0,
    'userr' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3c99e6ce6010_66261210')) {function content_5c3c99e6ce6010_66261210($_smarty_tpl) {?><!DOCTYPE HTML>

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
                        <?php if ($_smarty_tpl->tpl_vars['areFriends']->value){?>
                            <button class="btn btn-block btn-primary"><h3>You are friends</h3></button>
                        <?php }elseif($_smarty_tpl->tpl_vars['isRequestSent']->value){?>
                            <button class="btn btn-block btn-primary"><h3>Friend request sent</h3></button>
                        <?php }elseif($_smarty_tpl->tpl_vars['accept']->value){?>
                         <form action="actionProfile.php?user=<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" method="post"> <button class="btn btn-block btn-primary" name="btnAccept"><h3>Accept friend request</h3></button></form>
                        
                        <?php }else{ ?>
                        <form action="actionProfile.php?user=<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" method="post"> <button class="btn btn-block btn-primary" name="btnAddFriend"><h3>Add as a friend</h3></button></form>
                        <?php }?>
                    </div>

                    
                        <!--<div style="width: 100%; border-bottom: 1px solid #006dcc;"><a href="Friends.php" class="btn btn" style="width: 100%; color: black;"><h3>Friends</h3></a></div>
                        <div style="width: 100%; border-bottom: 1px solid #006dcc;"><a href="ShowPictures.php" class="btn" style="width: 100%; color: black;"><h3>Photos</h3></a></div>
                        <div style="width: 100%; border-bottom: 1px solid #006dcc;"><a href="#" class="btn" style="width: 100%; color: black;"><h3>Events</h3></a></div>
                        <div style="width: 100%;"><a href="#" class="btn" style="width: 100%; color: black;"><h3>Friends</h3></a></div>-->
                  

                 <!--   <div class="well">
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
                        <h3><strong>Mutual friends</strong></h3>
                        <hr>
                        <?php if ($_smarty_tpl->tpl_vars['friendsCount']->value==0){?>
                            <p><small>No mutual friends</small></p>
                            
                        <?php }else{ ?>
                        <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mf']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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

                                <button class="btn btn-primary" onclick="location.href = 'actionProfile.php?user=<?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
'">Show profile</button>
                            </div>
                            <hr>

                            <hr>
                        </div>
                        <?php } ?>
                        <?php }?>

                    </div>

                </div>


                <div class="col-sm-9">
                    <h3><strong>User's twitts</strong></h3>
                    <?php if (!$_smarty_tpl->tpl_vars['areFriends']->value){?>
                    <h2><strong>Add user as friend so you can see their twitts!</strong></h2>
                    <?php }else{ ?>
                    <div class="well">
                        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['num']->value+1 - (0) : 0-($_smarty_tpl->tpl_vars['num']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>

                        <div class="media table table-hover"  >
                            <div class="media-left">
                                <img src="tpl/Media/avatar.png" class="media-object" style="width:60px">
                            </div>
                            <div class="media-body" onclick="location.href = 'ShowTwitt.php?id=<?php echo $_smarty_tpl->tpl_vars['twitts']->value[$_smarty_tpl->tpl_vars['i']->value]->id;?>
'">
                                <h4 class="media-heading"><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['surname']->value;?>
 <span><small><em>@<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</em></small></span> <span><small><?php echo $_smarty_tpl->tpl_vars['twitts']->value[$_smarty_tpl->tpl_vars['i']->value]->day;?>
/<?php echo $_smarty_tpl->tpl_vars['twitts']->value[$_smarty_tpl->tpl_vars['i']->value]->month;?>
/<?php echo $_smarty_tpl->tpl_vars['twitts']->value[$_smarty_tpl->tpl_vars['i']->value]->year;?>
</small></span></h4>
                               <!-- <button class="btn btn-primary" onclick="location.href = 'ShowTwitt.php?user=<?php echo $_smarty_tpl->tpl_vars['twitts']->value[$_smarty_tpl->tpl_vars['i']->value]->user->username;?>
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
                                        <form action="actionProfile.php?user=<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" method="post">
                                       <?php if (TwittDB::DidUserLikedTwitt($_smarty_tpl->tpl_vars['userr']->value,$_smarty_tpl->tpl_vars['twitts']->value[$_smarty_tpl->tpl_vars['i']->value])){?>
                             <button name="btnLike" class="btn" disabled ><i class="fa fa-heart"></i></button>
                            <?php }else{ ?>
                            <button name="btnLike" class="btn" ><i class="fa fa-heart"></i></button>
                           <input type="hidden" name="hdnTwittId" value=<?php echo $_smarty_tpl->tpl_vars['twitts']->value[$_smarty_tpl->tpl_vars['i']->value]->id;?>
>
                            <?php }?>
                             <?php echo $_smarty_tpl->tpl_vars['twitts']->value[$_smarty_tpl->tpl_vars['i']->value]->likesNO;?>

                                        </form>
                                    </td>
                                    <td>
                                        <button class="btn"  onclick="location.href = 'ShowTwitt.php?id=<?php echo $_smarty_tpl->tpl_vars['twitts']->value[$_smarty_tpl->tpl_vars['i']->value]->id;?>
'"> <i class="fa fa-reply" ></i></button>
                                    </td>
                                </tr>
                                
                            </table>
                        </div>

                        <hr>
                        <?php }} ?>

                    </div>
                    <?php }?>
                </div>
            </div>
        </div> 


    </body>

</html><?php }} ?>