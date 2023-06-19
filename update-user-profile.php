<?php include './components/connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
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
    
    $skill = $_POST['skill'];
    $education = $_POST['education'];
    $experience = $_POST['experience'];
    $about = $_POST['about'];
  
    $insert_cv = $conn->prepare("UPDATE `cv` SET skill = ?, education = ?, experience = ?, about = ? WHERE c_id = ?");
    $insert_cv->execute([$skill, $education, $experience, $about, $get_id]);
    
    header('location:user-profile.php');
  }

?>

<?php include './components/header.php'; ?>

<!-- Fetch data from database -->
<?php
$select_cv = $conn->prepare("SELECT * FROM `cv` WHERE c_id = ?");
$select_cv->execute([$get_id]);
if ($select_cv->rowCount() > 0) {
    while ($fetch_cv = $select_cv->fetch(PDO::FETCH_ASSOC)) { ?>
        


        <div class="candidate-info-text">
            <form class="job-post-from" method="post">
                <h2>Update Your information</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Skills</label>
                            <input name="skill" value="<?= $fetch_cv['skill']; ?>" type="text" class="form-control" id="exampleInput6"
                                placeholder="e.g. web design, graphics design, video editing" required />
                        </div>
                    </div>
                    <!-- <div class="col-md-6">
              <div class="form-group">
                <label>Job Category</label>
                <select class="category">
                  <option data-display="Category">Category</option>
                  <option value="1">Web Development</option>
                  <option value="2">Graphics Design</option>
                  <option value="4">Data Entry</option>
                  <option value="5">Visual Editor</option>
                  <option value="6">Office Assistant</option>
                </select>
              </div>
            </div> -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Education</label>
                            <input name="education" value="<?= $fetch_cv['education']; ?>" type="text" class="form-control" id="exampleInput2" placeholder="Education"
                                required />
                        </div>
                    </div>



                    <!-- <div class="col-md-6">
              <div class="form-group">
                <label>Job Type</label>
                <select class="category">
                  <option data-display="Job Type">Job Type</option>
                  <option value="1">Full Time</option>
                  <option value="2">Part Time</option>
                  <option value="4">Freelancer</option>
                </select>
              </div>
            </div> -->
                    <!-- <div class="col-md-6">
              <div class="form-group">
                <label>Job Tags</label>
                <input
                  type="text"
                  class="form-control"
                  id="exampleInput6"
                  placeholder="e.g. web design, graphics design, video editing"
                  required
                />
              </div>
            </div> -->
                    <!-- <div class="col-md-6">
              <div class="form-group">
                <label>Salary (Optional)</label>
                <input
                  type="number"
                  class="form-control"
                  id="exampleInput7"
                  placeholder="e.g. $20,000"
                />
              </div>
            </div> -->

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Experience</label>
                            <textarea name="experience"  class="form-control description-area" id="exampleFormControlTextarea1"
                                rows="6" placeholder="Write About Experience" required><?= $fetch_cv['experience']; ?></textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">About your self</label>
                            <textarea name="about" class="form-control description-area" id="exampleFormControlTextarea1"
                                rows="6" placeholder="Write About Your Self" required><?= $fetch_cv['about']; ?></textarea>
                        </div>
                    </div>

                    <div class="col-md-12 text-center">
                        <button type="submit" name="update" class="post-btn">update</button>
                    </div>
                </div>
            </form>
        </div>

    <?php }
}
?>


<?php include './components/footer.php'; ?>