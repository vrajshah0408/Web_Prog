<form method="post">
    Input To Access the Edit Page: <br> 
    Username: <input type="text" name="userName"><br>
    Password: <input type="text" name="pass"><br>
  <input type="submit" value="Login">
</form>

<?php 
define('DB_NAME', 'skatabattula1'); 
define('DB_USER', 'skatabattula1'); 
define('DB_PASSWORD', 'skatabattula1'); 
define('DB_HOST', 'localhost'); 

function check($userName, $pass){
    // Create connection
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    // Check connection
    if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT id, username, password FROM user";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
                  $loggedIn = false; 
                 if($row["username"] == $userName && $row["password"] == $pass){
                           $loggedIn = true;
               setcookie('userid', $row['username'], time() + (86400 * 30), "/");
               header("Location: week6.php");
               exit();
             }
                }
            if(!$loggedIn) {
                  print("Username or Password is incorrect");
                 setcookie('userid', '', time() - 3600, "/");
            }
    } else {
          echo "0 results";
    }
    mysqli_close($conn);
} 
?> 
<?php
if($_POST['userName'] != "" && $_POST['pass'] != "") {
    check($_POST['userName'], $_POST['pass']);
}
?>