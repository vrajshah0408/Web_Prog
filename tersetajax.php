<?php
define('DB_NAME', 'skatabattula1'); 
define('DB_USER', 'skatabattula1'); 
define('DB_PASSWORD', 'skatabattula1'); 
define('DB_HOST', 'localhost'); 

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}

function DeletePerson($id){
    global $conn; 
    $del = "DELETE FROM people WHERE id = '$id' ";

    $result = $conn->query($del);
}

function InsertPerson($fname, $lname, $phone){
    global $conn; 

    $insert = "INSERT INTO people SET firstname = '$fname', lastname = '$lname', telephone = '$phone'"; 

    $result = $conn->query($insert); 
}

function ShowPeople(){
    global $conn;
    $sql = "SELECT id, firstname, lastname , telephone FROM people";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
                $id = $row["id"];
                $delurl = "[<a href='' onclick=return(deletePeople('$id'))>delete</a>]";
            echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. " | Telephone: " . $row["telephone"]. "$delurl <br>";
          }
    } else {
          echo "0 results";
    }
} 

$cmd = $_GET['cmd']; 

if ($cmd == 'create') {
    if($_GET['firstn'] && $_GET['lastn'] && $_GET['phone']){
    InsertPerson($_GET['firstn'], $_GET['lastn'], $_GET['phone']);
    }
} else if($_GET['cmd'] == 'delete') {
    $id = $_GET['id'];
    DeletePerson($id);
}


ShowPeople();

mysqli_close($conn);

?>