<!DOCTYPE html>
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
                        [[if !$admin]]
                        <a href="actionProfile.php?user=[[$twitt->user->username]]">
                            <img src="tpl/Media/avatar.png" alt="Boss" style="height:300px; width:80%;" class="img-rounded">
                        </a>
                        [[else]]
                         <img src="tpl/Media/avatar.png" alt="Boss" style="height:300px; width:80%;" class="img-rounded">
                        [[/if]]
                        <h3><strong>[[$twitt->user->name]] [[$twitt->user->surname]]</strong></h3>
                        <h4>@[[$twitt->user->username]]</h4>
                        <h3><strong>[[$twitt->user->location->town]], [[$twitt->user->location->state]]</strong></h3>
                        
                    </div>
                    <!--
                    <div class="well">
                        <div style="width: 100%; border-bottom: 1px solid #006dcc;"><a href="Friends.php?user=[[$user->username]]" class="btn btn" style="width: 100%; color: black;"><h3>Friends</h3></a></div>
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
    [[if !$admin]]
    <a class="tweetEntry-account-group" href="actionProfile.php?user=[[$twitt->user->username]]">
     [[/if]]
      <img class="tweetEntry-avatar" src="http://placekitten.com/200/200">
      
      <strong class="tweetEntry-fullname">
      [[$twitt->user->name]] [[$twitt->user->surname]]
      </strong>
      
      <span class="tweetEntry-username">
        @<b>[[$twitt->user->username]]</b>
      </span>
      
      <span class="tweetEntry-timestamp">[[$twitt->day]]/[[$twitt->month]]/[[$twitt->year]]</span>
      
    </a>
    
    <div class="tweetEntry-text-container">
     [[$twitt->text]]
    </div>
    
  </div>
   [[if !(empty($twitt->photos))]]
                              
</div>               
  <div class="optionalMedia">
     <img src="[[$twitt->photos[0]->path]]" class="optionalMedia-img">
  </div>
 [[/if]]
  
  <div class="tweetEntry-action-list" style="line-height:24px;color: #b1bbc3;">
      <table>
          <tr>
              <td>
                  [[if !$admin]]
      <form action="ShowTwitt" method="get">
          
                            [[if TwittDB::DidUserLikedTwitt($userr,$twitt)]]
                             <button name="btnLike" class="btn" disabled ><i class="fa fa-heart"></i></button>
                            [[else]]
                            <button name="btnLike" class="btn"><i class="fa fa-heart"></i></button>
                            <input type="hidden" name="id" value=[[$twitt->id]]>
                            [[/if]]
                             </form>
       [[/if]]
       
              </td>
              <td>
                  [[$twitt->likesNO]]
              </td>
              <td>
                  [[if !$admin]]
      <form action="ShowTwitt.php?id=[[$twitt->id]]" method="post">
           [[if $me]]
           <button name="btnDelete" class="btn"><i class="fa fa-remove"></i>Delete Twitt</button>
           [[else]]
           <button name="btnReport" class="btn"><i class="fa fa-plus"></i>Report Twitt</button>
           [[/if]]
      </form>
                  [[else]]
                  <form action="Admin.php" method="post">
                      <input type="hidden" name="hdnIdTwitt" value="[[$twitt->id]]">
           <button name="btnDelete" class="btn"><i class="fa fa-remove"></i>Delete Twitt</button>
                  </form>
                  [[/if]]
              </td>
              </tr>
      </table>
      [[if !$admin]]
      <form action="ShowTwitt.php" action="GET">
          <div class="form-group">
                            <label for="usr"><h3><strong>Write a comment</strong></h3></label>
                            <input type="text" class="form-control" id="usr" name="txtComment" placeholder="Write your comment here...">
       <button class="btn"  name="btnComment"> <i class="fa fa-reply" ></i></button>
       <input type="hidden" name="id" value=[[$twitt->id]]>
          </div>
      </form>
      [[/if]]
      
  </div>
      [[if !(empty($twitt->comments))]]
      [[foreach $twitt->comments as $comm]]
 <div class="tweetEntry-content">
       [[$u=CommentDB::ReadCommentsUser($comm)]]
      <strong class="tweetEntry-fullname">
      [[$u->name]] [[$u->surname]]
      </strong>
      
      <span class="tweetEntry-username">
       @<b>[[$u->username]]</b>
      </span>
     <br>
      <span class="tweetEntry-timestamp">[[$comm->day]]/[[$comm->month]]/[[$comm->year]]  [[$comm->hour]]:[[$comm->minute]]:[[$comm->second]]</span>
      
   [[$comm->text]]
       </div>
      [[/foreach]]
      
      [[/if]]

  </div>
  
</div>
  

               </div>
                </div>
            </div>

</body> 
</html>