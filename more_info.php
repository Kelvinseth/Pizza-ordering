<?php

include('db_connect.php');
//check get request id paramemter


if(isset($_POST['delete'])){
$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

$sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

if (mysqli_query($conn, $sql)){


    header('location: index.php');
} {

    echo 'query error:' . mysqli_error($conn);
}

}

// Get request from id parameter
if(isset($_GET['id'])){


    $id = mysqli_real_escape_string($conn, $_GET['id']);

    //makel sql
    $sql = "SELECT * FROM pizzas WHERE id = $id";

    // get query result

    $result = mysqli_query($conn, $sql);

    //fetch results in an associative array format
    $pizza = mysqli_fetch_assoc($result);


//freeresult from memory
mysqli_free_result($result);


//Close connection
mysqli_close($conn);




}

 ?>


 <!DOCTYPE html>
 <html>
<?php include ('header.php'); ?>

<div class="container center">
    <?php if($pizza): ?>

        <h4><?php echo htmlspecialchars($pizza['title']);  ?></h4>

        <p>Created by: <?php echo htmlspecialchars($pizza['email']);  ?> </p>
         <p> <?php echo date($pizza['created_at']);  ?> </p>

         <h5>Ingedients :</h5>
          <p> <?php echo htmlspecialchars($pizza['Ingredients']);  ?> </p>

          <!------Delete Form--->
          <form  action="more_info.php" method="POST">
              <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id']?>">
              <input type="submit" name="delete"  value="delete" class= "btn brand z-depth-0">



          </form>


        <?php else: ?>
            <h5>Pizza Not Found</h5>

         <?php endif; ?>


</div>
<?php include ('footer.php'); ?>
 </html>