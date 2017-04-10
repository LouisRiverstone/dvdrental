<?php 
require_once("config.php");
require_once("class/Film.php");
require_once("class/Actor.php");
require_once("class/Film_Actor.php");

include("inc/header.php");


if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$film = new Film();
	$film = $film->read($id);
	$film_actor = new Film_Actor();
	$film_actor = $film_actor->read($film->film_id,"film_id");
	$actor = new Actor();
}else{
	header("Location: dashboard.php");
}


?>
<div class="row">
	<div class="col s8 offset-s2">
		<div class="card">
			<div class="card-image">
				<img src="imgs/1.jpg">
				<span class="card-title"><?php echo($film->title) ?></span>
			</div>
			<div class="card-content">
				<p><?php echo($film->description) ?></p>
			</div>
			<div class="card-tabs">
				<ul class="tabs tabs-fixed-width">
					<li class="tab"><a href="#actors">Actors</a></li>
					<li class="tab"><a class="active" href="#infos">Infos</a></li>
					<li class="tab"><a href="#pics">Pics</a></li>
				</ul>
			</div>
			<div class="card-content grey lighten-4">
				<div id="actors">
					<ul class="collection">
						<?php foreach ($film_actor as $fa) { ?>
						<li class="collection-item avatar">
							<img src="imgs/1.jpg" alt="" class="circle">
							<span class="title"><?php echo($actor->read($fa->actor_id)->first_name.' '.$actor->read($fa->actor_id)->last_name); ?></span>
							<p><?php echo('First Name: '.$actor->read($fa->actor_id)->first_name) ?><br>
								<?php echo('Last Name: '.$actor->read($fa->actor_id)->last_name) ?>
							</p>
							<a href="actorinfo.php?id=<?php echo($fa->actor_id);?>" class="btn tooltipped secondary-content" data-position="bottom" data-delay="50" data-tooltip="Detalhes de <?php echo($actor->read($fa->actor_id)->first_name.' '.$actor->read($fa->actor_id)->last_name) ?>">Detalhes</a>
						</li>
						<?php } ?>
					</ul>

				</div>
				<div id="infos">
					<p>Release: <?php echo($film->release_year) ?></p>
					<p>Lenght: <?php echo($film->length) ?></p>
					<p>Rating: <?php echo($film->rating) ?></p>
					<p>Language: <?php echo($film->language_id) ?></p>
					<p>Special Features: <?php echo($film->special_features) ?></p>
					
				</div>
				<div id="pics">Test 3</div>
			</div>
		</div>
	</div>
</div>


<?php 
include("inc/footer.php");
?>