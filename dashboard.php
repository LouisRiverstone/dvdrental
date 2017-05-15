<?php
require_once("config.php");
require_once("class/Film.php");
require_once("class/Film_Category.php");
require_once("class/Rental.php");
require_once("class/Inventory.php");
require_once("class/Category.php");

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
			<li class="tab col s4"><a class="active" href="#Home">Home</a></li>
			<li class="tab col s4"><a href="#AllFilms">Movie List</a></li>
			<li class="tab col s4"><a href="#Profile">Profile</a></li>
		</ul>
	</div>
	<div id="Home" class="col s12">
		<div class="row">
			<h2>Sugestões Por Genero</h2>
			<div class="carousel" data-indicators="true">
				<?php
				$generos = array();
				$rental = new Rental();
				$rental = $rental->read($customer->customer_id,"customer_id");
				foreach ($rental as $r) {
						//echo $r->rental_date;
					$inventory = new Inventory();
					$inventory = $inventory->read($r->inventory_id,"inventory_id");
					foreach ($inventory as $i) {
						$film = new Film();
						$film = $film->read($i->film_id,"film_id");
						foreach ($film as $f) {
							$film_category = new Film_Category();
							$film_category = $film_category->read($f->film_id,"film_id");
							foreach ($film_category as $fc) {
								array_push($generos, $fc->category_id);
							}
						}
					}
				}

				//Parte de Gerenciamento Dinamico
				$film_category = new Film_Category();
				$film = new Film();
				$category = new Category();
				$total = count($generos);
				$cont = 0;
				$nc = 0;
				$contagem = (array_count_values($generos));
				arsort($contagem);
				foreach($contagem AS $numero => $vezes) {
					$cont = round(Film::porcentagem($vezes,$total)*0.1);
					for ($i=0; $i < $cont; $i++) {
						$fc = $film_category->randomRead($numero,"category_id");
						foreach ($fc as $fcc) {
							$fm = $film->read($fcc->film_id);
							$cat = $category->read($fcc->category_id,"category_id");
							foreach ($cat as $c ) {
								
								$nc++;
								?>

								<div class="carousel-item red white-text col s4" href="#one!">
									
									<h2><?php echo $fm->title; ?></h2>
									<a href="filminfo.php?id=<?php echo  $fm->film_id; ?>" class="tooltipped secondary-content white-text" data-position="bottom" data-delay="50" data-tooltip="Detalhes de <?php echo  $fm->title; ?>">
										<p class="white-text"><?php echo $fm->description; ?></p>
										<h5>Porque assistiu: <?php echo $c->name; ?></h5>
									</a>
								</div>
								<?php
							}
						}
					}
				}
				echo $nc;
				?>






			</div>
		</div>
	</div>
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
