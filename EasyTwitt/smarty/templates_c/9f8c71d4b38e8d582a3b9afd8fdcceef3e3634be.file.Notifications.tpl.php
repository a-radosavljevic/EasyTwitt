<?php /* Smarty version Smarty-3.1.13, created on 2019-01-16 00:21:24
         compiled from "tpl\Notifications.tpl" */ ?>
<?php /*%%SmartyHeaderCode:198615c3d4b5f936f20-89776734%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f8c71d4b38e8d582a3b9afd8fdcceef3e3634be' => 
    array (
      0 => 'tpl\\Notifications.tpl',
      1 => 1547530906,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '198615c3d4b5f936f20-89776734',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5c3d4b5fa65c17_28963462',
  'variables' => 
  array (
    'notifications' => 0,
    'notif' => 0,
    'frs' => 0,
    'fr' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3d4b5fa65c17_28963462')) {function content_5c3d4b5fa65c17_28963462($_smarty_tpl) {?><!DOCTYPE html>
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
    
       
      
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="tpl/index.css">
        <style>
            body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
        </style>
    </head>
    <body>

        <div class="w3-container w3-light-gray" id="contact" style=" margin-top: 50px; height:100%">
            <h2>Notifications</h2>
            
            <div class="w3-row w3-half">
                <div class="w3-container w3-margin-top">
                    <h3><i class="fa fa-bars"></i> Notifications </h3>
                </div>
                <div class="w3-row-padding w3-padding-16">
                    <div class="w3-responsive">
                        <table class="w3-table-all">
                            <?php if (!empty($_smarty_tpl->tpl_vars['notifications']->value)){?>
                            <?php  $_smarty_tpl->tpl_vars['notif'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['notif']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['notifications']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['notif']->key => $_smarty_tpl->tpl_vars['notif']->value){
$_smarty_tpl->tpl_vars['notif']->_loop = true;
?>
                            <tr>
                           
                                <td><a href="ShowTwitt.php?id=<?php echo $_smarty_tpl->tpl_vars['notif']->value->onTwitt->id;?>
" class="w3-bar-item w3-button w3-mobile"><i class="fa fa-user-o" style="color:blue"></i> User <?php echo $_smarty_tpl->tpl_vars['notif']->value->fromUser;?>
 <?php echo $_smarty_tpl->tpl_vars['notif']->value->type;?>
 your twitt! </a></td>
                               
                           
                            <td> <form action="ShowNotifications.php" method="POST">
                                <button class="btn" name="btnDelete" type="submit"><i class="fa fa-trash"></i></button>
                                 <input type="hidden" name="hdnIdN" value="<?php echo $_smarty_tpl->tpl_vars['notif']->value->id;?>
">
                            </form> 
                                </td>
                            </tr>
                            <?php } ?>
                            <?php }else{ ?>
                            No notification
                            <?php }?>
                            
                            
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="w3-row w3-half">
                <div class="w3-container w3-margin-top">
                    <h3><i class="fa fa-newspaper-o"></i> Friend Requests</h3>
                </div>
                <div class="w3-row-padding w3-padding-16">
                    <div class="w3-responsive">
                        <table class="w3-table-all">
                          
                            <?php  $_smarty_tpl->tpl_vars['fr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fr']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['frs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fr']->key => $_smarty_tpl->tpl_vars['fr']->value){
$_smarty_tpl->tpl_vars['fr']->_loop = true;
?>
                            <tr>

                                <td><a href="actionProfile.php?user=<?php echo $_smarty_tpl->tpl_vars['fr']->value->username;?>
" class="w3-bar-item w3-button w3-mobile"><i class="fas fa-user" style="color:green"></i> <?php echo $_smarty_tpl->tpl_vars['fr']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['fr']->value->surname;?>
  @<?php echo $_smarty_tpl->tpl_vars['fr']->value->username;?>
</a></td>
                                <td></td>
                            </tr>
                            <?php } ?> 
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </body>
</html><?php }} ?>