<?php

include './components/connect.php';

if (isset($_COOKIE['user_id'])) {
  $user_id = $_COOKIE['user_id'];
  header('location:user-profile.php');
} else {
  $user_id = '';
}

if (isset($_POST['submit'])) {

  $id = unique_id();
  $name = $_POST['name'];
  $name = filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $email = $_POST['email'];
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);

  $contact = $_POST['contact'];
  $contact = filter_var($contact, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $location = $_POST['location'];
  $location = filter_var($location, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

  $profession = $_POST['profession'];
  $profession = filter_var($profession, FILTER_SANITIZE_FULL_SPECIAL_CHARS);


  $pass = sha1($_POST['pass']);
  $pass = filter_var($pass, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $cpass = sha1($_POST['cpass']);
  $cpass = filter_var($cpass, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

  $image = $_FILES['image']['name'];
  $image = filter_var($image, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $ext = pathinfo($image, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $rename = unique_id() . '.' . $ext;
  $image_size = $_FILES['image']['size'];
  $image_tmp_name = $_FILES['image']['tmp_name'];
  $image_folder = 'uploaded_files/' . $rename;

  $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
  $select_user->execute([$email]);

  if ($select_user->rowCount() > 0) {
    $message = 'email already taken!';
  } else {
    if ($pass != $cpass) {
      $message = 'confirm passowrd not matched!';
    } else {
      $insert_user = $conn->prepare("INSERT INTO `users`(id, name, email, contact, location, password, image, profession) VALUES(?,?,?,?,?,?,?,?)");
      $insert_user->execute([$id, $name, $email, $contact, $location, $cpass, $rename, $profession]);
      move_uploaded_file($image_tmp_name, $image_folder);

      $verify_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
      $verify_user->execute([$email, $pass]);
      $row = $verify_user->fetch(PDO::FETCH_ASSOC);

      if ($verify_user->rowCount() > 0) {
        setcookie('user_id', $row['id'], time() + 60 * 60 * 24 * 30, '/');
        header('location:user-profile.php');
      }
    }
  }

}

?>

<?php include './components/header.php'; ?>

<div class="signup-section ptb-100">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-8 offset-md-2 offset-lg-3">
        <form class="signup-form" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Enter Username</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Username" required />
          </div>
          <div class="form-group">
            <label>Enter Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required />
          </div>
          <div class="form-group">
            <label>Enter contact</label>
            <input type="text" name="contact" class="form-control" placeholder="Enter Your contact" required />
          </div>
          <div class="form-group">
            <label>Enter location</label>
            <input type="text" name="location" class="form-control" placeholder="Enter Your location" required />
          </div>
          <div class="form-group">
            <label>Enter profession</label>
            <input type="text" name="profession" class="form-control" placeholder="Enter Your profession" required />
          </div>
          <div class="form-group">
            <label>Select pic</label>
            <input type="file" name="image" class="form-control"  required />
          </div>
          <div class="form-group">
            <label>Enter Password</label>
            <input type="password" name="pass" class="form-control" placeholder="Enter Your Password" required />
          </div>
          <div class="form-group">
            <label>Enter confirm Password</label>
            <input type="password" name="cpass" class="form-control" placeholder="Confirm Password" required />
          </div>
          <div class="signup-btn text-center">
            <button name="submit" type="submit">Sign Up</button>
          </div>

          <div class="create-btn text-center">
            <p>
              Have an Account?
              <a href="user-sign-in.php">
                Sign In
                <i class="bx bx-chevrons-right bx-fade-right"></i>
              </a>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Sweet Alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
if (!$message == '') { ?>
  <script>
    Swal.fire({
      icon: 'error',
      title: "<?php echo $message ?>",
      showConfirmButton: false,
      showCloseButton: true,
      // text: 'Something went wrong!',
      // footer: '<a class="inline-btn" href="login.php">Login</a>'
    })
  </script>
<?php } ?>
<!-- Sweet alert End -->

<?php include './components/footer.php'; ?>