<?php
session_start();
require_once 'koneksi.php';
$foto = query("SELECT * FROM photo");

$profil = query("SELECT * FROM profile");

if (isset($_GET["cari"])) {
    $photo = cariCaption($_GET["cari"]);
}
$hatetepe = "http://";

function cariCaption($cari)
{
    $query = "SELECT * FROM photo WHERE caption LIKE '%$cari%' ";
    return query($query);
}
$profil = query("SELECT * FROM profil");
function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] =  $row;
    }
    return $rows;
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
    <title>Explore | Vietgram</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/v4-shims.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <nav class="navigation">
        <div class="navigation__column">
            <a href="feed.php">
                <img src="images/logo.png" />
            </a>
        </div>
        <div class="navigation__column">
                <i class="fa fa-search"></i>
            <input type="text" placeholder="Search">
        </div>
        <div class="navigation__column">
            <ul class="navigations__links">
                <li class="navigation__list-item" >
                    <a href="aplod.php" class="navigation__link">
                        <i class="fas fa-arrow-circle-up"></i>
                </li>
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
    <main id="explore">
        <ul class="explore__users">
            <li class="explore__user">
                
                <div class="explore__user-column">
                    <img src="images/avatair.jpg" class="explore__avatar"/>
                    <div class="explore__info">
                        <span class="explore__username"><?= $profil["username"]; ?></span>
                        <span class="explore__full-name"><?= $profil["nama"]; ?></span>
                    </div>
                </div>
                <div class="explore__user-column">
                    <button>Follow</button>
                </div>
            </li>
            <li class="explore__user">
                    
                    <div class="explore__user-column">
                        <img src="images/avatar.jpg" class="explore__avatar"/>
                        <div class="explore__info">
                            <span class="explore__username">inthetiger</span>
                            <span class="explore__full-name">Lynn Park</span>
                        </div>
                    </div>
                    <div class="explore__user-column">
                        <button>Follow</button>
                    </div>
                </li>
                <li class="explore__user">
                        
                        <div class="explore__user-column">
                            <img src="images/avatar.jpg" class="explore__avatar"/>
                            <div class="explore__info">
                                <span class="explore__username">inthetiger</span>
                                <span class="explore__full-name">Lynn Park</span>
                            </div>
                        </div>
                        <div class="explore__user-column">
                            <button>Follow</button>
                        </div>
                    </li>
        </ul>
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