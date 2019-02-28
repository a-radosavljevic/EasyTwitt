<?php /* Smarty version Smarty-3.1.13, created on 2018-06-21 11:47:19
         compiled from "tpl\porukeAdmina.tpl" */ ?>
<?php /*%%SmartyHeaderCode:86695b29f4f9741326-82629102%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e3808962321c3491965aebd0b36e28c6e9739bd' => 
    array (
      0 => 'tpl\\porukeAdmina.tpl',
      1 => 1529523089,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '86695b29f4f9741326-82629102',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5b29f4f98ee8e8_14337293',
  'variables' => 
  array (
    'poruke' => 0,
    'email' => 0,
    'da' => 0,
    'imaSlika' => 0,
    'slika' => 0,
    'onlajn' => 0,
    'ime' => 0,
    'display' => 0,
    'profilMajstora' => 0,
    'emailKorisnika' => 0,
    'porukice' => 0,
    'msg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b29f4f98ee8e8_14337293')) {function content_5b29f4f98ee8e8_14337293($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <title>MajstorBOB | Poruke</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href='https://fonts.googleapis.com/css?family=RobotoDraft' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="tpl/style.css">
    <link rel="stylesheet" href="tpl/index.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"


          <body>

        <!-- Side Navigation -->
          <!-- Side Navigation -->
        

        <!-- Overlay effect when opening the side navigation on small screens -->
        <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="Close Sidemenu" id="myOverlay"></div>

        <!-- Page content -->
        <div class="w3-container" style="margin-top: 60px; height:100%">
            
            <nav class="w3-sidebar w3-quarter w3-bar-block w3-collapse w3-white w3-card" style="z-index:3;width:320px;" id="mySidebar"><a href="javascript:void(0)" onclick="w3_close()" title="Close Sidemenu" 
                                                                                                                                                             class="w3-bar-item w3-button w3-hide-large w3-large">Zatvori <i class="fa fa-remove"></i></a>
            <!--<a href="javascript:void(0)" class="w3-bar-item w3-button w3-dark-grey w3-button w3-hover-black w3-left-align" onclick="document.getElementById('id01').style.display='block'">New Message <i class="w3-padding fa fa-pencil"></i></a>-->

            <label class="w3-button w3-block w3-light-grey">Prijemno sanduče <i class="fa fa-inbox w3-margin-right"></i></label>

            <hr>
            <?php  $_smarty_tpl->tpl_vars['email'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['email']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['poruke']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['email']->key => $_smarty_tpl->tpl_vars['email']->value){
$_smarty_tpl->tpl_vars['email']->_loop = true;
?>
            <form action="inboxAdmina.php" method="POST">
                <div class="w3-container">
                    
                    <h5 class="media-heading"><?php echo $_smarty_tpl->tpl_vars['email']->value;?>
</h5>
                     
                     <input class="w3-button w3-block w3-red" type="submit" name="sbmRazgovor" value="Prikaži">
                    <input class="w3-button w3-block w3-red" type="hidden" name="emailKorisnika" value=<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
>
                    
                    
                   
                </div>
                <br>
                <hr style="border: 1px solid lightgray">
            </form>
            <?php } ?>

        </nav>

     <div class="w3-main" style="margin-left:320px; height:100%">

            <i class="fa fa-bars w3-button w3-white w3-hide-large w3-xlarge w3-margin-left w3-margin-top" onclick="w3_open()"></i>
            <a href="javascript:void(0)" class="w3-hide-large w3-red w3-button w3-right w3-margin-top w3-margin-right" onclick="document.getElementById('id01').style.display = 'block'"><i class="fa fa-pencil"></i></a>

            <?php if ($_smarty_tpl->tpl_vars['da']->value){?>
            <div class="message-wrap col-lg-8">
                <div class="msg-wrap">


                    <div class="media msg">
                        <a class="pull-left" href="#">
                           
                            <?php if (!$_smarty_tpl->tpl_vars['imaSlika']->value){?>
                            
                              <img class="img-responsive " alt="avatar" src="slike/profAvatar.png" style="width: 100px; height: 150px;">
                            
                            <?php }else{ ?>
                            <div class="imgcontainer " style="width: 100px; height: 150px;">
                                <img class="img-responsive " alt="avatar" src="<?php echo $_smarty_tpl->tpl_vars['slika']->value;?>
" style="height: 100%;"  >
                                </div>
                                <?php }?>
                                
                        </a>
                        <div class="media-body"  >
                            <?php if ($_smarty_tpl->tpl_vars['onlajn']->value){?>
                            <h3 class="media-heading"><?php echo $_smarty_tpl->tpl_vars['ime']->value;?>
 <i class="fa fa-circle" style="color:green"></i></h3>
                            <?php }else{ ?>
                            <h3 class="media-heading"><?php echo $_smarty_tpl->tpl_vars['ime']->value;?>
</h3>
                            <?php }?>
                                <p><?php echo $_smarty_tpl->tpl_vars['display']->value;?>
</p>
                                <?php if (!$_smarty_tpl->tpl_vars['profilMajstora']->value){?>
                                <a href="profil.php?client=<?php echo $_smarty_tpl->tpl_vars['emailKorisnika']->value;?>
" class="w3-button w3-red" style="text-decoration: none"><i class="fa fa-user-o"></i> Prikaži profil</a>
                                <?php }else{ ?>
                                <a href="profil.php?worker=<?php echo $_smarty_tpl->tpl_vars['emailKorisnika']->value;?>
" class="w3-button w3-red" style="text-decoration: none"><i class="fa fa-user-o"></i> Prikaži profil</a>
                                <?php }?>
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
                     
                        <?php if ($_smarty_tpl->tpl_vars['msg']->value->posiljaoc=="majstor"&&$_smarty_tpl->tpl_vars['msg']->value->majstor_email0=="admin"){?>	
                         <h6 style="color: red"><i class="fa fa-comment-o fa-2x"></i> Admin </h6>
                        <?php }else{ ?>
                        <?php if ($_smarty_tpl->tpl_vars['msg']->value->posiljaoc=="musterija"&&$_smarty_tpl->tpl_vars['msg']->value->musterija_email1=="admin"){?>
                         <h6 style="color: red"><i class="fa fa-comment-o fa-2x"></i> Admin </h6>>
                        <?php }else{ ?>
                        <h6 style="color: blue"><i class="fa fa-comment-o fa-2x"></i><?php echo $_smarty_tpl->tpl_vars['ime']->value;?>
</h6>
                        <?php }?>
                       <?php }?>

                        <small class="col-lg-10 w3-card w3-light-grey"><?php echo $_smarty_tpl->tpl_vars['msg']->value->tekst_poruke;?>
</small>
                        
                        <div class="media-body">
                            <small class="pull-right time"><i class="fa fa-clock-o"></i> <?php echo $_smarty_tpl->tpl_vars['msg']->value->datum_slanja_poruke;?>
</small>
                        </div>
                    </div>
                    <?php } ?>
                    <?php }?>


                </div>

                <form action="inboxAdmina.php"  method="POST">
                    <div class="send-wrap ">

                        <hr>
                        <label>Poruka</label>
                        <input class="w3-input w3-border w3-margin-bottom" name="txtPoruka" style="height:60px" placeholder="Ovde unesite Vašu poruku">


                    </div>
                    <div class="btn-panel">
                        <button name="sbmPosaljiPoruku" type="submit" class="w3-button w3-red w3-right" onclick="document.getElementById('id01').style.display = 'none'">Pošalji  <i class="fa fa-paper-plane"></i></button>
                        <input type="hidden" name="emailKorisnika" value=<?php echo $_smarty_tpl->tpl_vars['emailKorisnika']->value;?>
>
                    </div>
                </form>

                <br>
                <hr>
                <br>
            </div>
            <?php }?>

        </div>
        </div>
    </body>
</html> 
<?php }} ?>