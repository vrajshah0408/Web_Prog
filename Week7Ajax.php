<?php
define( 'DB_NAME', 'vshah24');
define( 'DB_USER', 'vshah24' );
define( 'DB_PASSWORD', 'vshah24');
define( 'DB_HOST', 'localhost' );
 
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
 
function delName($id) {
    global $conn;
     
    $del = "DELETE FROM Week5 WHERE id = '$id' ";
    $result = $conn->query($del);
}
 

function insertFirst($firstname, $lastname, $telephone) {
    global $conn;
     
    $insert = "INSERT INTO Week5 SET firstname = '$firstname', lastname  = '$lastname', telephone = '$telephone' ";
    $result = $conn->query($insert);
     
}
 
 
function Showuser() {
    global $conn;
     
    $sql = "SELECT id, firstname, lastname, telephone FROM Week5";
    $result = mysqli_query($conn, $sql);
 
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        $id = $row["id"];
        $delurl = "[<a href='' onclick=return(delName('$id'))>delete</a>]";
    echo "id: " . $row["id"]. " - Firstname: " . $row["firstname"]. " Lastname: " . $row["lastname"]. " Telephone: " . $row["telephone"] . "$delurl<br>";
      }
    } else {
      echo "0 results";
    }
 
}
 
$cmd = $_GET['cmd'];
 
if($cmd == 'create'){
  if($_GET['first'] && $_GET['last'] && $_GET['tele']){
  insertFirst($_GET['first'],  $_GET['last'], $_GET['tele']);
  }
}elseif($_GET['cmd'] == 'delete'){
  $id = $_GET['id'];
  delName($id);
}

 
Showuser();
 
mysqli_close($conn);
 
?>