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
            </form>
        </section>
        <div class="mt"></div>
        <table border="1">
            <thead>
            <?php
                    $no         = 1;
                    $orderBy    = !empty($_GET['orderby']) ? $_GET['orderby'] : "nama";
                    $order      = !empty($_GET['order']) ? $_GET['order'] : "asc";

                    $result        = mysqli_query($conn, "SELECT * FROM user ORDER BY " . $orderBy . " " . $order);

                    $namaOrder  = "asc";
                    $codeOrder  = "asc";

                    if($orderBy == "nama" && $order == "asc"){
                        $namaOrder  = "desc";
                    }
                    if($orderBy == "email" && $order == "asc"){
                        $codeOrder = "desc";
                    }
            ?>
                <tr>
                    <th>No.</th>
                    <th><a href="?orderby=nama&order=<?php echo $namaOrder; ?>">Nama</a></th>
                    <th><a href="?orderby=email&order=<?php echo $codeOrder; ?>">Code</a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($d = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['nama']; ?></td>
                    <td><?= $d['email']; ?></td>
                </tr>
                <?php } ?>
            </tbody>


        </table>
    </div>
</body>
</html>