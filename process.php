<?php
/**
 * Created by PhpStorm.
 * User: henrybear327
 * Date: 12/7/17
 * Time: 9:49 PM
 */

if (isset($_SESSION) == false)
    session_start();

echo "Start processing<br>";
var_dump($_SESSION);

$url = "index.php?";
if (isset($_GET["reset"]) && $_GET['reset'] == 1) {
    echo "reset<br>";
    session_unset();
    session_destroy();
} else {
    if (isset($_GET["user"])) {
        echo "User" . $_GET['user'] . "<br>";
        if (1 <= $_GET['user'] && $_GET['user'] <= 3) {
            $_SESSION['user'] = $_GET['user'];
        } else {
            die("User Oops?");
        }
    }

    if (isset($_GET["attraction"])) {
        echo "Attraction" . $_GET['attraction'] . "<br>";
        if (1 <= $_GET['attraction'] && $_GET['attraction'] <= 5) {
            $_SESSION['attraction'] = $_GET['attraction'];
        } else {
            die("Attraction Oops?");
        }
    }

    if(isset($_SESSION['user'])) {
        $url .= "user=" . $_SESSION['user'];
    }

    if(isset($_SESSION['attraction'])) {
        $url .= "&attraction=" . $_SESSION['attraction'];
    }

    echo "url = " . $url . "<br>";
}

var_dump($_SESSION);
header('Refresh: 0; URL=' . $url);