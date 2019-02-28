<?php /* Smarty version Smarty-3.1.13, created on 2019-01-16 00:20:17
         compiled from "tpl\messages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:126485c3e782e3ce9e4-64154857%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef9561bf381bcec1fda09faf4559b63c344bbd3e' => 
    array (
      0 => 'tpl\\messages.tpl',
      1 => 1547598006,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '126485c3e782e3ce9e4-64154857',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5c3e782ec426a0_95849303',
  'variables' => 
  array (
    'poruke' => 0,
    'user' => 0,
    'da' => 0,
    'name' => 0,
    'display' => 0,
    'porukice' => 0,
    'msg' => 0,
    'u' => 0,
    'other' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3e782ec426a0_95849303')) {function content_5c3e782ec426a0_95849303($_smarty_tpl) {?><!DOCTYPE HTML>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>EasyTwitt</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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

        <link rel="styleheet" href="bootstrap/css/bootstrap.min.css">

    </head>

    <body>

        <div class="container-fluid full-page">
            <div class="row spacing">

                <div class="col-sm-3" style="border-right: 1px solid lightgrey;">
                    <label class="btn btn-primary btn-block">All conversations <i class="fa fa-inbox"></i></label>
                    <hr>

                    <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['poruke']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
</h4>
                            
                            <form action="actionInbox.php" method="post">
                                <input type="hidden" name="other" value=<?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
>
                                <button class="btn btn-primary" name="btnShowChat" type="submit">Show chat</button>
                            </form>
                        </div>
                        <hr>

                        <hr>
                    </div>
                    <?php } ?>
                </div>

                <div class="col-sm-9">


                    <?php if ($_smarty_tpl->tpl_vars['da']->value){?>
                    <div class="message-wrap col-lg-8">
                        <div class="msg-wrap">


                            <div class="media msg">
                                <a class="pull-left" href="#">
                                    <img class="img-responsive iamgurdeeposahan" alt="avatar" src="tpl/Media/avatar.png" style="width: 100px; height: 150px;">

                                </a>
                                <div class="media-body" >
                                    
                                    <h3 class="media-heading"><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</h3>
                                    
                                    <p><?php echo $_smarty_tpl->tpl_vars['display']->value;?>
</p>
                                    
                                    <a href="actionProfile.php" class="w3-button w3-red" style="text-decoration: none"><i class="fa fa-user-o"></i> Show profile</a>
                                    
                                </div>

                            </div>
                            <?php if ('porukice'!=null){?>
                            <?php  $_smarty_tpl->tpl_vars['msg'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['msg']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['porukice']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->key => $_smarty_tpl->tpl_vars['msg']->value){
$_smarty_tpl->tpl_vars['msg']->_loop = true;
?>
                            <hr>
                            <div class="media msg">
                                
                                <?php if (MessageDB::isMyMessage($_smarty_tpl->tpl_vars['msg']->value,$_smarty_tpl->tpl_vars['u']->value)==false){?>
                                <h6 style="color: blue"><i class="fa fa-comment-o fa-2x"></i> <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</h6>
                                <?php }else{ ?>
                                <h6 style="color: red"><i class="fa fa-comment-o fa-2x"></i> Me</h6>

                                <?php }?>

                                <small class="col-lg-10 w3-card w3-light-grey"><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</small>

                                <div class="media-body">
                                    <small class="pull-right time"><i class="fa fa-clock-o"></i> <?php echo $_smarty_tpl->tpl_vars['msg']->value->day;?>
.<?php echo $_smarty_tpl->tpl_vars['msg']->value->month;?>
.<?php echo $_smarty_tpl->tpl_vars['msg']->value->year;?>
</small>
                                </div>
                            </div>
                            <?php } ?>
                            <?php }?>


                        </div>

                        <form action="actionInbox.php" method="POST">
                            <div class="send-wrap ">

                                <hr>
                                <label>Replay</label>
                                <input class="w3-input w3-border w3-margin-bottom" name="txt" style="height:60px" placeholder="Here type your message">


                            </div>
                            <div class="btn-panel">
                                <input type="hidden" name="otherSend" value=<?php echo $_smarty_tpl->tpl_vars['other']->value->username;?>
>
                                <button name="btnSendMessage" type="submit" class="w3-button w3-red w3-right" onclick="document.getElementById('id01').style.display = 'none'">Send  <i class="fa fa-paper-plane"></i></button>
                            </div>
                        </form>

                        <br>
                        <hr>
                        <br>
                    </div>
                    <?php }?>


                </div>

            </div>

        </div>

    </body>
</html><?php }} ?>