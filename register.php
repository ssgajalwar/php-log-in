<?php
 include('partials/header.php')
?>

    <div class="form-container" id="register">
      <div class="overlay overlayrg">
        <!-- this will not have content -->
      </div>
      <div class="titleDiv">
        <h1 class="title">Register</h1>
        <span class="subTitle">Experience new things</span>
      </div>

      <!-- form section  -->
      <form action="" method="POST">
        <div class="rows grid">
          <!-- username -->
          <div class="row">
            <label for="username">User Name</label>
            <input
              type="text"
              id="username"
              name="username"
              placeholder="Enter Name here"
              required
            />
          </div>
          <!-- email -->
          <div class="row">
            <label for="username">Email</label>
            <input
              type="email"
              id="email"
              name="email"
              placeholder="Enter email here"
              required
            />
          </div>
          <!-- password -->
          <div class="row">
            <label for="password">Password</label>
            <input
              type="password"
              id="password"
              name="password"
              placeholder="Enter password"
              required
            />
          </div>

          <!-- phone -->
          <div class="row">
            <label for="phone">Phone</label>
            <input
              type="text"
              id="phone"
              name="phone"
              placeholder="Enter Phone no"
              required
            />
          </div>

          <!-- submit button -->
          <div class="row">
            <label for="submit"></label>
            <input type="submit" id="submitBtn" name="submit" value="Sign Up" />

            <span class="registerLink"
              >Already have an account <a href="index.php">LogIn</a></span
            >
          </div>
        </div>
      </form>
    </div>

<?php
    include('partials/footer.php')
?>


<!-- registering new user to the database -->


<?php
  if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    // state out query
    $sql = "INSERT INTO admin SET
            username= '$username',
            email= '$email',
            password='$password',
            phone='$phone'  
    ";
    $res = mysqli_query($conn,$sql);
    if($res==true){
      $_SESSION['accountCreated']='<span class="success">Account '.$username.' created</span>';
      header('location:'.SITEURL.'index.php');
      exit();
    }else{
      $_SESSION['unSuccessful']='<span class="fail">Account '.$username.' failed</span>';
      header('location:'.SITEURL.'register.php');
      exit();
    }
  }
?>