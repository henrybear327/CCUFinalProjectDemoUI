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

unset($_SESSION['result']);

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

    // DB
    echo "DB starts<br>";
    try {
        $db = new SQLite3("database.sqlite");
        echo "DB ends<br>";
        /*
         * $recommendation = DB::table("recommendations")
                ->join("attractions", "recommendations.attraction_id", "=", "attractions.id")
                ->where("attractions.city_id", "=", $request->input("city_data"))
                ->where("recommendations.user_id", "=", $request->input("user_data"))
                ->select("attractions.name")
                ->get();
         * */

        if(isset($_SESSION['user']) && isset($_SESSION['attraction'])) {
            $nameResults = array();

            $results = $db->query('SELECT a.name FROM recommendations r, attractions a where r.attraction_id=a.id and a.city_id=' . $_SESSION['attraction'] . " and r.user_id=" . $_SESSION['user']);
            while ($row = $results->fetchArray()) {
//                var_dump($row);
                array_push($nameResults, $row['name']);
//                echo "<br>";
            }
//            var_dump($nameResults);

            if(count($nameResults) > 0) {
                $_SESSION['result'] = $nameResults;

                $url .= "#sec2";
            }
        } else if(isset($_SESSION['attraction'])) {
            $results = $db->query('SELECT a.name FROM attractions a where a.city_id=' . $_SESSION['attraction']);
            while ($row = $results->fetchArray()) {
//                var_dump($row);
                array_push($nameResults, $row['name']);
//                echo "<br>";
            }
//            var_dump($nameResults);

            if(count($nameResults) > 0) {
                $_SESSION['result'] = $nameResults;
            }
        }

        $db->close();
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

    echo "DB ends<br>";
}

var_dump($_SESSION);
header('Refresh: 0; URL=' . $url);