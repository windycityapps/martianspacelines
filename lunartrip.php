<?php
function __autoload($class_name) {
   include 'src/' . $class_name . '.php'; 
}
$title = 'Lunar Trip';
include 'martianHeader.php';
?>
<div class="header">
</div>
<form method="post" action="" >
	<div class="container-fluid">
		<div class="row">

			<p class="col-sm-12">
				<span class="col-sm-2"> Earth Country of Origin:</span>
					<span class="col-lg-10">
						<select name="country" class="col-lg-4">
			 				<option></option>
					 		<?php 
					 		foreach (martianDb::earthCountryOrigin() as $key => $value) {			 		
					 		echo "<option value={$value}>{$value}</option>";
					 		}
					 		?>
						</select>
				</span>
			</p>
		</div>
		<div class="row">
			<p class="col-sm-12">
				<span class="col-lg-2"> Weeks stay</span>
					<span class="col-lg-10">
						<select name="duration"  class="col-lg-4">
					 		<option></option>

					 		<?php 
					 		foreach (martianDb::tripStay() as $key => $value) {
					 		echo "<option value={$value}>{$value} weeks</option>";
					 		}
					 		?>
						</select>
					</span>
			</p>
		</div>
		<div class="row">

			<p class="col-sm-12">
				<span class="col-lg-2"> Seating Class</span>
					<span class="col-lg-10">
						<select name="seatingClass" class="col-lg-4">
		 					<option></option>
		<?php 
		 		foreach (martianDb::classCatagory() as $key => $value) {
		 		echo "<option value={$value}>{$value}-class</option>";
		 		}
		 		?>
						</select>
			</span>
		</p>
		</div>

		<input type="submit" name="submit">
	</div>
</form>

<div class="container-fluid">
<?php
if(isset($_POST['submit'])) {

	$ticket = new moonTicket;
	$dur 	 = $ticket->durationStay($_POST['duration']);
	$country = $ticket->earthCountry($_POST['country']);
	$arrival = $ticket->roundTrip();
	$seating = $ticket->seatingClass($_POST['seatingClass']);

	if(!empty($country)) {
		?>
		<div class="row">
		<p class="col-sm-12"> Your Earth country of origin is<b> <?= $country; ?> </b></p>
		</div>
		<?php
		} else {
		?>
		<div class="row">
		<p class="col-sm-12"> You have not selected a Earth country of origin.</p>
		</div>
		<?php
		}

	if(!empty($dur)) {
		?>
		<div class="row">
			<p class="col-sm-12"> You have chosen to spend <b> <?= $dur ?> days on the Moon</b></p>
		</div>
		<div class="row">
			<p class="col-sm-12"> Estimated total round trip space time is <b><?= $arrival ?></b> days.</p>
		</div>	
		<?php
		} else {
		?>
		<div class="row">
			<p class="col-sm-12"> You have not selected how many weeks you want to spend on the Moon.</p>
		</div>
		<?php
		}

	if(!empty($seating)) {
		?>
		<div class="row">
			<p class="col-sm-12"> You have chosen <b> <?= $seating; ?> class </b> as your travel class.</p>
		</div>
		<?php
		} else {
		?>
		<div class="row">
			<p class="col-sm-12"> You have not selected a travel class.</p>
		</div>
		<?php
		}	
	}
	?>
		</div>
	</body>
</html>
