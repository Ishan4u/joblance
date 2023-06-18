<?php


$db_name = 'mysql:host=localhost:3306;dbname=joblance';
$user_name = 'root';
$user_password = 'ishan@1999';

$conn = new PDO($db_name, $user_name, $user_password);


if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_EMAIL);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   
   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
   $select_user->execute([$email, $pass]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);
   
   if($select_user->rowCount() > 0){
     setcookie('user_id', $row['id'], time() + 60*60*24*30, '/');
     header('location:index.php');
   }else{
      echo 'incorrect email or password!';
   }

}

?>


<?php include './components/header.php'; ?>

<div class="signin-section ptb-100">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-8 offset-md-2 offset-lg-3">
            <form class="signin-form" method="post">
              <div class="form-group">
                <label>Enter Email</label>
                <input
                  type="email"
                  name="email"
                  class="form-control"
                  placeholder="Enter Your Email"
                  required
                />
              </div>
              <div class="form-group">
                <label>Enter Password</label>
                <input
                  type="password"
                  name="pass"
                  class="form-control"
                  placeholder="Enter Your Password"
                  required
                />
              </div>
              <div class="signin-btn text-center">
                <button name="submit" type="submit">Sign In</button>
              </div>
              
              <div class="create-btn text-center">
                <p>
                  Not have an account?
                  <a href="signup.html">
                    Create an account
                    <i class="bx bx-chevrons-right bx-fade-right"></i>
                  </a>
                </p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

<?php include './components/footer.php'; ?>