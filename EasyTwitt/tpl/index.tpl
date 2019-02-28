<!DOCTYPE HTML>

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
                        <h3><strong>[[$name]] [[$surname]]</strong></h3>
                        <h4>@[[$username]]</h4>
                        <h3><strong>[[$city]], [[$state]]</strong></h3>
                        <form action="ChangeProfile.php" method="GET">
                        <button class="btn btn-block btn-primary" name="btnChangeProfile"><h3>Edit profile</h3></button>
                        </form>
                    </div>
                    
                    <div class="well">
                        [[if $me]]
                         <div style="width: 100%; border-bottom: 1px solid #006dcc;"><a href="MyTwitts.php" class="btn btn" style="width: 100%; color: black;"><h3>My Twitts</h3></a></div>
                        <div style="width: 100%; border-bottom: 1px solid #006dcc;"><a href="ShowPictures.php" class="btn" style="width: 100%; color: black;"><h3>My Photos</h3></a></div>
                        <div style="width: 100%; border-bottom: 1px solid #006dcc;"><a href="EventsAction.php" class="btn" style="width: 100%; color: black;"><h3>My Events</h3></a></div>
                         <div style="width: 100%; border-bottom: 1px solid #006dcc;"><a href="CommercialsAction.php" class="btn" style="width: 100%; color: black;"><h3>My Commercials</h3></a></div>
                        <!--<div style="width: 100%;"><a href="#" class="btn" style="width: 100%; color: black;"><h3>Friends</h3></a></div>-->
                         [[/if]]
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
                        [[foreach $fof as $user]]
                        <div class="media">
                            <div class="media-left">
                              <img src="tpl/Media/avatar.png" class="media-object" style="width:60px">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">[[$user->name]] [[$user->surname]] <span><small><em>@[[$user->username]]</em></small></span>
                                    <br> <span><small>[[$user->location->town]], [[$user->location->state]]</small></span></h4>
                               
                             <button class="btn btn-primary" onclick="location.href='actionProfile.php?user=[[$user->username]]'">Show profile</button>
                            </div>
                            <hr>
                            
                            <hr>
                          </div>
                        [[/foreach]]
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
                        [[foreach $locations as $location]]
                        <option value="[[$location->id]]">[[$location->town]],[[$location->state]]</option>
                        [[/foreach]]
                    </select>
                            <button class="btn btn-primary btn-block" name="btnPost" style="margin-top: 20px">Post</button>
                             <hr>
                            </form>
                        </div>
                    </div>

                    <div class="well">
                        [[if !(empty($twitts)) ]]
                        [[for $i=0 to $num]]
                         
                        <div class="media table table-hover" >
                            <div class="media-left">
                              <img src="tpl/Media/avatar.png" class="media-object" style="width:60px" onclick="location.href='actionProfile.php?user=[[$twitts[$i]->user->username]]'">
                            </div>
                            <div class="media-body"  onclick="location.href='ShowTwitt.php?id=[[$twitts[$i]->id]]'">
                                <h4 class="media-heading">[[$twitts[$i]->user->name]] [[$twitts[$i]->user->surname]] <span><small><em>@[[$twitts[$i]->user->username]]</em></small></span> <span><small>[[$twitts[$i]->day]]/[[$twitts[$i]->month]]/[[$twitts[$i]->year]]</small></span></h4>
                             <!--<button class="btn btn-primary" onclick="location.href='actionProfile.php?user=[[$twitts[$i]->user->username]]'">Show profile</button>-->
                                <p>
                                  [[$twitts[$i]->text]]
                              </p>
                               [[if !(empty($twitts[$i]->photos))]]
                                <img src="[[$twitts[$i]->photos[0]->path]]" class="media-object" style="width:100px">
                                [[/if]]
                            </div>
                            <table>
                                <tr>
                                    <td>
                             <form action="actionLog" method="post">
                            [[if TwittDB::DidUserLikedTwitt($userr,$twitts[$i])]]
                             <button name="btnLike" class="btn" disabled ><i class="fa fa-heart"></i></button>
                            [[else]]
                            <button name="btnLike" class="btn"><i class="fa fa-heart"></i></button>
                           
                            [[/if]]
                            [[$twitts[$i]->likesNO]]
                             <input type="hidden" name="hdnTwittId" value=[[$twitts[$i]->id]]>
                             </form>
                                    </td>
                                    <td>
                            <button class="btn"  onclick="location.href='ShowTwitt.php?id=[[$twitts[$i]->id]]'"> <i class="fa fa-reply" ></i></button>
                                    </td>
                            </tr>
                            </table>
                           <!-- <button class="btn btn-primary">Retwitt</button> -->
                           <!-- <button class="btn btn-primary">Show comments</button>-->
                           
                          </div>
                         
                         <hr>
                           [[if $i<count($commercials)]]
                               [[if Commercial::checkCommercialDate($commercials[$i])==1 ]]
                        
                           
                            <div class="media-left">
                              <img src="tpl/Media/avatar.png" class="media-object" style="width:60px" >
                            </div>
                            <div class="media-body">
                                
                                <h4 class="media-heading">[[CommercialDB::CommercialsUser($commercials[$i]->id)->name]] [[CommercialDB::CommercialsUser($commercials[$i]->id)->surname]] <span><small><em>@[[CommercialDB::CommercialsUser($commercials[$i]->id)->username]]</em></small></span> 
                                    <span>Expiration Date</span>
                                    <span>[[$commercials[$i]->day]]/[[$commercials[$i]->month]]/[[$commercials[$i]->year]]</span></h4>
                             <!--<button class="btn btn-primary" onclick="location.href='actionProfile.php?user=[[$twitts[$i]->user->username]]'">Show profile</button>-->
                                <p>
                                  [[$commercials[$i]->text]]
                              </p>
                              
                                <img src="[[$commercials[$i]->filePath]]" class="media-object" style="width:100px">
                               
                            </div>
                               <form action="actionCommentCommertial.php" method="post">
                            <table>
                                <tr>
                                    
                                    <td>
                                        <input type="text" name="txtComm">
                                        <input type="hidden" name="commUser" value="[[CommercialDB::CommercialsUser($commercials[$i]->id)->username]]">
                             <input type="hidden" name="hdnCommercialId" value=[[$commercials[$i]->id]]>
                            
                                    </td>
                                    <td>
                           <button class="btn"  type="submit" name="btnSubmit"> <i class="fa fa-reply" ></i></button>
                                    </td>
                                     <td>
                            <button class="btn"  onclick="document.getElementById('[[$commercials[$i]->id]]').style.display = 'block'"> <i class="fa fa-reply" >Show Comments</i></button>
                                    </td>
                            </tr>
                            </table>
                              </form>
                             
							  <!--	MODAL ZA KOMENTARE REKLAMA -->
								<div id="[[$commercials[$i]->id]]" class="w3-modal">
								<div class="w3-modal-content">

								<header class="w3-container w3-red"> 
								<span onclick="document.getElementById('[[$commercials[$i]->id]]').style.display = 'none'" 
										class="w3-button w3-display-topright">&times;</span>
                    
								<p>Commercial</p>
								</header>

								<div class="w3-container">
								<hr>
										[[foreach redisCommercialComments::getComments($commercials[$i]->id, $commercials[$i]) as $comment]]
										
											<p>[[$comment]]</p>
										
										[[/foreach]]
										
								<br>
								<hr>
								</div>
								<footer class="w3-container w3-black">
								<span name="btnOdustani" onclick="document.getElementById('[[$commercials[$i]->id]]').style.display = 'none'" 
									class="w3-button w3-red "><i class="fa fa-remove"></i> Hide </span>
								</footer>

            </div>
        </div>
                               
                           <!-- <button class="btn btn-primary">Retwitt</button> -->
                           <!-- <button class="btn btn-primary">Show comments</button>-->
                            [[/if]]
                         [[/if]]
                        [[/for]]
                        [[/if]]
                           
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
</html>