<?php /* Smarty version Smarty-3.1.13, created on 2019-01-15 23:16:39
         compiled from "tpl\start.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24205beff05b9814a8-17613649%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f8e88996f5df9533b7c9f3c4654637d57435959' => 
    array (
      0 => 'tpl\\start.tpl',
      1 => 1547579920,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24205beff05b9814a8-17613649',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5beff05b993a89_19453083',
  'variables' => 
  array (
    'commercials' => 0,
    'comm' => 0,
    'show' => 0,
    'locations' => 0,
    'location' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5beff05b993a89_19453083')) {function content_5beff05b993a89_19453083($_smarty_tpl) {?><!DOCTYPE HTML>

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

	<!-- Changes navbar bg color after scrolling -->
	<script src="tpl/js/scroll.js"></script>

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
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
			<li data-target="#myCarousel" data-slide-to="3"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">

			<div class="item active" style="height: 100vh;">
				<img class="img-responsive" src="tpl/Media/wall3.jpg" alt="Image" style="width: 100%; height: 100%">
				<div class="carousel-caption">
					<h2>Easiest way to post twitts! </h2>
				</div>      
			</div>

			<div class="item" style="height: 100vh;">
				<img class="img-responsive" src="tpl/Media/sports.jpg" alt="Image" style="width: 100%; height: 100%">
				<div class="carousel-caption">
					<h2> Explore events around you! </h2>
				</div>      
			</div>

			<div class="item" style="height: 100vh;">
				<img class="img-responsive" src="tpl/Media/wall4.png" alt="Image" style="width: 100%; height: 100%">
				<div class="carousel-caption">
					<h2> Post commercials for your organization! </h2>
				</div>      
			</div>

			<div class="item" style="height: 100vh;">
				<img class="img-responsive" src="tpl/Media/social1.jpg" alt="Image" style="width: 100%; height: 100%">
				<div class="carousel-caption">
					<h2> Find your friends and see their twitts! </h2>
				</div>      
			</div>

		</div>

		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

	<!--<div class="container-fluid full-page" align="center" id="about">

		<!-- <div class="row">
			<div class="col-sm-4">asdasdasd</div>
			<div class="col-sm-8">asdasdasd</div>
		</div> 
		
		<div class="div-center spacing">
			<h1 class="twitter-blue"><strong>Why to use EasyTweet</strong></h1>
			<h3>This solution will help you to get twitts you want, tell us your interests and we'll make selection of twitts for you.</h3>
		</div>

		<div class="row spacing">
			<div class="col-sm-4">
				<i class="fab fa-twitter fa-2x twitter-blue"></i>
				<h3><strong>Browse twitts with easy</strong></h3>
				<h3>This solution will help you to get twitts you want, tell us your interests and we'll make selection of twitts for you.</h3>
			</div>

			<div class="col-sm-4">
				<i class="fas fa-map-marker-alt fa-2x twitter-blue"></i>
				<h3><strong>Browse twitts with easy</strong></h3>
				<h3>This solution will help you to get twitts you want, tell us your interests and we'll make selection of twitts for you.</h3>
			</div>

			<div class="col-sm-4">
				<i class="fas fa-pencil-alt fa-2x twitter-blue"></i>
				<h3><strong>Browse twitts with easy</strong></h3>
				<h3>This solution will help you to get twitts you want, tell us your interests and we'll make selection of twitts for you.</h3>
			</div>
		</div>

		<div class="div-center spacing" style="margin-bottom: 20px;">
			<button class="btn btn-default btn-block rounded-button twitter-blue">Get started!</button>
		</div>
	</div>
-->
<div class="container-fluid ext-box">
<div class="div-center spacing">
			<h1 class="twitter-blue"><strong>Check this out!</strong></h1>
		</div>
		<div class="row spacing">

                    <?php if (!empty($_smarty_tpl->tpl_vars['commercials']->value)){?>
                    <?php  $_smarty_tpl->tpl_vars['comm'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comm']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['commercials']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comm']->key => $_smarty_tpl->tpl_vars['comm']->value){
$_smarty_tpl->tpl_vars['comm']->_loop = true;
?>
                    <?php if (Commercial::checkCommercialDate($_smarty_tpl->tpl_vars['comm']->value)==1){?>
			<div class="col-sm-3">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['comm']->value->filePath;?>
" alt="Commercial" style="width: 350px; height: 350px;" class="img-rounded img-responsive">
				<h3 class="twitter-blue"><strong><?php echo $_smarty_tpl->tpl_vars['comm']->value->text;?>
</strong></h3>
				<p><?php echo CommercialDB::ReturnLocation($_smarty_tpl->tpl_vars['comm']->value)->town;?>
,<?php echo CommercialDB::ReturnLocation($_smarty_tpl->tpl_vars['comm']->value)->state;?>
</p>
			</div>
                    <?php }?>
                    <?php } ?>
                    <?php }?>
			

		</div>

	</div>
	<div class="container-fluid full-page ext-box" style="background-image: url(tpl/Media/wall1.png)">
		<div class="jumbotron int-box" style="background: none;">
			<h1><i class="fas fa-quote-left fa-3x fa-pull-left"></i>Expect the unexpected.
				And whenever possible,
				be the unexpected.</h1>
				<p class="blockquote-footer">Jack Dorsey, CEO of Twitter</p>
			</div>
		</div>


		<div class="container-fluid full-page" align="center" id="aboutus">

		<div class="div-center spacing">
			<h1 class="twitter-blue"><strong>Who are we?</strong></h1>
			<h3>Team HypeR</h3>
		</div>

		<div class="row spacing">

			<div class="col-sm-3">
				<img src="tpl/Media/aleksandar1.jpg" alt="Boss" style="width: 300px; height: 300px;" class="img-rounded img-responsive">
				<h3 class="twitter-blue"><strong>Aleksandar Radosavljević</strong></h3>
				<p>Team Leader & Web designer</p>
				<a href="#" class="btn btn-default btn-block rounded-button twitter-blue"><i class="fab fa-linkedin-in"></i> Go to profile!</a>
			</div>

			<div class="col-sm-3">
				<img src="tpl/Media/andjela1.jpg" alt="Boss" style="width: 300px; height: 300px;" class="img-rounded img-responsive">
				<h3 class="twitter-blue"><strong>Anđela Ranđelović</strong></h3>
				<p>Back-end developer</p>
				<a href="#" class="btn btn-default btn-block rounded-button twitter-blue"><i class="fab fa-linkedin-in"></i> Go to profile!</a>
			</div>

			<div class="col-sm-3">
				<img src="tpl/Media/luka1.jpg" alt="Boss" style="width: 300px; height: 300px;" class="img-rounded img-responsive">
				<h3 class="twitter-blue"><strong>Luka Ranđelović</strong></h3>
				<p>Back-end developer</p>
				<a href="#" class="btn btn-default btn-block rounded-button twitter-blue"><i class="fab fa-linkedin-in"></i> Go to profile!</a>
			</div>

			<div class="col-sm-3">
				<img src="tpl/Media/nikola1.jpg" alt="Boss" style="width: 300px; height: 300px;" class="img-rounded img-responsive">
				<h3 class="twitter-blue"><strong>Nikola Popović</strong></h3>
				<p>Front-end developer</p>
				<a href="#" class="btn btn-default btn-block rounded-button twitter-blue"><i class="fab fa-linkedin-in"></i> Go to profile!</a>
			</div>

		</div>

	</div>


	<!--<div class="container-fluid full-page ext-box" align="center" style="background-image: url(tpl/Media/wall1.png)">

		<div class="jumbotron int-box" style="background: none;">
			<h1>Support this project donating fonds</h1>
			<hr style="border-color: grey;" width="70%">

				<div class="row spacing">

					<div class="col-sm-3">
						<a href="#" class="btn btn-default btn-block twitter-blue btn-circle"><i class="fab fa-linkedin-in"></i></a>
					</div>

					<div class="col-sm-3">
						<a href="#" class="btn btn-default btn-block twitter-blue" style="border-radius: 50%;"><i class="fab fa-linkedin-in"></i></a>
					</div>

					<div class="col-sm-3">
						<a href="#" class="btn btn-default btn-block twitter-blue" style="border-radius: 50%;"><i class="fab fa-linkedin-in"></i></a>
					</div>

					<div class="col-sm-3">
						<a href="#" class="btn btn-default btn-block twitter-blue" style="border-radius: 50%;"><i class="fab fa-linkedin-in"></i></a>
					</div>

				</div>

			</div>
		</div>-->
        
                <?php if ($_smarty_tpl->tpl_vars['show']->value){?>
		<div class="container-fluid full-page" align="center" id="login">
			<div class="row spacing">

				<div class="col-sm-4">
					<img src="tpl/Media/signup.png" alt="Boss" style="width:80%;" class="img-responsive">
					<h1><strong>Who are you?</strong></h1>
				</div>


				<div class="col-sm-4">
					<div class="form-row">

                                            <form action="actionLog" method="POST">
						<label class="item-spacing" for="Username">Username</label>
						<input type="text" name="Username" class="form-control" placeholder="e.g. something@something.com / username" required>

						<label class="item-spacing" for="Password">Password</label>
						<input type="password" name="Password" class="form-control" placeholder="******" required>

						<div class="text-right item-spacing">
							<a href="#">Forgot password?</a>
						</div>

                                                <button type="submit" name="btnLogin" class="btn btn-primary btn-lg btn-block item-spacing">Login!</button>
                                            </form>

					</div>
				</div>


				<div class="col-sm-4" style="border-left: 1px solid lightgrey">
					<h1><strong>Don't have an account?</strong></h1>

                                        <form action="actionLog.php" method="POST">

					<div class="form-row">
							<div class="col-md-6 mb-3">

								<label class="item-spacing" for="first-name">First name</label>
								<input type="text" name="name" class="form-control" placeholder="e.g. John" required>
								
							</div>
							<div class="col-md-6 mb-3">

								<label class="item-spacing" for="last-name">Last name</label>
								<input type="text" name="surname" class="form-control"placeholder="e.g. Smith"required>
								
							</div>
						</div>


					<div class="form-row">

						<div class="col-md-12 mb-3">
							<label class="item-spacing" for="last-name">Username</label>
							<input type="text" class="form-control" name="username" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required>

						</div>

						<div class="col-md-12 mb-3">
							<label class="item-spacing" for="last-name">Password</label>
							<input type="password" class="form-control" name="password" id="validationCustomUsername" placeholder="Password" aria-describedby="inputGroupPrepend" required>

						</div>

						<div class="col-md-12 mb-3">
							<label class="item-spacing" for="last-name">Email</label>
							<input type="text" class="form-control" name="email" id="validationCustomUsername" placeholder="Email" aria-describedby="inputGroupPrepend" required>
						</div>
					</div>

					<div class="form-row">
                                           
						<div class="col-md-6 mb-3" style="margin-top: 10px;">
							<label for="validationCustom03">City</label>
                                                        <select name="city" class="w3-select w3-border">
                                                            <?php  $_smarty_tpl->tpl_vars['location'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['location']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['locations']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['location']->key => $_smarty_tpl->tpl_vars['location']->value){
$_smarty_tpl->tpl_vars['location']->_loop = true;
?>
                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['location']->value->town;?>
"><?php echo $_smarty_tpl->tpl_vars['location']->value->town;?>
</option>
                                                            <?php } ?>
                                                        </select>
						</div>
						<div class="col-md-6 mb-3" style="margin-top: 10px;">
							<label for="validationCustom04">State</label>
							<select name="state" class="w3-select w3-border">
                                                            <?php  $_smarty_tpl->tpl_vars['location'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['location']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['locations']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['location']->key => $_smarty_tpl->tpl_vars['location']->value){
$_smarty_tpl->tpl_vars['location']->_loop = true;
?>
                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['location']->value->state;?>
"><?php echo $_smarty_tpl->tpl_vars['location']->value->state;?>
</option>
                                                            <?php } ?>
                                                        </select>
						</div>
                                         
						
					</div>
                                            <br>

					<!--<div class="form-row">
						
						<div class="col-md-4 mb-3" style="margin-top: 10px;">
							<label for="validationCustom04">Day</label>
							<input type="number" class="form-control" name="day" id="validationCustom04" placeholder="e.g. 10" min="1" max="31" required>
						</div>
						<div class="col-md-4 mb-3" style="margin-top: 10px;">
							<label for="inlineFormCustomSelectPref">Month</label>
							<select class="form-control" name="month" id="inlineFormCustomSelectPref">
									<option selected>Choose...</option>
									<option value="1">January</option>
									<option value="2">February</option>
									<option value="3">March</option>
									<option value="4">April</option>
									<option value="5">May</option>
									<option value="6">June</option>
									<option value="7">July</option>
									<option value="8">August</option>
									<option value="9">September</option>
									<option value="10">October</option>
									<option value="11">November</option>
									<option value="12">December</option>
							</select>
						</div>

						<div class="col-md-4 mb-3" style="margin-top: 10px;">
								<label for="validationCustom03">Year</label>
								<input type="number" class="form-control" name="year" id="validationCustom03" placeholder="e.g. 1980" min="1900" max="2019" required>
							</div>
					</div>-->
					<div class="form-group">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
							<label class="form-check-label" for="invalidCheck" style="margin-top: 10px;">
								Agree to terms and conditions
							</label>
							<div class="invalid-feedback">
								You must agree before submitting.
							</div>
						</div>
					</div>
                                            <button type="submit" name="btnRegister" class="btn btn-primary btn-lg btn-block">Sign up!</button>
                                        </form>
				</div>
			</div>
		</div>
                
                <?php }?>
                
               

		<!-- <div class="container-fluid full-page img-bg-1" align="center">

			<div class="div-center spacing">
				<h1><strong>Contact</strong></h1>
				<h3>This is how you can communicata with us.</h3>
			</div>

			<div class="row spacing">
				<div class="col-sm-5" align="left">
					<h3>Contact us for more informations.</h3>
					<h3><span class="glyphicon glyphicon-map-marker black" style="color: black"></span> Niš, Serbia</h3>
					<h3><span class="glyphicon glyphicon-time black"></span> 08:00-16:00</h3>
					<h3><span class="glyphicon glyphicon-phone black"></span> +381 1515151515</h3>
					<h3><span class="glyphicon glyphicon-envelope black"></span> infoR@hypeR.com</h3>
				</div>

				<div class="col-sm-7">
					<div class="row">
						<div class="col-sm-6 form-group">
							<label class="item-spacing" for="name">Name</label>
							<input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
						</div>
						<div class="col-sm-6 form-group">
							<label class="item-spacing" for="email">Email</label>
							<input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
						</div>
					</div>
					<textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
					<div class="row">
						<div class="col-sm-12 form-group">
							<button class="btn btn-primary btn-lg btn-block"><i class="far fa-paper-plane"></i> Send!</button>
						</div>
					</div>
				</div>
			</div>

			<div class="row spacing" id="map" style="height: 400px;">
			</div>
			Map
			<script async defer
			src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6nXbzfBUtjzzkdR34tVTIUWORezTTkJ8&callback=initMap">
		</script>

	</div> -->


	<a id="back-to-top" href="#" class="btn btn-default btn-lg back-to-top twitter-blue" title="Click to return on the top page" data-toggle="tooltip"><span class="glyphicon glyphicon-chevron-up"></span></a>


</body>
</html><?php }} ?>