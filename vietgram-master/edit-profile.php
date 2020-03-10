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
function query($query){
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
    <title>Edit Profile | Vietgram</title>
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
    <main id="edit-profile">
        <div class="edit-profile__container">
        <header class="edit-profile__header">
                <div class="edit-profile__avatar-container">
                    <img src="images/avatair.jpg" class="edit-profile__avatar" />
                </div>
                <h4 class="edit-profile__username"><?= $profil["username"]; ?></h4>
            </header>
            <form action="" class="edit-profile__form" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $profil['id']; ?>">
                <div class="form__row">
                    <label for="nama" class="form__label">Name:</label>
                    <input id="nama" name="nama" type="text" value="<?= $profil['nama']; ?>" class=" form__input" />
                </div>
                <div class="form__row">
                    <label for="username" class="form__label">Username:</label>
                    <input id="username" name="username" type="text" value="<?= $profil['username']; ?>" class="form__input" />
                </div>
                <div class="form__row">
                    <label for="website" class="form__label">Website:</label>
                    <input id="website" name="website" type="url" value="<?= $profil['website']; ?>" class=" form__input" />
                </div>
                <div class="form__row">
                    <label for="bio" class="form__label">Bio:</label>
                    <textarea name="bio" id="bio"><?= $profil['bio']; ?></textarea>
                </div>
                <div class="form__row">
                    <label for="email" class="form__label">Email:</label>
                    <input id="email" name="email" type="email" value="<?= $profil['email']; ?>" class=" form__input" />
                </div>
                <div class="form__row">
                    <label for="number_phone" class="form__label">Phone Number:</label>
                    <input id="phone" value="<?= $profil['number_phone']; ?>" name=" number_phone" type="number" class="form__input" />
                </div>
                <div class="form__row">
                    <label for="gender" class="form__label" name="gender">Gender:</label>
                    <input id="gender" value="<?= $profil['gender']; ?>" name=" gender" type="gender" class="form__input" />
                </div>
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
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