<?php
include("config.php");
include("inc/header.php");
?>

<div class="row">
    <div class="col s12 m4 offset-m4 card">
        <ul id="tabs" class="tabs">
            <li class="tab col s6"><a href="#swipe-1">Registro</a></li>
            <li class="tab col s6"><a class="active" href="#swipe-2">Login</a></li>

        </ul>
        <div id="swipe-1" class="col s12 blue">


        </div>
        <div id="swipe-2" class="col s12">
            <form action="logar.php" method="post">
                <input type="text" name="login" id="login">
                <input type="password" name="password" id="password">
                <input type="submit" name="submit" class="col s12 btn btn-flat green" id="submit">
            </form>
        </div>
    </div>
</div>


<?php include("inc/footer.php"); ?>
