<!DOCTYPE html>
<html lang="en">
<?php
    include 'db/conn.php';
    include 'template/header.php';

?>
<title><?= $title; ?></title>
<body>
    <!-- navigasi -->
    <div class="container">
        <h1>Case - Travin App</h1>
        <!-- search -->
        <section>
            <form action="search.php" method="get">
                <p>pencarian &nbsp; :</p>
                <input type="text" name="cari" id="" value="<?php if(isset($_GET['cari'])) {echo $_GET['cari'];} ?>" />
                <button type="submit" class="submit-search">search</button>
                <a href="index.php" type="submit" class="submit-search">back</a>
            </form>
        </section>
        <div class="mt"></div>
        <table border="1">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no         = 1;
                    if(isset($_GET['cari'])){
                        $kata   = $_GET['cari'];
                        $query  = "SELECT * FROM user WHERE nama like '%".$kata."%' OR email like '%".$kata."'";
                    }
                    // elseif($_GET['cari'] === ""){
                    //     echo '<script type ="text/JavaScript"> alert("JavaScript Alert Box by PHP") </script>';
                    // }
                    else{
                        $query = "SELECT * FROM user ORDER BY ASC";
                    }
                    
                    $result     = mysqli_query($conn, $query);
                    if(!$result){
                        die("Err query:". mysqli_errno($conn)."-".mysqli_error($conn));
                    }
                    while($a    = mysqli_fetch_assoc($result)){

                        ?>
                    
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $a['nama']; ?></td>
                    <td><?= $a['email']; ?></td>
                </tr>
                <?php } ?>
            </tbody>


        </table>
    </div>
</body>
</html>