<?php
require_once 'configuration.php';
 
try {
   
    $conn = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);
} catch (Exception $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}

$tag=mysql_escape_string($_GET['tag']);
$userid=mysql_escape_string($_GET['userid']);
$sql = "INSERT INTO tags (userid,tag) VALUES ( $userid , '$tag' );";

if ($conn->query($sql) === TRUE) {
    $sql = "SELECT * FROM tags WHERE userid='$userid' AND tag='$tag';";
    $result =$conn->query($sql);
    $num_row=1;
    $tag_row = mysqli_fetch_array($result);
    $num_row = mysqli_num_rows($result);
    if( $num_row >=1 ) { 
        //$_SESSION['user_name']=$username;
        //echo "<li tagid='" . $tag_row['tagid'] . "'><span>&#10005;</span>" . $tag_row['tag'] . "</li>";
        echo $tag_row['tagid'];
    }
    else{
        echo "fail";
    } 
} else {
    echo "fail";
}
        
   
$conn->close();
?>