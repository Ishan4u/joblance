<?php include './components/connect.php';

if (isset($_COOKIE['user_id'])) {
  $user_id = $_COOKIE['user_id'];
} else {
  $user_id = '';
  header('location:user-sign-in.php');
}


// delete job
if(isset($_POST['delete'])){
  $d_id = $_POST['delete'];
  $delete = $conn->prepare("DELETE FROM user_post WHERE job_id = ?");
  if($delete->execute([$d_id])){
    echo '<script> alert("Deleted") </script>';
  }
 
}

?>

<?php include './components/header.php'; ?>
<section class="account-section ptb-100">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <!-- fetch user info -->
        <?php
        $select_user = $conn->prepare("SELECT * FROM users WHERE id=? ");
        $select_user->execute([$user_id]);
        while ($fetch_user = $select_user->fetch(PDO::FETCH_ASSOC)) { ?>

         
        <!-- fetch user info Ends -->
        <div class="account-information">
          <div class="profile-thumb">
            <img src="uploaded_files/<?= $fetch_user['image']; ?>" />
            <h3><?php echo $fetch_user['name']; ?></h3>
            <p><?php echo $fetch_user['profession']; ?></p>
          </div>
          <?php } ?>
          <ul>

            <li>
              <a class="active" href="#">
                <i class="bx bx-briefcase"></i>
                Applied Job
              </a>
            </li>

            <li>
              <a href="selected_job.php">
                <i class="bx bx-heart"></i>
                 Selected For Interview
              </a>
            </li>

            <!-- <li>
              <a href="#">
                <i class="bx bx-coffee-togo"></i>
                Delete Account
              </a>
            </li> -->
            <!-- <li>
              <a href="#">
                <i class="bx bx-log-out"></i>
                Log Out
              </a>
            </li> -->
          </ul>
        </div>
      </div>

      <div class="col-md-8">
          <!-- Fetch job details -->
          <?php 
          $select_job = $conn->prepare("SELECT u_p.*,p.*,c.* FROM user_post u_p INNER JOIN post p ON u_p.job_id = p.job_id INNER JOIN company c ON p.com_id = c.com_id WHERE u_id=?");
          $select_job->execute([$user_id]);
          while($fetch_job = $select_job->fetch(PDO::FETCH_ASSOC)){ ?>

          
        <div class="job-card-two">
          <div class="row align-items-center">
            <div class="col-md-1">
              <div class="company-logo-new">
                <a href="job-details.html"></a>
                <img src="assets/img/company-logo/1.png" alt="logo" />
              </div>
            </div>
            <div class="col-md-8">
              <div class="job-info">
                <h3>
                  <a href="job-details.html"><?php echo $fetch_job['title'] ?></a>
                </h3>
                <ul>
                  <li>
                    <i class="bx bx-briefcase"></i>
                    <?php echo $fetch_job['com_name'] ?>
                  </li>
                  <li>
                    <i class="bx bx-briefcase"></i>
                    <?php echo $fetch_job['salary'] ?>
                  </li>
                  <li>
                    <i class="bx bx-location-plus"></i>
                    <?php echo $fetch_job['location'] ?>
                  </li>
                  <!-- <li>
                    <i class="bx bx-stopwatch"></i>
                    9 days ago
                  </li> -->
                </ul>
                <span>
                  <?php 
                  if($fetch_job['status'] == 0){
                    echo 'Pending';
                  }else{
                    echo 'Selected for Interview';
                  }
                  ?>
                </span>
              </div>
            </div>
            <div class="col-md-3">
              <div class="theme-btn text-end">
                <form method="post">
                  <button class="default-btn" type="submit" name="delete" value="<?php echo $fetch_job['job_id']; ?>" >Delete</button>
                </form>
                
              </div>
            </div>
          </div>
        </div>

        <?php }  ?> <!-- End Fetch job details -->
      </div>

    </div>
  </div>
</section>
<?php include './components/footer.php'; ?>