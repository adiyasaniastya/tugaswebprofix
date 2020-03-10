<?php
session_start();
require_once 'koneksi.php';
$foto = query("SELECT * FROM photo");
// var_dump($photo);


$profil = query("SELECT * FROM profile");
// var_dump($profile);

if (isset($_GET["cari"])) {
    $photo = cariCaption($_GET["cari"]);
}
$hatetepe = "http://";


$profil = query("SELECT * FROM profil");
function tambahfoto($data){
    global $conn;
    $caption = htmlspecialchars($data['caption']);
    $ekstensi_allowed = array('png', 'jpg', 'jpeg', 'svg');
    $gambar = $_FILES['url']['name'];
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['url']['size'];
    $file_tmp = $_FILES['url']['tmp_name'];


    if (in_array($ekstensi, $ekstensi_allowed) === true) {
        if ($ukuran < 1044070) {
            move_uploaded_file($file_tmp, 'img/' . $gambar);
            $query = "INSERT INTO photo VALUES('','$gambar','$caption')";
            mysqli_query($conn, $query);
        } else {
            echo '<script>Gede kali bah!</script>';
        }
    } else {
        echo '<script>Formatnya gacocok bosque!</script>';
    }
}
if (isset($_POST["submit"])) {
    if (!tambahfoto($_POST) > 0) {
        echo "<script>
            alert('Menambahkan Gambar Sukses!');
            document.location.href = 'profile.php';
        </script>";
    } else {
        echo "<script>
            alert('Menambahkan Gambar Gagal!');
            document.location.href = 'profile.php';
        </script>";
    }
}
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] =  $row;
    }
    return $rows;
}
function cariCaption($cari)
{
    $query = "SELECT * FROM photo WHERE caption LIKE '%$cari%' ";
    return query($query);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        #gbr{
            width:22px;
            height:22px;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Feed | Vietgram</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/v4-shims.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <nav class="navigation">
        <div class="navigation__column">
            <a href="feed.php">
                <!-- Master branch comment -->
                <img src="images/logo.png" />
            </a>
        </div>
        <div class="navigation__column">
            <i class="fa fa-search"></i>
            <input type="text" placeholder="Search">
        </div>
        <div class="navigation__column">
            <ul class="navigations__links">
                <li class="navigation__list-item">
                    <a href="feed.php" class="navigation__link">
                        <img id="gbr"src="images/home.png"/>
                </li>
                <li class="navigation__list-item">
                    <a href="explore.php" class="navigation__link">
                        <i class="fa fa-compass fa-lg"></i>
                    </a>
                </li>
                <li class="navigation__list-item">
                    <a href="#" class="navigation__link">
                        <i class="fa fa-heart-o fa-lg"></i>
                    </a>
                </li>
                <li class="navigation__list-item">
                    <a href="profile.php" class="navigation__link">
                        <i class="fa fa-user-o fa-lg"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <main>
    <form action="" method="post" enctype="multipart/form-data" class="edit-profile__form">
                <div class="form__row">
                    <label for="gambar" class="form__label">Gambar anda:</label>
                    <input type="file" class="form_input" name="gambar" id="gambar">
                </div>
                <div class="form__row">
                    <label for="caption" class="form__label">Caption anda :</label>
                    <textarea id="caption" name="Caption"></textarea>
                </div>
                <div class="container" align="center">
                    
					<button type="submit" name="submit" class="btn btn-primary">Upload!</button>
                </div>

            </form>
    </main>
    <footer class="footer">
        <div class="footer__column">
            <nav class="footer__nav">
                <ul class="footer__list">
                    <li class="footer__list-item"><a href="#" class="footer__link">About Us</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Support</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Blog</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Press</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Api</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Jobs</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Privacy</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Terms</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Directory</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Language</a></li>
                </ul>
            </nav>
        </div>
        <div class="footer__column">
            <span class="footer__copyright">© 2020 Tugas Vietgram</span>
        </div>
    </footer>
</body>

</html>