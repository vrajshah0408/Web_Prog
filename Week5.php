<form method="get">

    Firstname: <input type="text" name="first"><br>
   
    
    Lastname: <input type="text" name="last"><br>
    
    
    Telephone: <input type="text" name="tele"><br>
    
    <input type="reset" value ="Reset">
     <input type="submit" value ="Submit">

</form>


<?php
define( 'DB_NAME', 'vshah24');
define( 'DB_USER', 'vshah24');
define( 'DB_PASSWORD', 'vshah24');
define( 'DB_HOST', 'localhost');

function delName($id){
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if(!$conn){
      die("connection failed: " . mysqli_connect_errno());
    }
    $del ="DELETE FROM Week5 WHERE id = '$id'";

    $result = $conn->query($del);

    mysqli_close($conn);
}

function insertFirst($firstname, $lastname, $telephone){
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $insert = "INSERT INTO Week5 SET firstname = '$firstname', lastname  = '$lastname', telephone = '$telephone'" ;
    
    $result = $conn->query($insert);

    mysqli_close($conn);
}


function Showuser(){
    // Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, firstname, lastname, telephone FROM Week5";
$result = mysqli_query($conn, $sql);



if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $delurl = "[<a href='https://codd.cs.gsu.edu/~vshah24/Week5.php?cmd=delete&id={$row['id']}'>delete</a>]";
    echo "id: " . $row["id"]. " - Firstname: " . $row["firstname"]. " Lastname: " . $row["lastname"]. " Telephone: " . $row["telephone"] . "$delurl<br>";
  }
} else {
  echo "0 results";
}

mysqli_close($conn);

}
?>


<?php
if($_GET['first'] != '' && $_GET['last'] != '' && $_GET['tele'] != '' ){
    insertFirst($_GET['first'],  $_GET['last'], $_GET['tele']);
}

if($_GET['cmd'] == 'delete'){
  $id = $_GET['id'];
  delName($id);
}

Showuser();
?>

