<?php include 'components/connect.php';

if (isset($_COOKIE['com_id'])) {
    $com_id = $_COOKIE['com_id'];
} else {
    $com_id = '';
    header('location:company-sign-in.php');
}

?>

<?php include 'components/header.php' ?>

<section class="candidate-style-two pt-100 pb-70">
<h2 style="text-align:center; margin-bottom:25px;">Selected Candidates</h2>
      <div class="container">
        <div class="row">
            <!-- fetch request candidate-details -->
            <?php
            $select_canditae = $conn->prepare("SELECT u_p.*,u.*, p.*, u.image AS u_image FROM user_post u_p INNER JOIN users u ON u_p.u_id = u.id INNER JOIN post p ON u_p.job_id = p.job_id WHERE p.com_id = ? AND u_p.status=? ");
            $select_canditae->execute([$com_id,1]);
            while($fetch_canditate = $select_canditae->fetch(PDO::FETCH_ASSOC)){ ?>

           
          <div class="col-lg-3 col-sm-6">
            <div class="candidate-card">
              <div class="candidate-img">
                <img src="uploaded_files/<?= $fetch_canditate['u_image']; ?>" alt="candidate image" />
              </div>
              <div class="candidate-text">
                <h3>
                  <a href="candidate-details.php?get_id=<?php echo $fetch_canditate['id'] ?>&position=<?php echo $fetch_canditate['title'] ?>&job_id=<?php echo $fetch_canditate['job_id'] ?>"><?php echo $fetch_canditate['name'] ?></a>
                </h3>
                <ul>
                  <li><b>Applied for : </b></li>
                  <li><a href="job-details.php?get_id=<?php echo $fetch_canditate['job_id'] ?>"><?php echo $fetch_canditate['title'] ?></a></li>
                </ul>
              </div>
              <div class="candidate-social">
                <?php 
                if($fetch_canditate['status'] == 0){ ?>
                    <button style="border: 2px solid red; border-radius:10px; padding: 0px 5px; color:#fff; background-color:red">Requested</button>
                <?php }else{ ?>
                    <button style="border: 2px solid green; border-radius:10px; padding: 0px 5px; color:#fff; background-color:green">selected for Interview</button>
                <?php } ?>
                
              </div>
            </div>
          </div>
          <?php } ?><!--End fetch request candidate-details -->
        </div>
      </div>
    </section>
<?php include 'components/footer.php' ?>