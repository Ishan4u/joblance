<?php include './components/connect.php';

if (isset($_COOKIE['user_id'])) {
  $user_id = $_COOKIE['user_id'];
} else {
  $user_id = '';
  header('location:user-sign-in.php');
}

?>

<?php include './components/header.php'; ?>

<?php
$select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
$select_user->execute([$user_id]);
$fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);

/* fillup form */
if (isset($_POST['save'])) {
  $c_id = uniqid();
  $skill = $_POST['skill'];
  $education = $_POST['education'];
  $experience = $_POST['experience'];
  $about = $_POST['about'];

  $insert_cv = $conn->prepare("INSERT INTO `cv`(c_id, skill, education, experience, about,user_id) VALUES(?,?,?,?,?,?)");
  $insert_cv->execute([$c_id, $skill, $education, $experience, $about, $user_id]);
  // Redirect to the same page after processing the form
  // header('Location: ' . $_SERVER['PHP_SELF']);
  // exit();
}
?>

<section class="candidate-details pt-100 pb-100">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="candidate-profile">
          <img src="uploaded_files/<?= $fetch_user['image']; ?>" alt="candidate image" />
          <h3>
            <?php echo $fetch_user['name']; ?>
          </h3>
          <p><?php echo $fetch_user['profession']; ?></p>
          <ul>
            <li>
              <a href="tel:+100230342">
                <i class="bx bxs-phone"></i>
                <?php echo $fetch_user['contact']; ?>
              </a>
            </li>
            <li>
              <a href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#5d373235331d3a303c3431733e3230">
                <i class="bx bxs-location-plus"></i>
                <span class="__cf_email__" data-cfemail="375d585f5977505a565e5b1954585a">
                  <?php echo $fetch_user['email']; ?>
                </span>
              </a>
            </li>
          </ul>
          <div class="candidate-social">
            <a href="#" target="_blank"><i class="bx bxl-facebook"></i></a>
            <a href="#" target="_blank"><i class="bx bxl-twitter"></i></a>
            <a href="#" target="_blank"><i class="bx bxl-linkedin"></i></a>
          </div>

          <div class="candidate-social">
            <a href="update-user.php?get_id=<?= $fetch_user['id']; ?>" >Edit</a>
            
          </div>
        </div>
      </div>
      <div class="col-lg-8">

        <?php
        $select_cv = $conn->prepare("SELECT * FROM `cv` WHERE user_id = ?");
        $select_cv->execute([$user_id]);
        $fetch_cv = $select_cv->fetch(PDO::FETCH_ASSOC);

        if ($select_cv->rowCount() > 0) { ?>

          <div class="candidate-info-text">
            <h3>About Me</h3>
            <p>
              <?php echo $fetch_cv['about']; ?>
            </p>
          </div>
          <div class="candidate-info-text candidate-education">
            <h3>Education</h3>
            <div class="education-info">
              <h4>
                <?php echo $fetch_cv['education'] ?>
              </h4>
              <!-- <p>Princeton University, USA</p> -->
              <!-- <span>2012-2016</span> -->
            </div>
          </div>
          <div class="candidate-info-text candidate-experience">
            <h3>Experience</h3>
            <?php echo $fetch_cv['experience'] ?>
            <!-- <ul>
              <li>
                Proficient in HTML, CSS, Server-Scripting, C/C++, and Oracle
              </li>
              <li>Experience with SEO</li>
              <li>Experience Teaching Web Development</li>
              <li>Knowledgeable in Online Advertising</li>
              <li>Expert in LAMP Web Service Stacks</li>
            </ul> -->
          </div>
          <div class="candidate-info-text candidate-skill">
            <h3>Skills</h3>
            <?php echo $fetch_cv['skill'] ?>
            <!-- <ul>
              <li>HTMl</li>
              <li>CSS</li>
              <li>JS</li>
              <li>PHP</li>
              <li>Oracle</li>
              <li>C/C++</li>
              <li>SQL</li>
              <li>Ruby</li>
            </ul> -->
          </div>

          <div class="candidate-info-text text-center">
            <div class="theme-btn">
              <a href="update-user-profile.php?get_id=<?= $fetch_cv['c_id']; ?>" class="default-btn">Edit Info</a>
            </div>
          </div>

        <?php } else { ?>

          <!-- fillup form -->
          <div class="candidate-info-text">
            <form class="job-post-from" method="post">
              <h2>Fill Up Your information</h2>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Skills</label>
                    <input name="skill" type="text" class="form-control" id="exampleInput6"
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
                    <input name="education" type="text" class="form-control" id="exampleInput2" placeholder="Education"
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
                    <textarea name="experience" class="form-control description-area" id="exampleFormControlTextarea1"
                      rows="6" placeholder="Write About Experience" required></textarea>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">About your self</label>
                    <textarea name="about" class="form-control description-area" id="exampleFormControlTextarea1" rows="6"
                      placeholder="Write About Your Self" required></textarea>
                  </div>
                </div>

                <div class="col-md-12 text-center">
                  <button type="submit" name="save" class="post-btn">Save</button>
                </div>
              </div>
            </form>
          </div>

          <!-- Sweet Alert -->
          <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
          <script>
            Swal.fire({
              icon: 'success',
              title: 'Please fill your information',
              showConfirmButton: true,
              showCloseButton: true,
              // text: 'Something went wrong!',
              // footer: '<a class="inline-btn" href="login.php">Login</a>'
            })
          </script>

          <!-- Sweet alert End -->

        <?php } ?>



      </div>
    </div>
  </div>
</section>
<?php include './components/footer.php'; ?>