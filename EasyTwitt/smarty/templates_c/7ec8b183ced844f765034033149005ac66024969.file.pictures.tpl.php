<?php /* Smarty version Smarty-3.1.13, created on 2019-01-15 21:08:36
         compiled from "tpl\pictures.tpl" */ ?>
<?php /*%%SmartyHeaderCode:88885c3a347697c3c6-83647729%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ec8b183ced844f765034033149005ac66024969' => 
    array (
      0 => 'tpl\\pictures.tpl',
      1 => 1547585932,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '88885c3a347697c3c6-83647729',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5c3a347698c1a1_09582329',
  'variables' => 
  array (
    'pictures' => 0,
    'picture' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3a347698c1a1_09582329')) {function content_5c3a347698c1a1_09582329($_smarty_tpl) {?><html>
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
            <?php if (empty($_smarty_tpl->tpl_vars['pictures']->value)){?>
            <span><h3>No pictures</h3></span>
            <?php }else{ ?>
            <?php  $_smarty_tpl->tpl_vars['picture'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['picture']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pictures']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['picture']->key => $_smarty_tpl->tpl_vars['picture']->value){
$_smarty_tpl->tpl_vars['picture']->_loop = true;
?> 
            <div class="w3-row w3-quarter">

                <div class="w3-margin-bottom w3-white">

                   
                    <div class="w3-container w3-white">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['picture']->value->path;?>
" alt="Pic" width=430 height=430 >
                        
                        <h4><span ><i class="fa fa-photo"> <?php echo $_smarty_tpl->tpl_vars['picture']->value->about;?>
</i></span> </h4>
                        
                        
                        <span style="color:blue"> <h5><i class="fa fa-map-marker"> <?php echo $_smarty_tpl->tpl_vars['picture']->value->location->town;?>
, <?php echo $_smarty_tpl->tpl_vars['picture']->value->location->state;?>
 </i></h5></span>
                       
                        </div>
                        <a href="ShowTwitt.php?id=<?php echo $_smarty_tpl->tpl_vars['picture']->value->id;?>
" class="w3-button w3-block w3-black w3-margin-bottom"><i class="fa fa-user-o"></i> Show Twitt</a>
                        <input type="hidden" name="twittID" value="<?php echo $_smarty_tpl->tpl_vars['picture']->value->id;?>
">
                    </div>

                </div>


           
            <?php } ?>
            <?php }?>
             </div>
       




    </body>
</html><?php }} ?>