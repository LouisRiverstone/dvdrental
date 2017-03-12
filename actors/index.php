<?php
require_once("../config.php");
require_once("../class/Actors.php");

//include(HEADER_TEMPLATE);

$actors = new Actors();

foreach($actors->readAll() as $key => $actor):

    echo $actor->actor_id.'</br>';
    echo $actor->last_name.'</br>';
    echo $actor->first_name.'</br><hr>';

endforeach;


?>

<?php
//include(FOOTER_TEMPLATE);
?>
