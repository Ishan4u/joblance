<?php include './components/connect.php';

/* user */
if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}

/* company */
if (isset($_COOKIE['com_id'])) {
    $com_id = $_COOKIE['com_id'];
} else {
    $com_id = '';
}


/* fetch all company */
// $select_company = $conn->prepare("SELECT * FROM `company`");
// $select_company->execute();
// $fetch_company = $select_company->fetch(PDO::FETCH_ASSOC);
?>
<?php include './components/header.php'; ?>


<div class="banner-section">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="banner-content text-center">
                    <p>Find Jobs, Employment & Career Opportunities</p>
                    <h1>Drop Resume & Get Your Desire Job!</h1>
                    <form class="banner-form">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Keyword:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="Job Title">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail2">Location:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail2"
                                        placeholder="City or State">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="find-btn">
                                    Find A Job
                                    <i class='bx bx-search'></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <ul class="keyword">
                        <li>Trending Keywords:</li>
                        <li><a href="#">Automotive,</a></li>
                        <li><a href="#">Education,</a></li>
                        <li><a href="#">Health</a></li>
                        <li>and</li>
                        <li><a href="#">Care Engineering</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>





<section class="job-section pb-70">
    <div class="container">
        <div class="section-title text-center">
            <h2>Jobs You May Be Interested In</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                et dolore magna aliqua. Quis ipsum suspendisse ultrices.</p>
        </div>
        <div class="row">

            <?php

            /* fetch all post */
            $select_post = $conn->prepare("SELECT p.*, c.location FROM post p
            INNER JOIN company c ON p.com_id = c.com_id");
            $select_post->execute();
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
                                            <a href="job-details.html">
                                                <?php echo $fetch_post['title']; ?>
                                            </a>
                                        </h3>
                                        <ul>
                                            <!-- <li>Via <a href="#">Tourt Design LTD</a></li> -->
                                            <li>
                                                <i class='bx bx-location-plus'></i>
                                                <?php echo $fetch_post['location']; ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="job-save">
                                        <span>
                                            <?php echo $fetch_post['job_type']; ?>
                                        </span>

                                        <p>
                                            Edit

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
            } ?>
        </div>

    </div>
</section>





<section class="company-section pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <h2>Top Companies</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                et dolore magna aliqua. Quis ipsum suspendisse ultrices.</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="company-card">
                    <div class="company-logo">
                        <a href="job-grid.html">
                            <img src="assets/img/top-company/1.png" alt="company logo">
                        </a>
                    </div>
                    <div class="company-text">
                        <h3>Trophy & Sans</h3>
                        <p>
                            <i class='bx bx-location-plus'></i>
                            Green Lanes, London
                        </p>
                        <a href="job-grid.html" class="company-btn">
                            25 Open Position
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="company-card">
                    <div class="company-logo">
                        <a href="job-grid.html">
                            <img src="assets/img/top-company/2.png" alt="company logo">
                        </a>
                    </div>
                    <div class="company-text">
                        <h3>Trout Design</h3>
                        <p>
                            <i class='bx bx-location-plus'></i>
                            Park Avenue, Mumbai
                        </p>
                        <a href="job-grid.html" class="company-btn">
                            35 Open Position
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="company-card">
                    <div class="company-logo">
                        <a href="job-grid.html">
                            <img src="assets/img/top-company/3.png" alt="company logo">
                        </a>
                    </div>
                    <div class="company-text">
                        <h3>Resland LTD</h3>
                        <p>
                            <i class='bx bx-location-plus'></i>
                            Betas Quence, London
                        </p>
                        <a href="job-grid.html" class="company-btn">
                            20 Open Position
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="company-card">
                    <div class="company-logo">
                        <a href="job-grid.html">
                            <img src="assets/img/top-company/4.png" alt="company logo">
                        </a>
                    </div>
                    <div class="company-text">
                        <h3>Lawn Hopper</h3>
                        <p>
                            <i class='bx bx-location-plus'></i>
                            Wellesley Rd, London
                        </p>
                        <a href="job-grid.html" class="company-btn">
                            45 Open Position
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<?php include './components/footer.php'; ?>