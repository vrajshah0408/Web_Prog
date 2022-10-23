<form method="post">
    Enter Login: <br> 
    Username: <input type="text" name="userName"><br>
    Password: <input type="text" name="pass"><br>
  <input type="submit" value="Login">
</form>

<?php 
define('DB_NAME', 'vshah24'); 
define('DB_USER', 'vshah24'); 
define('DB_PASSWORD', 'vshah24'); 
define('DB_HOST', 'localhost'); 

function check($userName, $pass){
    // Create connection
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    // Check connection
    if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT ID, Username, Password FROM User";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
                  $loggedIn = false; 
                 if($row["Username"] == $userName && $row["Password"] == $pass){
                           $loggedIn = true;
               setcookie('userid', $row['Username'], time() + (86400 * 30), "/");
               header("Location: Week7.php");
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