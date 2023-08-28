<?php include 'components/connect.php';

if (isset($_COOKIE['com_id'])) {
    $com_id = $_COOKIE['com_id'];
} else {
    $com_id = '';
    header('location:company-sign-in.php');
}


//get candidate id
if (isset($_GET['get_id'])) {
    $get_id = $_GET['get_id'];
} else {
    $get_id = '';
    // header('location:home.php');
}

//get postion
if (isset($_GET['position'])) {
    $position = $_GET['position'];
} else {
    $position = '';
    // header('location:home.php');
}
//get job id
if (isset($_GET['job_id'])) {
    $job_id = $_GET['job_id'];
} else {
    $job_id = '';
    // header('location:home.php');
}

// hire button
if (isset($_POST['hire'])) {
    $u_id = $_POST['hire'];
    $update_status = $conn->prepare("UPDATE user_post SET `status` = ? WHERE u_id = ? AND job_id = ? ");
    if ($update_status->execute(['1', $u_id, $job_id])) {
        echo '<script> alert("Selected for Interview"); </script>';
    }

}

// hire button
if (isset($_POST['hired'])) {
    $u_id = $_POST['hired'];
    $update_status = $conn->prepare("UPDATE user_post SET `status` = ? WHERE u_id = ? AND job_id = ? ");
    if ($update_status->execute(['0', $u_id, $job_id])) {
        echo '<script> alert("Removed"); </script>';
    }
}

?>

<?php include 'components/header.php'; ?>

<?php
$select_user = $conn->prepare("SELECT u.*,cv.* FROM `users` u INNER JOIN cv ON cv.user_id = u.id WHERE id = ?");
$select_user->execute([$get_id]);
$fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);

?>

<section class="candidate-details pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="candidate-profile">
                    <img src="uploaded_files/<?= $fetch_user['image']; ?>" alt="candidate image">
                    <h3>
                        <?php echo $fetch_user['name'] ?>
                    </h3>
                    <p>
                        <?php echo $fetch_user['profession'] ?>
                    </p>
                    <ul>
                        <li>
                            <a href="tel:+100230342">
                                <i class='bx bxs-phone'></i>
                                <?php echo $fetch_user['contact'] ?>
                            </a>
                        </li>
                        <li>
                            <a
                                href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#5d373235331d3a303c3431733e3230">
                                <i class='bx bxs-location-plus'></i>
                                <span>
                                    <?php echo $fetch_user['email'] ?>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <div class="candidate-social">
                        <a href="#" target="_blank"><i class="bx bxl-facebook"></i></a>
                        <a href="#" target="_blank"><i class="bx bxl-twitter"></i></a>
                        <a href="#" target="_blank"><i class="bx bxl-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="candidate-info-text">
                    <h3>About Me</h3>
                    <p>
                        <?php echo $fetch_user['about'] ?>
                    </p>
                </div>
                <div class="candidate-info-text candidate-education">
                    <h3>Education</h3>
                    <div class="education-info">
                        <?php echo $fetch_user['education'] ?>
                    </div>


                </div>
                <div class="candidate-info-text candidate-experience">
                    <h3>Experience</h3>

                    <p>
                        <?php echo $fetch_user['experience'] ?>
                    </p>
                </div>
                <div class="candidate-info-text candidate-skill">
                    <h3>Skills</h3>
                    <p>
                        <?php echo $fetch_user['skill'] ?>
                    </p>
                </div>
                <div class="candidate-info-text candidate-skill">
                    <h3>Applied For</h3>
                    <p>
                        <a href="job-details.php?get_id=<?php echo $job_id ?>"><?php echo $position ?></a>
                    </p>
                </div>
                <div class="candidate-info-text text-center">
                    <div class="theme-btn">
                        <?php
                         $select_jobPost = $conn->prepare("select * from user_post where u_id = ? and job_id = ?");
                         $select_jobPost->execute([$fetch_user['id'], $job_id]);
                         $fetch = $select_jobPost->fetch(PDO::FETCH_ASSOC);
                          ?>

                        

                        <?php if ($fetch['status'] == 0) { ?>
                            <form method="post">
                                <button name="hire" value="<?php echo $fetch_user['id'] ?>" class="default-btn"
                                    type="input">Hire Me </button>
                            </form>
                        <?php }else{ ?>
                            <form method="post">
                                <button name="hired"  value="<?php echo $fetch_user['id'] ?>" style="border: 2px solid green; border-radius:10px; padding: 0px 5px; color:#fff; background-color:green"
                                    type="input">Selected for Interview </button>
                            </form>
                        <?php } ?>
                        
                        

                        <!-- <a href="#" class="default-btn">Hire Me</a> -->
                        <!-- <a href="#" class="default-btn">Download CV</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include 'components/footer.php'; ?>