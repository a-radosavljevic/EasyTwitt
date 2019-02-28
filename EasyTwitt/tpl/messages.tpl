<!DOCTYPE HTML>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>EasyTwitt</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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

        <link rel="styleheet" href="bootstrap/css/bootstrap.min.css">

    </head>

    <body>

        <div class="container-fluid full-page">
            <div class="row spacing">

                <div class="col-sm-3" style="border-right: 1px solid lightgrey;">
                    <label class="btn btn-primary btn-block">All conversations <i class="fa fa-inbox"></i></label>
                    <hr>

                    [[foreach $poruke as $user]]
                    <div class="media">

                        <div class="media-left">
                            <img src="tpl/Media/avatar.png" class="media-object" style="width:60px">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">[[$user->name]] [[$user->surname]]</h4>
                            
                            <form action="actionInbox.php" method="post">
                                <input type="hidden" name="other" value=[[$user->username]]>
                                <button class="btn btn-primary" name="btnShowChat" type="submit">Show chat</button>
                            </form>
                        </div>
                        <hr>

                        <hr>
                    </div>
                    [[/foreach]]
                </div>

                <div class="col-sm-9">


                    [[if $da]]
                    <div class="message-wrap col-lg-8">
                        <div class="msg-wrap">


                            <div class="media msg">
                                <a class="pull-left" href="#">
                                    <img class="img-responsive iamgurdeeposahan" alt="avatar" src="tpl/Media/avatar.png" style="width: 100px; height: 150px;">

                                </a>
                                <div class="media-body" >
                                    
                                    <h3 class="media-heading">[[$name]]</h3>
                                    
                                    <p>[[$display]]</p>
                                    
                                    <a href="actionProfile.php" class="w3-button w3-red" style="text-decoration: none"><i class="fa fa-user-o"></i> Show profile</a>
                                    
                                </div>

                            </div>
                            [[if porukice!=NULL]]
                            [[foreach $porukice as $msg]]
                            <hr>
                            <div class="media msg">
                                
                                [[if MessageDB::isMyMessage($msg, $u) == false]]
                                <h6 style="color: blue"><i class="fa fa-comment-o fa-2x"></i> [[$name]]</h6>
                                [[else]]
                                <h6 style="color: red"><i class="fa fa-comment-o fa-2x"></i> Me</h6>

                                [[/if]]

                                <small class="col-lg-10 w3-card w3-light-grey">[[$msg->text]]</small>

                                <div class="media-body">
                                    <small class="pull-right time"><i class="fa fa-clock-o"></i> [[$msg->day]].[[$msg->month]].[[$msg->year]]</small>
                                </div>
                            </div>
                            [[/foreach]]
                            [[/if]]


                        </div>

                        <form action="actionInbox.php" method="POST">
                            <div class="send-wrap ">

                                <hr>
                                <label>Replay</label>
                                <input class="w3-input w3-border w3-margin-bottom" name="txt" style="height:60px" placeholder="Here type your message">


                            </div>
                            <div class="btn-panel">
                                <input type="hidden" name="otherSend" value=[[$other->username]]>
                                <button name="btnSendMessage" type="submit" class="w3-button w3-red w3-right" onclick="document.getElementById('id01').style.display = 'none'">Send  <i class="fa fa-paper-plane"></i></button>
                            </div>
                        </form>

                        <br>
                        <hr>
                        <br>
                    </div>
                    [[/if]]


                </div>

            </div>

        </div>

    </body>
</html>