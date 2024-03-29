<?php
if (isset($_SESSION) == false)
    session_start();
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Demo</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Smooth Scroll from https://github.com/bendc/anchor-scroll -->
    <script defer src="static/scroll.min.js"></script>

    <!-- Custom -->
    <link rel="stylesheet" href="static/style.css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
            integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
            integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
            crossorigin="anonymous"></script>
</head>

<body>

<!-- input section -->
<section id="sec1" class="bg-image">
    <div id="input">
        <div class="container-fluid">
            <div class="row">
                <div class="col col-lg-2 offset-lg-1">

                </div>

                <div class="col col-lg-2">
                    <div class="card" style="width: 100%;">
                        <img class="card-img-top" src="./static/users/kyoto.jpg" alt="Card image cap">
                        <div class="card-block">
                            <h4 class="card-title">User 1</h4>
                            <p class="card-text">Kyoto</p>
                            <a href="process.php?user=1" class="btn btn-primary">Select</a>
                        </div>
                    </div>
                </div>

                <div class="col col-lg-2">
                    <div class="card" style="width: 100%;">
                        <img class="card-img-top" src="./static/users/Europe.jpg" alt="Card image cap">
                        <div class="card-block">
                            <h4 class="card-title">User 2</h4>
                            <p class="card-text">Europe</p>
                            <a href="process.php?user=2" class="btn btn-primary">Select</a>
                        </div>
                    </div>
                </div>

                <div class="col col-lg-2">
                    <div class="card" style="width: 100%;">
                        <img class="card-img-top" src="./static/users/Australia.jpg" alt="Card image cap">
                        <div class="card-block">
                            <h4 class="card-title">User 3</h4>
                            <p class="card-text">Sydney, Adelaide</p>
                            <a href="process.php?user=3" class="btn btn-primary">Select</a>
                        </div>
                    </div>
                </div>

                <div class="col col-lg-2">

                </div>
            </div>

            <div class="row">
                <hr>
            </div>

            <div class="row">
                <div class="col col-lg-2 offset-lg-1">
                    <div class="card" style="width: 93%;">
                        <img class="card-img-top" src="./static/attractions/kyoto-10_min.jpg" alt="Card image cap">
                        <div class="card-block">
                            <h4 class="card-title">Kyoto</h4>
                            <p class="card-text"></p>
                            <a href="process.php?attraction=2" class="btn btn-primary">Select</a>
                        </div>
                    </div>
                </div>

                <div class="col col-lg-2">
                    <div class="card" style="width: 95%;">
                        <img class="card-img-top"
                             src="./static/attractions/hith-eiffel-tower-iStock_000016468972Large.jpg"
                             alt="Card image cap">
                        <div class="card-block">
                            <h4 class="card-title">Paris</h4>
                            <p class="card-text"></p>
                            <a href="process.php?attraction=4" class="btn btn-primary">Select</a>
                        </div>
                    </div>
                </div>

                <div class="col col-lg-2">
                    <div class="card" style="width: 85%;">
                        <img class="card-img-top" src="./static/attractions/tokyo.jpg" alt="Card image cap">
                        <div class="card-block">
                            <h4 class="card-title">Tokyo</h4>
                            <p class="card-text"></p>
                            <a href="process.php?attraction=3" class="btn btn-primary">Select</a>
                        </div>
                    </div>
                </div>

                <div class="col col-lg-2">
                    <div class="card" style="width: 100%;">
                        <img class="card-img-top" src="./static/attractions/OPERA1216.jpg" alt="Card image cap">
                        <div class="card-block">
                            <h4 class="card-title">Sydney</h4>
                            <p class="card-text"></p>
                            <a href="process.php?attraction=5" class="btn btn-primary">Select</a>
                        </div>
                    </div>
                </div>

                <div class="col col-lg-2">
                    <div class="card" style="width: 100%;">
                        <img class="card-img-top" src="./static/attractions/Frankfurt-005-1.jpg" alt="Card image cap">
                        <div class="card-block">
                            <h4 class="card-title">Frankfurt</h4>
                            <p class="card-text"></p>
                            <a href="process.php?attraction=1" class="btn btn-primary">Select</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- result section -->
<section id="sec2" class="bg-image">

    <div id="result">
        <table class="table">
            <thead>
            <tr class="table-success">
                <th>#</th>
                <th>Name</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $cnt = 1;
            foreach ($_SESSION['result'] as $row) {
                echo "<tr class=\"table-info\"><th scope=\"row\">" . $cnt . "</th><td>" . $row . "</td></tr>";
                $cnt++;
            }
            ?>
            </tbody>
        </table>
    </div>

</section>

<div id="nav">
    <a id="a1" class=scroll href="#sec1">#Input</a>
    <a id="a2" class=scroll href="#sec2">#Result</a>
    <a href="process.php?reset=1" class="btn btn-link" role="button" aria-pressed="true">#Reset</a>
</div>

</body>

</html>