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
                        [[if $areFriends]]
                            <button class="btn btn-block btn-primary"><h3>You are friends</h3></button>
                        [[elseif $isRequestSent]]
                            <button class="btn btn-block btn-primary"><h3>Friend request sent</h3></button>
                        [[elseif $accept]]
                         <form action="actionProfile.php?user=[[$username]]" method="post"> <button class="btn btn-block btn-primary" name="btnAccept"><h3>Accept friend request</h3></button></form>
                        
                        [[else]]
                        <form action="actionProfile.php?user=[[$username]]" method="post"> <button class="btn btn-block btn-primary" name="btnAddFriend"><h3>Add as a friend</h3></button></form>
                        [[/if]]
                    </div>

                    
                        <!--<div style="width: 100%; border-bottom: 1px solid #006dcc;"><a href="Friends.php" class="btn btn" style="width: 100%; color: black;"><h3>Friends</h3></a></div>
                        <div style="width: 100%; border-bottom: 1px solid #006dcc;"><a href="ShowPictures.php" class="btn" style="width: 100%; color: black;"><h3>Photos</h3></a></div>
                        <div style="width: 100%; border-bottom: 1px solid #006dcc;"><a href="#" class="btn" style="width: 100%; color: black;"><h3>Events</h3></a></div>
                        <div style="width: 100%;"><a href="#" class="btn" style="width: 100%; color: black;"><h3>Friends</h3></a></div>-->
                  

                 <!--   <div class="well">
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
                        <h3><strong>Mutual friends</strong></h3>
                        <hr>
                        [[if $friendsCount ==0]]
                            <p><small>No mutual friends</small></p>
                            
                        [[else]]
                        [[foreach $mf as $user]]
                        <div class="media">
                            <div class="media-left">
                                <img src="tpl/Media/avatar.png" class="media-object" style="width:60px">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">[[$user->name]] [[$user->surname]] <span><small><em>@[[$user->username]]</em></small></span>
                                    <br> <span><small>[[$user->location->town]], [[$user->location->state]]</small></span></h4>

                                <button class="btn btn-primary" onclick="location.href = 'actionProfile.php?user=[[$user->username]]'">Show profile</button>
                            </div>
                            <hr>

                            <hr>
                        </div>
                        [[/foreach]]
                        [[/if]]

                    </div>

                </div>


                <div class="col-sm-9">
                    <h3><strong>User's twitts</strong></h3>
                    [[if !$areFriends]]
                    <h2><strong>Add user as friend so you can see their twitts!</strong></h2>
                    [[else]]
                    <div class="well">
                        [[for $i=0 to $num]]

                        <div class="media table table-hover"  >
                            <div class="media-left">
                                <img src="tpl/Media/avatar.png" class="media-object" style="width:60px">
                            </div>
                            <div class="media-body" onclick="location.href = 'ShowTwitt.php?id=[[$twitts[$i]->id]]'">
                                <h4 class="media-heading">[[$name]] [[$surname]] <span><small><em>@[[$username]]</em></small></span> <span><small>[[$twitts[$i]->day]]/[[$twitts[$i]->month]]/[[$twitts[$i]->year]]</small></span></h4>
                               <!-- <button class="btn btn-primary" onclick="location.href = 'ShowTwitt.php?user=[[$twitts[$i]->user->username]]'">Show profile</button>-->
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
                                        <form action="actionProfile.php?user=[[$username]]" method="post">
                                       [[if TwittDB::DidUserLikedTwitt($userr,$twitts[$i])]]
                             <button name="btnLike" class="btn" disabled ><i class="fa fa-heart"></i></button>
                            [[else]]
                            <button name="btnLike" class="btn" ><i class="fa fa-heart"></i></button>
                           <input type="hidden" name="hdnTwittId" value=[[$twitts[$i]->id]]>
                            [[/if]]
                             [[$twitts[$i]->likesNO]]
                                        </form>
                                    </td>
                                    <td>
                                        <button class="btn"  onclick="location.href = 'ShowTwitt.php?id=[[$twitts[$i]->id]]'"> <i class="fa fa-reply" ></i></button>
                                    </td>
                                </tr>
                                
                            </table>
                        </div>

                        <hr>
                        [[/for]]

                    </div>
                    [[/if]]
                </div>
            </div>
        </div> 


    </body>

</html>