<?php include 'components/connect.php';

if (isset($_COOKIE['com_id'])) {
    $com_id = $_COOKIE['com_id'];
} else {
    $com_id = '';
    header('location:company-sign-in.php');
}

// delete job
if(isset($_POST['delete'])){
    $d_id = $_POST['delete'];
    $delete = $conn->prepare("DELETE FROM post WHERE job_id = ?");
    if($delete->execute([$d_id])){
      echo '<script> alert("Deleted") </script>';
    }
   
  }

?>

<?php include 'components/header.php'; ?>

<!-- Starts profile section -->


<!-- Starts Read company -->
<?php
$select_company = $conn->prepare("SELECT * FROM `company` WHERE com_id = ?");
$select_company->execute([$com_id]);
$fetch_company = $select_company->fetch(PDO::FETCH_ASSOC);
?>
<!-- Ends Read company -->

<section class="account-section ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="account-information">
                    <div class="profile-thumb">
                        <img src="uploaded_files/<?= $fetch_company['image']; ?>" alt="account holder image" />
                        <h3>
                            <?php echo $fetch_company['com_name']; ?>
                        </h3>
                        <p>
                            <?php echo $fetch_company['email']; ?>
                        </p>
                    </div>
                    <ul>
                        <li>
                            <a href="#" class="active">
                                <i class="bx bx-user"></i>
                                Job Advertisments
                            </a>
                        </li>

                        <li>
                            <a href="recieve_request.php">
                                <i class="bx bx-briefcase"></i>
                                Recieved Requests
                            </a>
                        </li>
                        <li>
                            <a href="selected_request.php">
                                <i class="bx bx-briefcase"></i>
                                Selected Requests
                            </a>
                        </li>
                        <!-- <li>
                            <a href="#">
                                <i class="bx bx-envelope"></i>
                                Messages
                            </a>
                        </li> -->
                        <!-- <li>
                  <a href="#">
                    <i class="bx bx-heart"></i>
                    Saved Jobs
                  </a>
                </li> -->
                        <!-- <li>
                  <a href="#">
                    <i class="bx bx-lock-alt"></i>
                    Change Password
                  </a>
                </li> -->
                        <!-- <li>
                  <a href="#">
                    <i class="bx bx-coffee-togo"></i>
                    Delete Account
                  </a>
                </li> -->
                        <!-- <li>
                            <a href="company-sign-out.php">
                                <i class="bx bx-log-out"></i>
                                Sign Out
                            </a>
                        </li> -->
                    </ul>
                </div>
            </div>


            <div class="col-md-8">

                <!--Starts Read Post data -->



                <!-- Ends Read Post data -->

                <div class="row">
                    <!-- Start job card -->
                    <?php
                    $select_post = $conn->prepare("SELECT * FROM `post` WHERE com_id = ?");
                    $select_post->execute([$com_id]);
                    if ($select_post->rowCount() > 0) {
                        while ($fetch_post = $select_post->fetch(PDO::FETCH_ASSOC)) { ?>

                            <div class="col-sm-6">
                                <div class="job-card">
                                    <div class="row align-items-center">
                                        <div class="col-lg-3">
                                            <div class="thumb-img">
                                                <a href="job-details.html">
                                                    <img src="uploaded_files/<?= $fetch_post['image']; ?>" alt="company logo">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="job-info">
                                                <h3>
                                                    <a href="job-details.php?get_id=<?php echo $fetch_post['job_id']; ?>"><?php echo $fetch_post['title']; ?></a>
                                                </h3>
                                                <ul>
                                                    <!-- <li>Via <a href="#">Tourt Design LTD</a></li> -->
                                                    <li>
                                                        <i class='bx bx-location-plus'></i>
                                                        <?php echo $fetch_company['location']; ?>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="job-save">
                                                <span><?php echo $fetch_post['job_type']; ?></span>
                                                
                                                <p>
                                                    Edit
                                                    
                                                </p>
                                                <form method="post">
                                                <button type="submit" name="delete" value="<?php echo $fetch_post['job_id']; ?>" style="color:red;"  >Delete</button>
                                                </form>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } ?>
                    <!-- Ends job card -->
                </div>



                <!-- Starts Add job Button  -->
                <div class="candidate-info-text text-center">
                    <div class="theme-btn">
                        <a href="post-job.php" class="default-btn">Add
                            Jobs</a>
                    </div>
                </div>
                <!--Ends Add job Button  -->
            </div>


        </div>
    </div>
</section>
<!-- End profile section -->

<?php include 'components/footer.php'; ?>