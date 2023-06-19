<?php include './components/connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
    header('location:user-sign-in.php');
}

/* get */
if (isset($_GET['get_id'])) {
    $get_id = $_GET['get_id'];
} else {
    $get_id = '';
    header('location:user-profile.php');
}

/* update */
if (isset($_POST['update'])) {

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


    // $pass = sha1($_POST['pass']);
    // $pass = filter_var($pass, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // $cpass = sha1($_POST['cpass']);
    // $cpass = filter_var($cpass, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // $image = $_FILES['image']['name'];
    // $image = filter_var($image, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // $ext = pathinfo($image, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // $rename = unique_id() . '.' . $ext;
    // $image_size = $_FILES['image']['size'];
    // $image_tmp_name = $_FILES['image']['tmp_name'];
    // $image_folder = 'uploaded_files/' . $rename;

    // $old_image = $_POST['old_image'];
    // $old_image = filter_var($old_image, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // $image = $_FILES['image']['name'];
    // $image = filter_var($image, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    // $rename_image = unique_id() . '.' . $image_ext;
    // $image_tmp_name = $_FILES['image']['tmp_name'];
    // $image_size = $_FILES['image']['size'];
    // $image_folder = 'uploaded_files/' . $rename_image;

    $update_user = $conn->prepare("UPDATE `users` SET name = ?, email = ?, contact = ?, location = ?, profession=? WHERE id = ?");
    $update_user->execute([$name, $email, $contact, $location, $profession, $get_id]);

    // move_uploaded_file($image_tmp_name, $image_folder);
    // if ($old_image != '') {
    //     unlink('uploaded_files/' . $old_image);
    // }

    header('location:user-profile.php');
}

?>
<?php include './components/header.php' ?>

<?php
$select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
$select_user->execute([$get_id]);
if ($select_user->rowCount() > 0) {
    while ($fetch_user = $select_user->fetch(PDO::FETCH_ASSOC)) { ?>



        <div class="signup-section ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-8 offset-md-2 offset-lg-3">
                        <form class="signup-form" method="post" enctype="multipart/form-data">
                            <div class="create-btn text-center">
                                <p> Update Infomation</p>
                            </div>
                            <div class="form-group">
                                <label>Enter Username</label>
                                <input type="text" value="<?= $fetch_user['name']; ?>" class="form-control" name="name"
                                    placeholder="Enter Username" required />
                            </div>
                            <div class="form-group">
                                <label>Enter Email</label>
                                <input type="email" name="email" value="<?= $fetch_user['email']; ?>" class="form-control"
                                    placeholder="Enter Your Email" required />
                            </div>
                            <div class="form-group">
                                <label>Enter contact</label>
                                <input type="text" value="<?= $fetch_user['contact']; ?>" name="contact" class="form-control"
                                    placeholder="Enter Your Email" required />
                            </div>
                            <div class="form-group">
                                <label>Enter location</label>
                                <input type="text" name="location" value="<?= $fetch_user['location']; ?>" class="form-control"
                                    placeholder="Enter Your Email" required />
                            </div>
                            <div class="form-group">
                                <label>Enter profession</label>
                                <input type="text" name="profession" value="<?= $fetch_user['profession']; ?>"
                                    class="form-control" placeholder="Enter Your Email" required />
                            </div>
                            <!-- <div class="form-group">
                                <label>Select pic</label>
                                <input type="file" name="image" class="form-control" placeholder="Enter Your Email" required />
                            </div> -->


                            <!-- <div class="form-group">
                        <label>Enter Password</label>
                        <input type="password" name="pass" class="form-control" placeholder="Enter Your Password"
                            required />
                    </div> -->
                            <!-- <div class="form-group">
                        <label>Enter confirm Password</label>
                        <input type="password" name="cpass" class="form-control" placeholder="Enter Your Password"
                            required />
                    </div> -->
                            <div class="signup-btn text-center">
                                <button name="update" type="submit">Update</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>

    <?php }
}
?>

<?php include './components/footer.php' ?>