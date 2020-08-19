

<?php   include ('db_connect.php') ; ?>
<?php 


//$name = "Kelvin";
//$age = 26;
//$radius =25;
//$pi =3.14;

$ninjas = ['shaun', 'ryu', 'yoshi'];

/** for loop

	echo $ninjas[$i] . '<br/>';
}


foreach ($ninjas as $ninja){

	echo $ninja . '<br />';
}



While Loop example

$i = 0;

while ($i < count ($ninjas)){
	
	echo $ninjas[0][1];
	echo '<br/>';
	$i++;
}
**/
//connect to database
include('db_connect.php');

//Queries to get all pizza

$sql = 'SELECT title, Ingredients, id FROM pizzas ORDER BY created_at';
// make query and get result
$result = mysqli_query($conn, $sql);

// fetch the resulting row as an array

$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

//freeresult from memory
mysqli_free_result($result);


//Close connection
mysqli_close($conn);



?>

<!DOCTYPE html>
<html>
<?php   include ('header.php') ; ?>


<h4 class="center grey-text">Pizzas</h4>
<div class="container">
	<div class="row">

		<?php foreach($pizzas as $pizza)  {?>

			<div class="col s6 md3">
				<div class="card z-depth-0">
					<img src="pizza.jpg" class ="pizza">
					<div class="card-content center">
						<h5><?php  echo htmlspecialchars($pizza['title']) ?></h5>
						<div><?php  echo htmlspecialchars($pizza['Ingredients']) ?></div>
						
						


					</div>
					<div class="card-action right-align">
						
						<a class="brand-text"  href="more_info.php?id=<?php echo $pizza['id'] ?>">More info </a>
					</div>

				</div>

			</div>


		<?php } ?>	


	</div>


</div>


<?php   include ('footer.php') ; ?>







</html>