<?php /* Smarty version Smarty-3.1.13, created on 2019-01-15 06:24:52
         compiled from "tpl\friends.tpl" */ ?>
<?php /*%%SmartyHeaderCode:140545c39ef9834a0a0-30551247%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a94a9fab6f17c3773dc7a8f3592a7bc2d450e8c0' => 
    array (
      0 => 'tpl\\friends.tpl',
      1 => 1547533476,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140545c39ef9834a0a0-30551247',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5c39ef98e06911_50396925',
  'variables' => 
  array (
    'user' => 0,
    'locations' => 0,
    'location' => 0,
    'friends' => 0,
    'majstor' => 0,
    'friend' => 0,
    'lok' => 0,
    'zan' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c39ef98e06911_50396925')) {function content_5c39ef98e06911_50396925($_smarty_tpl) {?><html>
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
        <div class="w3-row w3-quarter w3-light-gray" id="mySidebar">
           <!-- <a href="javascript:void(0)" onclick="w3_close()" title="Close Sidemenu" class="w3-bar-item w3-button w3-hide-large w3-large">Zatvori <i class="fa fa-remove"></i></a>-->
             <div class="w3-bar-item w3-light-gray">
                    <h4><i class="fa fa-pencil"></i> Search people </h4>
                </div>
                <br>
                <!--<script>
                    function w3_open() {
                        document.getElementById("mySidebar").style.display = "block";
                    }
                    function w3_close() {
                        document.getElementById("mySidebar").style.display = "none";
                    }
                </script>-->
               

             <form action="Friends.php" method="GET">
                
                <button class="w3-button w3-block w3-blue" type="submit" name="sbmFindPeople" value="Show"><i class="fa fa-search w3-margin-left"></i> Find People</button>
                <input type="hidden" name="user" value="<?php echo $_smarty_tpl->tpl_vars['user']->value;?>
">
            </form>
<br>
<form action="Friends.php" method="GET">
     <button class="w3-button w3-block w3-blue" type="submit" name="sbmMyFriends" value="Show"><i class="fa fa-search w3-margin-left"></i> Show My Friends </button>
                <input type="hidden" name="user" value="<?php echo $_smarty_tpl->tpl_vars['user']->value;?>
">
</form>
 <div class="w3-bar-item w3-light-gray">
                    <h4><i class="fa fa-pencil"></i> Change criteria</h4>
                </div>
                <br>
                <form action="Friends.php" method="GET">
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
            <form action="Friends.php" method="GET">
                <div class="w3-bar-item w3-light-gray">
                    <h4><i class="fa fa-search"></i> Search by name </h4>
                </div>
                <br>
                <div class="w3-bar-item">
                    <label><i class="fa fa-clock-o"></i> Name and Surname</label>
                    <input class="w3-input w3-border" type="text" name="userNameSurname" required>
                </div>
                <br>
                <button class="w3-button w3-block w3-blue" type="submit" name="sbmNameSurname" value="Show"><i class="fa fa-search w3-margin-left"></i> Find</button>
                <input type="hidden" name="user" value="<?php echo $_smarty_tpl->tpl_vars['user']->value;?>
">
            </form>
            <br>
            <br>
            <form action="Friends.php" method="GET">
                <div class="w3-bar-item w3-light-gray">
                    <h4><i class="fa fa-search"></i> Search by username </h4>
                </div>
                <br>
                <div class="w3-bar-item">
                    <label><i class="fa fa-clock-o"></i> Username </label>
                    <input class="w3-input w3-border" type="text" name="userUsername" required>
                </div>
                <br>
                <button class="w3-button w3-block w3-blue" type="submit" name="sbmUsername" value="Show"><i class="fa fa-search w3-margin-left"></i> Find</button>
                <input type="hidden" name="user" value="<?php echo $_smarty_tpl->tpl_vars['user']->value;?>
">
            </form>

        </div>



        <div class="w3-row w3-threequarter">

            <div class="w3-container w3-margin-top">
                <h3><i class="fa fa-thumbs-o-up"></i> Users </h3>
            </div>
            <?php if (empty($_smarty_tpl->tpl_vars['friends']->value)){?>
            <span><h3>User not found</h3></span>
            <?php }else{ ?>
            
            <?php  $_smarty_tpl->tpl_vars['friend'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['friend']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['friends']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['friend']->key => $_smarty_tpl->tpl_vars['friend']->value){
$_smarty_tpl->tpl_vars['friend']->_loop = true;
?> 
            
<div class="w3-row w3-quarter">
                <div class="w3-margin-bottom w3-white">

                    <!--<?php if ($_smarty_tpl->tpl_vars['majstor']->value->slika!=null){?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['majstor']->value->slika;?>
" alt="Majstor" style="width:300px; height: 300px;">
                    <?php }else{ ?>
                    <img src="slike/luka.jpg" alt="Majstor" style="width:300px; height: 300px;">
                    <?php }?>-->
                    <div class="w3-container w3-white">

                        <!--<?php if ($_smarty_tpl->tpl_vars['majstor']->value->online){?>
                        <h3><span style="color:green"><i class="fa fa-circle"></i></span>  <?php echo $_smarty_tpl->tpl_vars['majstor']->value->ime;?>
 <?php echo $_smarty_tpl->tpl_vars['majstor']->value->prezime;?>
</h3>
                        <?php }else{ ?>-->
                        <h3><span style="color:blue"><i class="fa fa-user-o"></i></span> <?php echo $_smarty_tpl->tpl_vars['friend']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['friend']->value->surname;?>
</h3>
                        <br>
                        <span><small><em>@<?php echo $_smarty_tpl->tpl_vars['friend']->value->username;?>
</em></small></span>
                        <br>
                        <span><small><?php echo $_smarty_tpl->tpl_vars['friend']->value->location->town;?>
, <?php echo $_smarty_tpl->tpl_vars['friend']->value->location->state;?>
</small></span>
                        <!--<?php }?>-->
                        <!--<h6 class="w3-opacity"><?php  $_smarty_tpl->tpl_vars['lok'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lok']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['majstor']->value->lokacije; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lok']->key => $_smarty_tpl->tpl_vars['lok']->value){
$_smarty_tpl->tpl_vars['lok']->_loop = true;
?> <?php echo $_smarty_tpl->tpl_vars['lok']->value->mesto;?>
 <?php } ?></h6>
                        <!--<p><?php  $_smarty_tpl->tpl_vars['zan'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['zan']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['majstor']->value->zanati; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['zan']->key => $_smarty_tpl->tpl_vars['zan']->value){
$_smarty_tpl->tpl_vars['zan']->_loop = true;
?> <?php echo $_smarty_tpl->tpl_vars['zan']->value->tip;?>
 <?php } ?></p>

                        <div class="w3-container w3-red">
                            <!--<h2><i class="fa fa-star"></i> Ocena<label style="float:right"> <?php echo $_smarty_tpl->tpl_vars['majstor']->value->ocena;?>
</label></h2>
                             <?php if ($_smarty_tpl->tpl_vars['majstor']->value->ocena==null){?>
                            <h2><i class="fa fa-star"></i> Ocena<label style="float:right"> X</label></h2>
                            <?php }else{ ?>
                            <h2><i class="fa fa-star"></i> Ocena<label style="float:right"> <?php echo $_smarty_tpl->tpl_vars['majstor']->value->ocena;?>
</label></h2>
                            <?php }?>-->
                        </div>
                        <a href="actionProfile.php?user=<?php echo $_smarty_tpl->tpl_vars['friend']->value->username;?>
" class="w3-button w3-block w3-black w3-margin-bottom"><i class="fa fa-user-o"></i> Show Profile</a>
                        
                    </div>

               


          </div>
            <?php } ?>
              
            <?php }?>
             </div>
        </div>
        </div>




    </body>
</html><?php }} ?>