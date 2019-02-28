<?php /* Smarty version Smarty-3.1.13, created on 2019-01-15 17:38:28
         compiled from "tpl\admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:204545b2845daf03dc4-08243205%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a71545145354e107bcef9c3fe2c9b517087988c7' => 
    array (
      0 => 'tpl\\admin.tpl',
      1 => 1547573903,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204545b2845daf03dc4-08243205',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5b2845db3388e3_19244670',
  'variables' => 
  array (
    'twitts' => 0,
    'twitt' => 0,
    'locations' => 0,
    'location' => 0,
    'frs' => 0,
    'fr' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b2845db3388e3_19244670')) {function content_5b2845db3388e3_19244670($_smarty_tpl) {?><!DOCTYPE html>
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
           
            
            <div class="w3-row w3-half">
                 <h2>Notifications</h2>
                <div class="w3-container w3-margin-top">
                    <h3><i class="fab fa-twitter" style="color:blue"></i> Reported Twitts </h3>
                </div>
                <div class="w3-row-padding w3-padding-16">
                    <div class="w3-responsive">
                        <table class="w3-table-all">
                            <?php if (!empty($_smarty_tpl->tpl_vars['twitts']->value)){?>
                            <?php  $_smarty_tpl->tpl_vars['twitt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['twitt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['twitts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['twitt']->key => $_smarty_tpl->tpl_vars['twitt']->value){
$_smarty_tpl->tpl_vars['twitt']->_loop = true;
?>
                            <tr>
                           
                                <td><a href="ShowTwitt.php?id=<?php echo $_smarty_tpl->tpl_vars['twitt']->value->id;?>
" class="w3-bar-item w3-button w3-mobile"><i class="fas fa-ellipsis-h"></i> "<?php echo $_smarty_tpl->tpl_vars['twitt']->value->text;?>
" </a></td>
                               
                           
                            <td> <form action="Admin.php" method="POST">
                                <button class="btn" name="btnDelete" type="submit"><i class="fa fa-trash"></i></button>
                                 <input type="hidden" name="hdnIdTwitt" value="<?php echo $_smarty_tpl->tpl_vars['twitt']->value->id;?>
">
                            </form> 
                                </td>
                                
                            </tr>
                            <?php } ?>
                            <?php }else{ ?>
                            No reported twitts
                            <?php }?>
                            
                            
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="w3-row w3-half">
                
                <h2>Commercials </h2>
                <div class="w3-container w3-margin-top">
                    <h3><i class="fa fa-bars"></i>  Create Commercial </h3>
                     <h4><i class="fa fa-info-circle"></i> Commercials created by Admin are visible to everyone, even if you are not registered </h4>
                </div>
                <div class="w3-row-padding w3-padding-16">
                    <div class="w3-responsive">
                        <form action="AdminReported.php" method="POST" enctype="multipart/form-data">
                    
                            <input type="text" name="commText" class="form-control" id="usr" placeholder="Writte Commercial Text">
                           
                            <div>
                      <input type="hidden" name="MAX_FILE_SIZE" value="20000000">
                <input name="fajl_input" type="file" id="fajl_input" accept="image/*" onchange="loadFile(event)">
            
               
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
                            <button class="btn btn-primary btn-block" name="btnCreate" style="margin-top: 20px">Create</button>
                             <hr>
                            </form>
                    </div>
                </div>
              <!-- <div class="w3-container w3-margin-top">
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

                                <td><a href="" class="w3-bar-item w3-button w3-mobile"><i class="fa fa-file-o" style="color:green"></i> <?php echo $_smarty_tpl->tpl_vars['fr']->value->username;?>
</a></td>
                                <td></td>
                            </tr>
                            <?php } ?> 
                            
                        </table>
                    </div>
                </div>-->
            </div>
        </div>


    </body>
</html><?php }} ?>