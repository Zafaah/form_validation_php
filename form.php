<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Form Validation</title>
</head>

<body>
   <?php
   $fullName=$email=$Phone=$age=$gender=$comments="";
   if($_SERVER["REQUEST_METHOD"]=="POST"){   
      $fullName=test_input($_POST["name"]);
      $email=test_input($_POST["email"]);
      $Phone=test_input($_POST["phone"]);
      $age=test_input($_POST["age"]);
      $gender=test_input($_POST["gender"]);
      $comments=test_input($_POST["comment"]);
   }

   function test_input($data){
      $data=trim($data);
      $data=stripslashes($data);
      $data=htmlspecialchars($data);
      return $data;
   }
   ?>
   <h2>form validation</h2>
   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      fullName: <input type="text" name="name" required />
      <br>
      <br>
      Email: <input type="email" name="email" required>
      <br>
      <br>
      Number(optional): <input type="text" name="phone">
      <br>
      <br>
      Age: <input type="text" name="age" required>
      <br>
      <br>
      gender:
      <input type="radio" name="gender" value="female">Female
      <input type="radio" name="gender" value="Male"> Male
      <br><br>
      Comments:<br>
      <textarea name="comment" rows="10" cols="30" required></textarea>
      <br><br>
      <input type="submit" name="click here" value="click here">
   </form>
   <?php
   echo "<h2> your input </h2>";
   echo "fullName: ". $fullName;
   echo "<br>";
   echo "email: ". $email;
   echo "<br>";
   echo "Number: ".$Phone;
   echo "<br>";
   echo "age: ".$age;
   echo "<br>";
   echo "Gender: ".$gender;
   echo "<br>";
   echo "Comments: ".$comments;
   
   
   ?>
</body>

</html>