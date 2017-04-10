<?php 
require_once("config.php");
require_once("class/Film.php");

include("inc/header.php");

session_start();
if(!isset($_SESSION['customer'])){
	header("Location: index.php");
}else{
	$customer = unserialize($_SESSION['customer']);
}

?>

<div class="row">
	<div class="col s12">
		<ul class="tabs">
			<li class="tab col s3"><a href="#Home">Home</a></li>
			<li class="tab col s3"><a href="#AllFilms">Movie List</a></li>
			<li class="tab col s3"><a href="#test3">Disabled Tab</a></li>
			<li class="tab col s3"><a class="active" href="#Profile">Profile</a></li>
		</ul>
	</div>
	<div id="Home" class="col s12">Test 1</div>
	<div id="AllFilms" class="col s12">
		<ul class="collection">
			<?php 
			$film = new Film();
			$film = $film->readAll("title");

			foreach ($film as $f) { ?>
			<li class="collection-item avatar">
				<img src="imgs/1.jpg" alt="" class="circle">
				<span class="title"><?php echo  $f->title; ?></span>
				<p><?php echo  $f->description; ?><br>
					Rating: <?php echo  $f->rating; ?>
					<br>Length: <?php echo  $f->length ?><br>
					Release Year: <?php echo  $f->release_year; ?><br>
					Special Features: <?php echo  $f->special_features; ?>
				</p>
				<a href="filminfo.php?id=<?php echo  $f->film_id; ?>" class="btn tooltipped secondary-content" data-position="bottom" data-delay="50" data-tooltip="Detalhes de <?php echo  $f->title; ?>">Detalhes</a>
			</li>
			<?php } ?>
		</ul>

	</div>
	<div id="test3" class="col s12">Test 3</div>
	<div id="Profile" class="col s12">
		<form action="altercustomer.php" method="POST">
			<div class="row">
				<div class="col s8 offset-s2">
					<div class="card">
						<div class="card-image">
							<img src="imgs/1.jpg">
							<span class="card-title"><?php echo($customer->first_name.' '.$customer->last_name) ?></span>
						</div>
						<div class="card-content">
							<p>First Name: <input type="text" name="first_name" value="<?php echo $customer->first_name ;?>"></p>
							<p>Last Name: <input type="text" name="last_name" value="<?php echo $customer->last_name ;?>">
							</p>
							<p>Email: <input type="text" name="Email" value="<?php echo $customer->email ;?>"></p>
							<p>Active: <?php echo $customer->active ;?></p>
							<p>Creation Date: <input type="date" name="create_date" value="<?php echo $customer->create_date ;?>"></p>
							<p>Last Update: 
								<input type="datetime" name="last_update" value="<?php echo $customer->last_update ;?>"></p>
								<p>Old Password: <input type="Password" name="old_password"></p>
								<p>New Password: <input type="Password" name="new_password"></p>
								<p>Confirm Password: <input type="Password" name="confirm_password"></p>
							</div>
						</div>
						<div class="col offset-s10">
							<input type="submit" name="submit" class="btn">
						</div>
					</div>
				</div>
			</form>
		</div>

		<?php 

		include("inc/footer.php");

		?>