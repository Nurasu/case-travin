<!-- connect to localhost -->
<?php 
    $conn   = mysqli_connect("localhost", "root", "", "java_db");
    if(mysqli_errno($conn)){
        echo "tidak dapat connect ke database";
    }
?>