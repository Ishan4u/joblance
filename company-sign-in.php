<?php
include './components/connect.php';



/* company */
if (isset($_COOKIE['com_id'])) {
    $com_id = $_COOKIE['com_id'];
    header('location:company-profile.php');
} else {
    $com_id = '';
}


if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $pass = sha1($_POST['pass']);
    $pass = filter_var($pass, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $select_company = $conn->prepare("SELECT * FROM `company` WHERE email = ? AND password = ? LIMIT 1");
    $select_company->execute([$email, $pass]);
    $row = $select_company->fetch(PDO::FETCH_ASSOC);

    if ($select_company->rowCount() > 0) {
        setcookie('com_id', $row['com_id'], time() + 60 * 60 * 24 * 30, '/');
        header('location:company-profile.php');
    } else {
        $message = 'incorrect email or password!';
    }

}

?>
<?php include './components/header.php'; ?>


<div class="signin-section ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8 offset-md-2 offset-lg-3">
                <form class="signin-form" method="post">
                    <div class="form-group text-center">
                        <p> Signin as company</p>
                    </div>
                    <div class="form-group">
                        <label>Enter Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required />
                    </div>
                    <div class="form-group">
                        <label>Enter Password</label>
                        <input type="password" name="pass" class="form-control" placeholder="Enter Your Password"
                            required />
                    </div>
                    <div class="signin-btn text-center">
                        <button name="submit" type="submit">Sign In</button>
                    </div>

                    <div class="create-btn text-center">
                        <p>
                            Not have an account?
                            <a href="company-sign-up.php">
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