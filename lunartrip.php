<?php
//	marstrip.php
/*
namespace src;

use martianDb;
use spaceTravel;
use marsTicket;

*/
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
						<select name="duration" class="col-lg-4">
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
	$dur = $ticket->durationStay($_POST['duration']);

?>

<?php
	echo '<div class="row">

	<p class="col-sm-12">
	You have chosen to spend <b>' . $dur . '</b> days on the Moon.
	</p>
	</div>';

		if(isset($_POST['seatingClass'])) {
			$s = $ticket->seatingClass($_POST['seatingClass']);
			
			echo '<div class="row">

	<p class="col-sm-12">' . $s . '</p>
	</div>';
			

		}




	$arrival = $ticket->roundTrip();

	echo '<div class="row">

	<p class="col-sm-12"> Estimated total round trip space time is <b>' . $arrival . '</b> days.</p>
	</div>';


}


?>



</div>


</body>

</html>


<!-- 
<p>Select a departure date: <input type="text" name="" ></p>

<p>Select a departure date: <input type="text" name="" ></p>

 -->

<!-- 
they input a date
and a mars stay of 2 - 4 weeks
and classseat

than add time to get to mars plus the weeks they inputed


charset=UTF-8



<p>The reason why we don’t charge businesses for posting in our app is because we want a free flow of deals, specials and announcements for the 725,000 CTA L’ train riders.
</p>
<p>
The goal of our app is to provide a service by helping these dedicated riders find great deals within walking distance of their stops.
</p>
<p>
We feel the best way to accomplish this task is to make our app open and available to businesses that want to communicate to riders near their station.
</p>
<p>
So go ahead and post to your hearts content, we encourage it. We want our app to become the Twitter for L train riders looking for something to do or finding deals near L’ stops.
</p>
<p>
Help spread the word by letting your social media followers know that your deals, specials or announcement can be found right on our app. Together we can develop an amazing local platform for communicating with this important demographic.
</p>
<p>
We created a short link to our My L’ Train Deals web app for use on social media http://bit.ly/1C35Nry
</p>
<p>
P.S. If you haven’t received your account login information for posting on our app, please let us know we will be happy to send it to you.
</p>











 -->