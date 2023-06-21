<?php include './components/connect.php';

/* company */
if (isset($_COOKIE['com_id'])) {
    $com_id = $_COOKIE['com_id'];
} else {
    $com_id = '';
    header('location:company-sign-in.php');
}


/* Post job form */
if (isset($_POST['submit'])) {

    $job_id = unique_id();
    $title = $_POST['title'];
    $title = filter_var($title, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $job_type = $_POST['job_type'];
    $job_type = filter_var($job_type, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $apply_before = $_POST['apply_before'];
    $apply_before = filter_var($apply_before, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $description = $_POST['description'];
    $description = filter_var($description, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $requirements = $_POST['requirements'];
    $requirements = filter_var($requirements, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$_POST['salary'] == '') {
        $salary = $_POST['salary'];
        $salary = filter_var($salary, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    } else {
        $salary = "N/A";
        $salary = filter_var($salary, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }


    $image = $_FILES['image']['name'];
    $image = filter_var($image, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if (!$image == '') {
        $ext = pathinfo($image, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $rename = unique_id() . '.' . $ext;
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = 'uploaded_files/' . $rename;
    } else {
        $rename = "com_logo";
    }

    $insert_post = $conn->prepare("INSERT INTO `post`(job_id, title, job_type, apply_before, image, description, requirements,salary,com_id) VALUES(?,?,?,?,?,?,?,?,?)");
    $insert_post->execute([$job_id, $title, $job_type, $apply_before, $rename, $description, $requirements, $salary, $com_id]);

    if (!$image == '') {
        move_uploaded_file($image_tmp_name, $image_folder);
    }



    header('location:company-profile.php');

}

?>
<?php include 'components/header.php'; ?>


<!--Starts post job form -->

<div class="job-post ptb-100">
    <div class="container">
        <form class="job-post-from" method="post" enctype="multipart/form-data">
            <h2>Fill Up Job Advertisment information</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Job Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInput1"
                            placeholder="Job Title or Keyword" required />
                    </div>
                </div>





                <div class="col-md-6">
                    <div class="form-group">
                        <label>Job Type</label>
                        <select name="job_type" class="category">
                            <option data-display="Job Type">Job Type</option>
                            <option value="Full Time">Full Time</option>
                            <option value="Part Time">Part Time</option>
                            <option value="Freelancer">Freelancer</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Salary (Optional)</label>
                        <input type="number" name="salary" class="form-control" id="exampleInput7"
                            placeholder="e.g. Rs.20,000" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Apply Before</label>
                        <input type="date" name="apply_before" class="form-control" id="exampleInput1"
                            placeholder="Job Title or Keyword" required />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Select image (Optional)</label>
                        <input type="file" name="image" class="form-control" id="exampleInput8" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Job Description</label>
                        <textarea name="description" class="form-control description-area"
                            id="exampleFormControlTextarea1" rows="6" placeholder="Job Description" required></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Job Requirements</label>
                        <textarea name="requirements" class="form-control description-area"
                            id="exampleFormControlTextarea1" rows="6" placeholder="Job Requirements"
                            required></textarea>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" name="submit" class="post-btn">Post A Job</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!--Ends post job form -->
<?php include 'components/footer.php' ?>