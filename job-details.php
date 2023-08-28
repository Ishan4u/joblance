<?php
include 'components/connect.php';

/* user */
if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}

//job id
if (isset($_GET['get_id'])) {
    $get_id = $_GET['get_id'];
} else {
    $get_id = '';
    // header('location:home.php');
}

$message = '';

//Apply job
if (isset($_POST['apply'])) {
    if ($user_id != '') { //check user loggin

        // select data for Prevent redundancy
        $select_user_post = $conn->prepare("SELECT * FROM user_post WHERE u_id=? AND job_id=?");
        $select_user_post->execute([$user_id, $get_id]);
        if ($select_user_post->rowCount() > 0) { //Avoid repetition
            $message = "Already applied";
        } else {
            // insert data
            $insert_post_job = $conn->prepare("INSERT INTO user_post(u_id,job_id) VALUES(?,?)");
            if ($insert_post_job->execute([$user_id, $get_id])) {
                $message = "success";
            }
        }


    } else {
        $message = "loggin first";
    }

}
?>

<?php include 'components/header.php'; ?>
<!-- job detail section Starts-->

<!-- Fetch job details Starts -->
<?php

$select_job = $conn->prepare("SELECT p.*, c.*, p.image AS post_image FROM post p
INNER JOIN company c ON p.com_id = c.com_id WHERE p.job_id=?");
$select_job->execute([$get_id]);
while ($fetch_job = $select_job->fetch(PDO::FETCH_ASSOC)) { ?>

    <!-- Fetch job details End -->

    <section class="job-details ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="job-details-text">
                                <div class="job-card">
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <div class="company-logo">
                                                <img src="uploaded_files/<?= $fetch_job['post_image']; ?>" alt="logo">
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="job-info">
                                                <h3>
                                                    <?php echo $fetch_job['title']; ?>
                                                </h3>
                                                <ul>
                                                    <li>
                                                        <i class='bx bx-location-plus'></i>
                                                        <?php echo $fetch_job['location']; ?>
                                                    </li>


                                                </ul>
                                                <span>
                                                    <i class='bx bx-paper-plane'></i>
                                                    Apply Before:
                                                    <?php echo $fetch_job['apply_before']; ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="details-text">
                                    <h3>Description</h3>
                                    <p>
                                        <?php echo $fetch_job['description']; ?>
                                    </p>

                                </div>
                                <div class="details-text">
                                    <h3>Requirements</h3>
                                    <p>
                                        <?php echo $fetch_job['requirements']; ?>
                                    </p>

                                </div>
                                <div class="details-text">
                                    <h3>Job Details</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td><span>Company</span></td>
                                                        <td>&nbsp;
                                                            <?php echo $fetch_job['com_name']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Location</span></td>
                                                        <td>&nbsp;
                                                            <?php echo $fetch_job['location']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Job Type</span></td>
                                                        <td>&nbsp;
                                                            <?php echo $fetch_job['job_type']; ?>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <table class="table">
                                                <tbody>
                                                    <!-- <tr>
                                                    <td><span>Experince</span></td>
                                                    <td>2 Years</td>
                                                </tr> -->

                                                    <tr>
                                                        <td><span>Salary</span></td>
                                                        <td>&nbsp;
                                                            <?php echo $fetch_job['salary']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Email</span></td>
                                                        <td>
                                                            &nbsp;
                                                            <?php echo $fetch_job['email']; ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="theme-btn">
                                    <form method="post">


                                        <button class="default-btn" type="submit" name="apply">Apply Now</button>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="job-sidebar">
                        <h3>Posted By</h3>
                        <div class="posted-by">
                            <img src="uploaded_files/<?= $fetch_job['image']; ?>" alt="client image">
                            <h4>
                                <?php echo $fetch_job['com_name']; ?>
                            </h4>
                            <!-- <span>CEO of Tourt Design LTD</span> -->
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </section>

    <?php
}
?>
<!-- job detail section Ends -->

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

<?php
if ($message == 'success') { ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: "<?php echo "Applied successfully" ?>",
            showConfirmButton: false,
            showCloseButton: true,
            // text: 'Something went wrong!',
            // footer: '<a class="inline-btn" href="login.php">Login</a>'
        })
    </script>
<?php } ?>
<!-- Sweet alert End -->

<?php include 'components/footer.php'; ?>