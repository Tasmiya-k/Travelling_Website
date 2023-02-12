<?php
$insert=false;
if(isset($_POST['Name'])){

    //setting connection variables
$server="localhost";
$username="root";
$password="";

//create a database connection 
$con=mysqli_connect($server, $username, $password);

//check for connection success
if(!$con){
    die("Connection to this database failed due to" .mysqli_connect_error());
}
// echo "Success connecting to DataBase";


//collect all post variables
$Name=$_POST['Name'];
$Gender =$_POST['Gender'];
$Age= $_POST['Age'];
$Email = $_POST['Email'];
$Phone=$_POST['Phone'];
$description=$_POST['description'];


$sql="INSERT INTO `trip`.`trip` (`Name`, `Email`, `Age`, `Gender`, `Phone`, `Other`, `DT`)
 VALUES ('$Name', '$Email', '$Age', '$Gender', 
 '$Phone', '$description', current_timestamp());";



 if($con->query($sql)== true){
   //flag for successfull insertion
    $insert=true;
 }
 else{ 
    echo "ERROR: $sql <br> $con->error";
 }

 //close the database connection  ***VERY IMP
 $con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="index.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Roboto:wght@100&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <img src="bg.jpg" alt="bg" class="bg" />
    <div class="container">
      <h1>Welcome To My Trip</h1>
      <p>Enter your Details here</p>

      <?php
      if($insert==true){
       echo "<p class='thanks'>Your form has been successfully submitted</p>";
      }
       ?>

      <form action="index.php" method="post">
        <input
          type="text"
          name="Name"
          id="Name"
          placeholder="Enter your name "
        />
        <input type="text" name="Email" id="Email" placeholder="Enter email " />
        <input type="text" name="Age" id="Age" placeholder="Enter age" />
        <input
          type="text"
          name="Gender"
          id="Gender"
          placeholder="Enter gender"
        />
        <input
          type="text"
          name="Phone"
          id="Phone"
          placeholder="Enter you phone number"
        />
        <textarea
          name="description"
          id="description"
          cols="30"
          rows="10"
          placeholder="Add additional information here"
        >
        </textarea>
        <button class="btn">Submit</button>
      </form>
    </div>
  </body>
 
</html>
