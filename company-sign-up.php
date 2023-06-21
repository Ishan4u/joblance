<?php
/* database */
include './components/connect.php';

/* user */
if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}

/* company */
if (isset($_COOKIE['com_id'])) {
    $user_id = $_COOKIE['com_id'];
} else {
    $com_id = '';
}

$message = '';


/* Register company form */
if (isset($_POST['submit'])) {

    $com_id = unique_id();
    $com_name = $_POST['com_name'];
    $com_name = filter_var($com_name, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
  
    $contact = $_POST['contact'];
    $contact = filter_var($contact, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $location = $_POST['location'];
    $location = filter_var($location, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  
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
  
    $select_user = $conn->prepare("SELECT * FROM `company` WHERE email = ?");
    $select_user->execute([$email]);

    
  
    if ($select_user->rowCount() > 0) {
      $message = 'email already taken!';
    } else {
      if ($pass != $cpass) {
        $message = 'confirm passowrd not matched!';
      } else {
        $insert_user = $conn->prepare("INSERT INTO `company`(com_id, com_name, email, phone, location, password, image) VALUES(?,?,?,?,?,?,?)");
        $insert_user->execute([$com_id, $com_name, $email, $contact, $location, $cpass, $rename]);
        move_uploaded_file($image_tmp_name, $image_folder);
  
        $verify_user = $conn->prepare("SELECT * FROM `company` WHERE email = ? AND password = ? LIMIT 1");
        $verify_user->execute([$email, $pass]);
        $row = $verify_user->fetch(PDO::FETCH_ASSOC);
  
        if ($verify_user->rowCount() > 0) {
          setcookie('user_id', $row['id'], time() + 60 * 60 * 24 * 30, '/');
          header('location:index.php');
        }
      }
    }
  
  }
?>


<?php include 'components/header.php' ?>

<!-- Start register form -->
<div class="signup-section ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8 offset-md-2 offset-lg-3">
                <form class="signup-form" method="post" enctype="multipart/form-data">
                    <div class="form-group text-center">
                        <p> Register as company</p>
                    </div>
                    <div class="form-group">
                        <label>Enter Company name</label>
                        <input type="text" class="form-control" name="com_name" placeholder="Enter Company name" required />
                    </div>
                    <div class="form-group">
                        <label>Enter Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter Email" required />
                    </div>
                    <div class="form-group">
                        <label>Enter contact</label>
                        <input type="text" name="contact" class="form-control" placeholder="Enter Contact"
                            required />
                    </div>
                    <div class="form-group">
                        <label>Enter location</label>
                        <input type="text" name="location" class="form-control" placeholder="Enter Location"
                            required />
                    </div>
                    <!-- <div class="form-group">
                        <label>Enter profession</label>
                        <input type="text" name="profession" class="form-control" placeholder="Enter Your Email"
                            required />
                    </div> -->
                    <div class="form-group">
                        <label>Select pic</label>
                        <input type="file" name="image" class="form-control"  required />
                    </div>
                    <div class="form-group">
                        <label>Enter Password</label>
                        <input type="password" name="pass" class="form-control" placeholder="Enter Password"
                            required />
                    </div>
                    <div class="form-group">
                        <label>Enter confirm Password</label>
                        <input type="password" name="cpass" class="form-control" placeholder="Enter confirm Password"
                            required />
                    </div>
                    <div class="signup-btn text-center">
                        <button name="submit" type="submit">Sign Up</button>
                    </div>

                    <div class="create-btn text-center">
                        <p>
                            Have an Account?
                            <a href="company-sign-in.php">
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
<!-- End register form -->


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


<?php include 'components/footer.php' ?>