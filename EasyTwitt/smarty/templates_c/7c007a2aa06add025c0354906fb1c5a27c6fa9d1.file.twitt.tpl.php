<?php /* Smarty version Smarty-3.1.13, created on 2019-01-16 00:02:24
         compiled from "tpl\twitt.tpl" */ ?>
<?php /*%%SmartyHeaderCode:270105c3a81dd5a1df5-77947647%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c007a2aa06add025c0354906fb1c5a27c6fa9d1' => 
    array (
      0 => 'tpl\\twitt.tpl',
      1 => 1547585824,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '270105c3a81dd5a1df5-77947647',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5c3a81dda29570_46416642',
  'variables' => 
  array (
    'admin' => 0,
    'twitt' => 0,
    'user' => 0,
    'userr' => 0,
    'me' => 0,
    'comm' => 0,
    'u' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3a81dda29570_46416642')) {function content_5c3a81dda29570_46416642($_smarty_tpl) {?><!DOCTYPE html>
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
        
          <link rel="stylesheet" href="tpl/css/twitt.css">
    </head>
    <body>
        <div class="container-fluid full-page">
            <div class="row spacing">
                <div class="col-sm-3 text-center">
                    <div class="well">
                        <?php if (!$_smarty_tpl->tpl_vars['admin']->value){?>
                        <a href="actionProfile.php?user=<?php echo $_smarty_tpl->tpl_vars['twitt']->value->user->username;?>
">
                            <img src="tpl/Media/avatar.png" alt="Boss" style="height:300px; width:80%;" class="img-rounded">
                        </a>
                        <?php }else{ ?>
                         <img src="tpl/Media/avatar.png" alt="Boss" style="height:300px; width:80%;" class="img-rounded">
                        <?php }?>
                        <h3><strong><?php echo $_smarty_tpl->tpl_vars['twitt']->value->user->name;?>
 <?php echo $_smarty_tpl->tpl_vars['twitt']->value->user->surname;?>
</strong></h3>
                        <h4>@<?php echo $_smarty_tpl->tpl_vars['twitt']->value->user->username;?>
</h4>
                        <h3><strong><?php echo $_smarty_tpl->tpl_vars['twitt']->value->user->location->town;?>
, <?php echo $_smarty_tpl->tpl_vars['twitt']->value->user->location->state;?>
</strong></h3>
                        
                    </div>
                    <!--
                    <div class="well">
                        <div style="width: 100%; border-bottom: 1px solid #006dcc;"><a href="Friends.php?user=<?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
" class="btn btn" style="width: 100%; color: black;"><h3>Friends</h3></a></div>
                    <div style="width: 100%; border-bottom: 1px solid #006dcc;"><a href="ShowPictures.php" class="btn" style="width: 100%; color: black;"><h3>Photos</h3></a></div>
                    <div style="width: 100%; border-bottom: 1px solid #006dcc;"><a href="#" class="btn" style="width: 100%; color: black;"><h3>Events</h3></a></div>
                    <div style="width: 100%;"><a href="#" class="btn" style="width: 100%; color: black;"><h3>Friends</h3></a></div>
                    </div>-->
                </div>
                          <div class="col-sm-9">
                              
<div class="">

         
<!-- Entry with Media turned on. -->
<div class="tweetEntry">
  
  <div class="tweetEntry-content">
    <?php if (!$_smarty_tpl->tpl_vars['admin']->value){?>
    <a class="tweetEntry-account-group" href="actionProfile.php?user=<?php echo $_smarty_tpl->tpl_vars['twitt']->value->user->username;?>
">
     <?php }?>
      <img class="tweetEntry-avatar" src="http://placekitten.com/200/200">
      
      <strong class="tweetEntry-fullname">
      <?php echo $_smarty_tpl->tpl_vars['twitt']->value->user->name;?>
 <?php echo $_smarty_tpl->tpl_vars['twitt']->value->user->surname;?>

      </strong>
      
      <span class="tweetEntry-username">
        @<b><?php echo $_smarty_tpl->tpl_vars['twitt']->value->user->username;?>
</b>
      </span>
      
      <span class="tweetEntry-timestamp"><?php echo $_smarty_tpl->tpl_vars['twitt']->value->day;?>
/<?php echo $_smarty_tpl->tpl_vars['twitt']->value->month;?>
/<?php echo $_smarty_tpl->tpl_vars['twitt']->value->year;?>
</span>
      
    </a>
    
    <div class="tweetEntry-text-container">
     <?php echo $_smarty_tpl->tpl_vars['twitt']->value->text;?>

    </div>
    
  </div>
   <?php if (!(empty($_smarty_tpl->tpl_vars['twitt']->value->photos))){?>
                              
</div>               
  <div class="optionalMedia">
     <img src="<?php echo $_smarty_tpl->tpl_vars['twitt']->value->photos[0]->path;?>
" class="optionalMedia-img">
  </div>
 <?php }?>
  
  <div class="tweetEntry-action-list" style="line-height:24px;color: #b1bbc3;">
      <table>
          <tr>
              <td>
                  <?php if (!$_smarty_tpl->tpl_vars['admin']->value){?>
      <form action="ShowTwitt" method="get">
          
                            <?php if (TwittDB::DidUserLikedTwitt($_smarty_tpl->tpl_vars['userr']->value,$_smarty_tpl->tpl_vars['twitt']->value)){?>
                             <button name="btnLike" class="btn" disabled ><i class="fa fa-heart"></i></button>
                            <?php }else{ ?>
                            <button name="btnLike" class="btn"><i class="fa fa-heart"></i></button>
                            <input type="hidden" name="id" value=<?php echo $_smarty_tpl->tpl_vars['twitt']->value->id;?>
>
                            <?php }?>
                             </form>
       <?php }?>
       
              </td>
              <td>
                  <?php echo $_smarty_tpl->tpl_vars['twitt']->value->likesNO;?>

              </td>
              <td>
                  <?php if (!$_smarty_tpl->tpl_vars['admin']->value){?>
      <form action="ShowTwitt.php?id=<?php echo $_smarty_tpl->tpl_vars['twitt']->value->id;?>
" method="post">
           <?php if ($_smarty_tpl->tpl_vars['me']->value){?>
           <button name="btnDelete" class="btn"><i class="fa fa-remove"></i>Delete Twitt</button>
           <?php }else{ ?>
           <button name="btnReport" class="btn"><i class="fa fa-plus"></i>Report Twitt</button>
           <?php }?>
      </form>
                  <?php }else{ ?>
                  <form action="Admin.php" method="post">
                      <input type="hidden" name="hdnIdTwitt" value="<?php echo $_smarty_tpl->tpl_vars['twitt']->value->id;?>
">
           <button name="btnDelete" class="btn"><i class="fa fa-remove"></i>Delete Twitt</button>
                  </form>
                  <?php }?>
              </td>
              </tr>
      </table>
      <?php if (!$_smarty_tpl->tpl_vars['admin']->value){?>
      <form action="ShowTwitt.php" action="GET">
          <div class="form-group">
                            <label for="usr"><h3><strong>Write a comment</strong></h3></label>
                            <input type="text" class="form-control" id="usr" name="txtComment" placeholder="Write your comment here...">
       <button class="btn"  name="btnComment"> <i class="fa fa-reply" ></i></button>
       <input type="hidden" name="id" value=<?php echo $_smarty_tpl->tpl_vars['twitt']->value->id;?>
>
          </div>
      </form>
      <?php }?>
      
  </div>
      <?php if (!(empty($_smarty_tpl->tpl_vars['twitt']->value->comments))){?>
      <?php  $_smarty_tpl->tpl_vars['comm'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comm']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['twitt']->value->comments; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comm']->key => $_smarty_tpl->tpl_vars['comm']->value){
$_smarty_tpl->tpl_vars['comm']->_loop = true;
?>
 <div class="tweetEntry-content">
       <?php $_smarty_tpl->tpl_vars['u'] = new Smarty_variable(CommentDB::ReadCommentsUser($_smarty_tpl->tpl_vars['comm']->value), null, 0);?>
      <strong class="tweetEntry-fullname">
      <?php echo $_smarty_tpl->tpl_vars['u']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['u']->value->surname;?>

      </strong>
      
      <span class="tweetEntry-username">
       @<b><?php echo $_smarty_tpl->tpl_vars['u']->value->username;?>
</b>
      </span>
     <br>
      <span class="tweetEntry-timestamp"><?php echo $_smarty_tpl->tpl_vars['comm']->value->day;?>
/<?php echo $_smarty_tpl->tpl_vars['comm']->value->month;?>
/<?php echo $_smarty_tpl->tpl_vars['comm']->value->year;?>
  <?php echo $_smarty_tpl->tpl_vars['comm']->value->hour;?>
:<?php echo $_smarty_tpl->tpl_vars['comm']->value->minute;?>
:<?php echo $_smarty_tpl->tpl_vars['comm']->value->second;?>
</span>
      
   <?php echo $_smarty_tpl->tpl_vars['comm']->value->text;?>

       </div>
      <?php } ?>
      
      <?php }?>

  </div>
  
</div>
  

               </div>
                </div>
            </div>

</body> 
</html><?php }} ?>