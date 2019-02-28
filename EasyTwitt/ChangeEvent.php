<?php
include_once 'User.php';
include_once 'UserDB.php';
include_once 'Event.php';
include_once 'EventDB.php';
include_once 'LocationDB.php';
include_once 'MySmarty.php';
session_start();

$user=$_SESSION["activeUser"];

$event=null;

if(isset($_GET["id"]))
{
    $event= EventDB::ReadEventByInternalId($_GET["id"]);  
}
else
    if(isset ($_POST["id"]))
    {
        $event= EventDB::ReadEventByInternalId($_POST["id"]);  
    }

$smarty= new MySmarty();


$locations= LocationDB::returnAllPlaces();


$dateval=date("Y-m-d", mktime(0, 0, 0, $event->month, $event->day, $event->year ));


if(isset($_POST["btnSaveChangedEvent"]))
{

	$id=$_POST["id"];
    $name=$_POST["txtName"];
    $info=$_POST["txtInfo"];
    $hour=$_POST["selHour"];
    $minute=$_POST["selMinute"];
	$noGuests=$_POST["noGuests"];
	
	$loc= LocationDB::read($_POST["selLok"]);
        
     $date=$_POST["eventDate"];
     $arr= explode("-", $date);
     $y=$arr[0];
     $m=$arr[1];
     $d=$arr[2];
     $e=new Event($name,$hour,$minute,$d, $m, $y, $info, $noGuests);
    $e->location=$loc;
        EventDB::UpdateAnEvent($id ,$e);
      
       
          header("location:eventAction.php?event=".$id);
          exit();

}
include_once 'headerLogged.php';
$smarty->assign("event", $event);
$smarty->assign("locations", $locations);
$smarty->assign("dateVal", $dateval);


$smarty->display("ChangeEvent.tpl");
include_once 'footer.php';