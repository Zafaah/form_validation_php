<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <style>
   .error {
      color: red
   }
   </style>
   <title>Document</title>
</head>

<body>
   <?php
   $nameEr=$emailErr=$genderErr=$commentErr=$websiteErr="";
   $name=$email=$comment=$website=$gender="";
   if($_SERVER["REQUEST_METHOD"]=="POST"){
      if(empty($_POST["name"])){
         $nameEr= "please enter avalid num";
      }
      else{
         $name=test_input($_POST["name"]);
         if(!preg_match("/^[a-zA-Z-']*$/",$name)){
            $nameEr="only letter and white space allowed";
         }
      }
   
   if(empty($_POST["email"])){
      $emailErr="pls valid Email";
   }else{
      $email=test_input($_POST["email"]);
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
         $emailErr="The email address is incorrect";
      }
   }
   if(empty($_POST["website"])){
      $website="";
      
   }else{
      $website=test_input($_POST["website"]);
      if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)){
         $websiteErr = "Enter a valid Webiste URL";
      }
   }
   if(empty($_POST["gender"])){
      $genderErr="pls select gender";
   }else{
      $gender=test_input($_POST["gender"]);

   }
   if(empty($_POST["comment"])){
      $commentErr="pls enter your comments";
   }else{
      $comment=test_input($_POST["comment"]);
   }
}
function test_input($data){
   $data=trim($data);
   $data=stripslashes($data);
   $data=htmlspecialchars($data);
   return $data;
}


   ?>
   <h2>PHP Form Validation Example</h2>

   <p><span class="error">* required field</span></p>

   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

      FullName: <input type="text" name="name">

      <span class="error">* <?php echo $nameEr;?></span>

      <br><br>

      E-mail address: <input type="text" name="email">

      <span class="error">* <?php echo $emailErr;?></span>

      <br><br>

      Website: <input type="text" name="website">

      <span class="error"><?php echo $websiteErr;?></span>

      <br><br>

      Comment: <textarea name="comment" rows="2" cols="10"></textarea>

      <br><br>

      Gender:

      <input type="radio" name="gender" value="female">Female

      <input type="radio" name="gender" value="male">Male

      <span class="error">* <?php echo $genderErr;?></span>

      <br><br>

      <input type="submit" name="submit" value="Submit">

   </form>
   <?php
   echo "<h2>Form Validation</h2>";
   echo "Name: ". $name;
   echo "<br>";
   echo "email: ". $email;
   echo "<br>";
   echo "gender: ". $gender;
   echo "<br>";
   echo "website".$website;
   echo "<br>";
   echo $comment;

   ?>
</body>

</html>