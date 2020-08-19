
<?php
include('db_connect.php');

$errors = ['email'=>'', 'title'=>'', 'Ingredient' =>''];

//return empty form at every refresh
$email = $title=$Ingredient="";


if(isset($_POST['submit'])){



	// Check if field is empty
if (empty($_POST['email'])){

	 $errors['email'] ='An email is required  <br />';
}
 else{
 	$email =  $_POST['email'];
 	//Check email is a valid email
 	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

      $errors['email'] =  "Invalid email <br />";
 	}
 	
 }

if (empty($_POST['title'])){

	 $errors['title'] ='Title is required  <br />';
}
 else{
 	$title = $_POST['title'];
 	if (!preg_match('/^[a-zA-Z\s]+$/', $title)){

 		 $errors['title'] ="Title must be letters and space only  <br />";
 	}
 	
 }

 if (empty($_POST['Ingredient'])){

	 $errors['Ingredient'] = 'Ingredient required  <br />';
}
 else{
 	 $Ingredient = $_POST['Ingredient'];
 	if (!preg_match('/^[a-zA-Z\s]+$/', $Ingredient)){

 		 $errors['title'] ="Ingredient must be letters and space only  <br />";
 }

}


//check for errors
if(array_filter($errors)){


}else{
//prevents malicious data from going into database
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$Ingredient = mysqli_real_escape_string($conn, $_POST['Ingredient']);


	$sql = "INSERT INTO `pizzas` (`id`, `title`, `Ingredients`, `email`, `created_at`) VALUES (NULL, '$title', '$Ingredient', 'email', current_timestamp())";

    // save to db and check

	if(mysqli_query($conn, $sql)){
			header('Location:index.php');

	}

	else{

		echo 'query error <br />'. mysqli_error($conn);
	}
//redirect to home

}



}  // end of form check





  ?>


<!DOCTYPE html>
<html>
<?php   include ('header.php') ; ?>

<section class="cointainer grey-text">
<h4 class="center"> Add a Pizza</h4>
  <form class="white"   action="add.php"  method="POST">
   <label>Your Email:</label>
   <input type="text" name="email" value="<?php echo $email ?>">
   <div class="red-text"><?php  echo $errors['email']; ?></div>
   <label>Pizza Type:</label>
   <input type="text" name="title"  value="<?php echo $title ?>">
   <div class="red-text"><?php  echo $errors['title']; ?></div>
   <label>Ingredient  (comma separated) :</label>
   <input type="text" name="Ingredient"  value="<?php echo $Ingredient ?>">
   <div class="red-text"><?php  echo $errors['Ingredient']; ?></div>

  <div class="center">
     <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">	

   

    </div>
   </form>
  </section>
<?php   include ('footer.php') ; ?>







</html>