<!DOCTYPE html>
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
                            [[if !empty($twitts)]]
                            [[foreach $twitts as $twitt]]
                            <tr>
                           
                                <td><a href="ShowTwitt.php?id=[[$twitt->id]]" class="w3-bar-item w3-button w3-mobile"><i class="fas fa-ellipsis-h"></i> "[[$twitt->text]]" </a></td>
                               
                           
                            <td> <form action="Admin.php" method="POST">
                                <button class="btn" name="btnDelete" type="submit"><i class="fa fa-trash"></i></button>
                                 <input type="hidden" name="hdnIdTwitt" value="[[$twitt->id]]">
                            </form> 
                                </td>
                                
                            </tr>
                            [[/foreach]]
                            [[else]]
                            No reported twitts
                            [[/if]]
                            
                            
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
                        [[foreach $locations as $location]]
                        <option value="[[$location->id]]">[[$location->town]],[[$location->state]]</option>
                        [[/foreach]]
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
                          
                            [[foreach $frs as $fr]]
                            <tr>

                                <td><a href="" class="w3-bar-item w3-button w3-mobile"><i class="fa fa-file-o" style="color:green"></i> [[$fr->username]]</a></td>
                                <td></td>
                            </tr>
                            [[/foreach]] 
                            
                        </table>
                    </div>
                </div>-->
            </div>
        </div>


    </body>
</html>