<?php include './components/connect.php'; 

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}

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
            <div class="col-sm-6">
                <div class="job-card">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="thumb-img">
                                <a href="job-details.html">
                                    <img src="assets/img/company-logo/1.png" alt="company logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="job-info">
                                <h3>
                                    <a href="job-details.html">Post-Room Operate</a>
                                </h3>
                                <ul>
                                    <li>Via <a href="#">Tourt Design LTD</a></li>
                                    <li>
                                        <i class='bx bx-location-plus'></i>
                                        Wellesley Rd, London
                                    </li>
                                    <li>
                                        <i class='bx bx-filter-alt'></i>
                                        Accountancy
                                    </li>
                                    <li>
                                        <i class='bx bx-briefcase'></i>
                                        Freelance
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="job-save">
                                <span>Full Time</span>
                                <a href="#">
                                    <i class='bx bx-heart'></i>
                                </a>
                                <p>
                                    <i class='bx bx-stopwatch'></i>
                                    1 Hr Ago
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="job-card">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="thumb-img">
                                <a href="job-details.html">
                                    <img src="assets/img/company-logo/2.png" alt="company logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="job-info">
                                <h3>
                                    <a href="job-details.html">Data Entry</a>
                                </h3>
                                <ul>
                                    <li>Via <a href="#">Techno Inc.</a></li>
                                    <li>
                                        <i class='bx bx-location-plus'></i>
                                        Street 40/A, London
                                    </li>
                                    <li>
                                        <i class='bx bx-filter-alt'></i>
                                        Data Entry
                                    </li>
                                    <li>
                                        <i class='bx bx-briefcase'></i>
                                        Freelance
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="job-save">
                                <a href="#">
                                    <i class='bx bx-heart'></i>
                                </a>
                                <p>
                                    <i class='bx bx-stopwatch'></i>
                                    3 Hr Ago
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="job-card">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="thumb-img">
                                <a href="job-details.html">
                                    <img src="assets/img/company-logo/3.png" alt="company logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="job-info">
                                <h3>
                                    <a href="job-details.html">Graphic Designer</a>
                                </h3>
                                <ul>
                                    <li>Via <a href="#">Devon Design</a></li>
                                    <li>
                                        <i class='bx bx-location-plus'></i>
                                        West Sight, USA
                                    </li>
                                    <li>
                                        <i class='bx bx-filter-alt'></i>
                                        Graphics
                                    </li>
                                    <li>
                                        <i class='bx bx-briefcase'></i>
                                        Freelance
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="job-save">
                                <a href="#">
                                    <i class='bx bx-heart'></i>
                                </a>
                                <p>
                                    <i class='bx bx-stopwatch'></i>
                                    4 Hr Ago
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="job-card">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="thumb-img">
                                <a href="job-details.html">
                                    <img src="assets/img/company-logo/4.png" alt="company logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="job-info">
                                <h3>
                                    <a href="job-details.html">Web Developer</a>
                                </h3>
                                <ul>
                                    <li>Via <a href="#">MegaNews</a></li>
                                    <li>
                                        <i class='bx bx-location-plus'></i>
                                        San Francisco, California
                                    </li>
                                    <li>
                                        <i class='bx bx-filter-alt'></i>
                                        Development
                                    </li>
                                    <li>
                                        <i class='bx bx-briefcase'></i>
                                        Freelance
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="job-save">
                                <a href="#">
                                    <i class='bx bx-heart'></i>
                                </a>
                                <p>
                                    <i class='bx bx-stopwatch'></i>
                                    5 Hr Ago
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="job-card">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="thumb-img">
                                <a href="job-details.html">
                                    <img src="assets/img/company-logo/5.png" alt="company logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="job-info">
                                <h3>
                                    <a href="job-details.html">Digital Marketor</a>
                                </h3>
                                <ul>
                                    <li>Via <a href="#">AB Marketer LTD</a></li>
                                    <li>
                                        <i class='bx bx-location-plus'></i>
                                        Wellesley Rd, London
                                    </li>
                                    <li>
                                        <i class='bx bx-filter-alt'></i>
                                        Marketing
                                    </li>
                                    <li>
                                        <i class='bx bx-briefcase'></i>
                                        Freelance
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="job-save">
                                <a href="#">
                                    <i class='bx bx-heart'></i>
                                </a>
                                <p>
                                    <i class='bx bx-stopwatch'></i>
                                    6 Hr Ago
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="job-card">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="thumb-img">
                                <a href="job-details.html">
                                    <img src="assets/img/company-logo/6.png" alt="company logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="job-info">
                                <h3>
                                    <a href="job-details.html">UI/UX Designer</a>
                                </h3>
                                <ul>
                                    <li>Via <a href="#">Design Hunter</a></li>
                                    <li>
                                        <i class='bx bx-location-plus'></i>
                                        Zoo Rd, London
                                    </li>
                                    <li>
                                        <i class='bx bx-filter-alt'></i>
                                        Accountancy
                                    </li>
                                    <li>
                                        <i class='bx bx-briefcase'></i>
                                        Freelance
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="job-save">
                                <a href="#">
                                    <i class='bx bx-heart'></i>
                                </a>
                                <p>
                                    <i class='bx bx-stopwatch'></i>
                                    8 Hr Ago
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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