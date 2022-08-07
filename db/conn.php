<!-- connect to localhost -->
<?php 
    $conn   = mysqli_connect("localhost", "root", "", "java_db");
    if(!$conn){
        die("ga bisa konek");
    }
?>