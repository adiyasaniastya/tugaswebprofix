<?php
session_start();
require_once 'koneksi.php';

$foto = query("SELECT * FROM photo");
$profil = query("SELECT * FROM profile");


if (isset($_GET["cari"])) {
    $foto = cariCaption($_GET["cari"]);
}
$hatetepe = "http://";
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
// nampilin post sesuai dgn post asli
// $i=0;

// function poset(){
//     while($foto !="NULL") {
//         $i++;
//     }
//     return $i;
// }
// $angka =poset();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        #gbr{
            width:22px;
            height:22px;
        }
        #aplod{
            background-color: var(--fd-blue);
            color: white;
            border: 0;
            font-weight: 600;
            padding: 5px 10px;
            font-size: 14px;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile | Vietgram</title>
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
    <main id="profile">
        <header class="profile__header">
            <div class="profile__column">
                <img class="center-cropped" src="images/avatair.jpg" />
            </div>
            <div class="profile__column">
                <div class="profile__title">
                    <h3 class="profile__username"><?= $profil[0]['username']; ?></h3>
                    <a href="edit-profile.php">Edit profile</a>
                    <i class="fa fa-cog fa-lg"></i>
                </div>
                <ul class="profile__stats">
                    <li class="profile__stat">
                        <span class="stat__number">?</span> posts
                    </li>
                    <li class="profile__stat">
                        <span class="stat__number">1113</span> followers
                    </li>
                    <li class="profile__stat">
                        <span class="stat__number">1027</span> following
                    </li>
                </ul>
                <p class="profile__bio">
                    <span class="profile__full-name">
                        <?= $profil[0]['name']; ?>
                    </span>
					<br>
                    <?= $profil[0]['bio']; ?>
                    <a href="$hatetepe+<?= $profil[0]['website']; ?>"><?= $profil[0]['website']; ?></a>
                </p>
            </div>
        </header>
        <section class="profile__photos">
            <?php foreach ($foto as $row) : ?>
                <div class="profile__photo">
                    <img width="300px" height="300px" src="images/<?= $row['url']; ?>" class="center-croped" />
                    <div class="profile__photo-overlay">
                        <span class="overlay__item">
                            <i class="fa fa-heart"></i>
                            <?= $row['likes'];?>
                        </span>
                        <span class="overlay__item">
                            <i class="fa fa-comment"></i>
                            20
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
            
            
        </section>
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
