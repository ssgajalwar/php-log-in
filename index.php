<?php
 include('partials/header.php')
?>

 <?php
   if(isset($_SESSION['accountCreated'])){
      echo $_SESSION['accountCreated'];
      unset($_SESSION['accountCreated']); 
   } 
 ?>



    <div class="form-container">
       <div class="overlay">
          <!-- this will not have content -->
       </div>
       <div class="titleDiv">
        <h1 class="title">Login</h1>
        <span class="subTitle">Welcome agian</span>
       </div>

       <?php 
       if(isset($_SESSION['noAdmin'])){
          echo $_SESSION['noAdmin'];
          unset($_SESSION['noAdmin']);
       }
       ?>




       <!-- form section  -->
       <form action="" method="POST">
          <div class="rows grid">
         <!-- username -->
            <div class="row">
                <label for="username">User Name</label>
                <input type="text" id="username" name="username" placeholder="Enter User Name" required/>
            </div> 
        <!-- password -->   
             <div class="row">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password" required/>
            </div>
            <div class="row">
                <label for="submit"></label>
                <input type="submit" id="submitBtn" name="submit" value="Login"/>
                
                <span class="registerLink">Don't have an account <a href="register.php">register</a></span>
            </div>
          </div>
       </form>

    </div>


<?php
 include('partials/footer.php')
?>


<!-- adding data in database -->

<?php 
 if(isset($_POST['submit'])){
   //   echo 'Yes data submited';
   $username = $_POST['username'];
   $password = $_POST['password'];

   //sql to select if there is details in database
   $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

   //execute the query
   $result = mysqli_query($conn,$sql);

   //count the number of account with same username and password
   $count = mysqli_num_rows($result);

   // put the count results in an array
   $row= mysqli_fetch_assoc($result);

   //check if theres at least one account in the database
   if($count ==1){
      $_SESSION['loginMessage'] = '<span class="success">Welcome'.$username.'</span>';
      header("Location:http://localhost/php-log-in/dashboard.php");
      exit();
   }else{
      $_SESSION['noAdmin'] = '<span class="fail">'.$username.' is not found</span>';
      header("Location: http://localhost/php-log-in/index.php");
      exit();
   }


 }
  

?>