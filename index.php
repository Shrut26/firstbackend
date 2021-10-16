<?php
   $submit =false; 
if(isset($_POST['name'])){

   $server = "localhost";
   $username ="root";
   $password="";

   $con = mysqli_connect($server , $username , $password);

   if(!$con){
       die("connection to this database failed due to". mysqli_connect_error());
   }
   //else
   //echo "Success connecting to the database";
   
   $name = $_POST['name'];
   $age = $_POST['age'];
   $Email = $_POST['Email'];
   $gender = $_POST['gender'];
   $desc = $_POST['desc'];
   $roll= $_POST['roll']; 
   $phone = $_POST['phone'];
   $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `Email`, `gender`, `others`, `dt`, `roll no.`, `phone`) VALUES ('$name',
   '$age', '$Email', '$gender', '$desc', current_timestamp(), '$roll', '$phone')";

   //echo $sql;

   if($con->query($sql) == true){
    //echo "Successfully inserted";
    $submit=true;
}

    else{
        echo "ERROR: $sql <br>  $con->error";
    }
    $con->close();
}   
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcomoe to Travel plan </title>
    <link rel="stylesheet" href="style.css">
    
</head>

<body>
    
    <div class="container">
        <h3>Welcome to IIT JODHPUR US TRIP FORM</h3>
        <p>Enter your details for your participation in your trip and submit this form</p>
        <?php
        if($submit==true){
        echo "<p id='sub'>Thanks for submitting your form</p>";
        }

        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" placeholder="Enter your name">
            <input type="text" name="age" placeholder="Enter your age">
            <input type="text" name="roll" placeholder="Enter your Roll No.">
            <input type="text" name="gender" placeholder="Enter your gender.">
            <input type="email" name="Email" placeholder="Enter your Email.">
            <input type="phone" name="phone" placeholder="Enter your phone number.">

            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter the other info here"></textarea>
            <br>
            <button class="btn">Submit</button>

        </form>


    </div>

    <script src="index.js">

    </script>
    <!--INSERT INTO `trip` (`S.no`, `name`, `age`, `Email`, `gender`, `others`, `dt`, `roll no.`, `phone`) VALUES ('1',
    'Shrutayu Aggarwal', '18', 'aggarwal.4@iitj.ac.in', 'male', 'good to have you here', '2021-10-16 22:13:43', '096',
    '1548747045');-->
</body>

</html>