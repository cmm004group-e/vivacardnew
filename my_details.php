<?php

include 'config1.php';

//   $db=mysqli_connect('localhost','root','','db_group_e_cm004');
$user = $_GET['user']; // sanitize is not a function, just implying that data is insecure and requires to be santized through whatever method you choose.
$details = "SELECT * FROM user_profile WHERE username='$user'";
$stmt=mysqli_query($db,$details);
$row=mysqli_fetch_array($stmt);

$firstname=$row['firstname'];
$lastname=$row['lastname'];
$email=$row['email'];
$jobtitle=$row['jobtitle'];
$company=$row['company'];
$jobdesc=$row['job_desc'];
$telephone=$row['telephone'];
$linkedin=$row['linkedin'];
$instagram=$row['instagram'];
$twitter=$row['twitter'];
$facebook=$row['facebook'];


    $username = $_SESSION['username']; ///Verifying the logged in user
    //  $query = mysqli_query($con, "INSERT INTO contacts VALUES( )
if ($row) {

$query = "SELECT * FROM contacts WHERE myusername = '$username'AND username_contact ='$user'" ;
$result = mysqli_query($db, $query);
$count = mysqli_num_rows($result);
if ($count >=1) {

}
else {

    $sql = "INSERT INTO contacts (myusername, c_firstname, c_lastname,c_email, c_jobtitle,c_company,c_jobdescription,c_telephone,c_linkedin, c_facebook, c_twitter, c_instagram,username_contact) VALUES ('$username','$firstname','$lastname','$email', '$jobtitle', '$company','$jobdesc','$telephone', '$linkedin', '$facebook', '$twitter','$instagram','$user')";
    $result = mysqli_query($db, $sql);
}
}
$firstname=$row['firstname'];
$lastname=$row['lastname'];
$email=$row['email'];
$jobtitle=$row['jobtitle'];
$company=$row['company'];
$jobdesc=$row['job_desc'];
$telephone=$row['telephone'];
$linkedin=$row['linkedin'];
$instagram=$row['instagram'];
$twitter=$row['twitter'];
$facebook=$row['facebook'];


//  header('Location:dashboard.php');

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Your profile</title>
    <link rel="stylesheet" href="assets/css/colours.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/card.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">


</head>

<body>
<!--- Header --->
<header>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="active navbar-brand" href="index.php">VIVA CARD</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="dashboard.php">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Support</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>

        </div>
    </nav>
</header>
<!--- Header End--->
<div align="center">
    <div style=" border: solid 1px #006D9C; " align="left">
        <?php
        if(isset($errMsg)){
            echo '<div style="color:green;text-align:center;font-size:17px;">'.$errMsg.'</div>';
        }
        $sql="SELECT * FROM user_profile";
        $result = $db->query($sql);
        ?>

        <!--- Main body start --->
        <section class="main-container" style="height: 480px">
            <h2 style="font-size: 25px;text-transform: capitalize"><?php echo $row['firstname']; ?>'s card</h2>
            <!-- Insert info into page from database --->

            <div class='card' style="width: 450px ; height: 270px">
            <form method="post" action="savecard.php">

                <img class='top-image' src='vivacarduploads/esha.JPG' alt="user photo" title="user photo" ">


                 <p style="font-size: 20px ;  width: 220px" class="logo">VIVA CARD</p>

                <p style="text-transform: capitalize"><?php echo $row['firstname']; ?>  <?php echo $row['lastname']; ?></p>

                <p><?php echo $row['jobtitle']; ?></p>
                <p><?php echo $row['company']; ?></p>

                <p><?php echo $row['telephone']; ?></p>

                <p><a href="mailto:<?php echo $row['email']?>;">
                        <img src="assets/Images/email.png" class="img-thumbnail img-responsive" width="30px" height="20px"></a>

                    <a href="<?php echo $row['linkedin']; ?>">
                        <img src="assets/Images/linkedin.png" class="img-thumbnail img-responsive" width="30px" height="20px"></a>

                    <a href="<?php echo $row['twitter']; ?>">
                        <img src="assets/Images/twitter.png" class="img-thumbnail img-responsive" width="30px" height="20px"></a>

                    <a href="<?php echo $row['instagram']; ?>"><p></p>
                <img src="assets/Images/instagram.png" class="img-thumbnail img-responsive" width="30px" height="20px"></a>

                <a href="<?php echo $row['facebook']; ?>">
                    <img src="assets/Images/facebook.png" class="img-thumbnail img-responsive" width="30px" height="20px"></a></p>
                    <br>
                <input style="background-color: white" type="submit" name='save' value="save" class='submit'>

            </form>
            </div>


    </div>

    <!--- Main body end --->

    <!---Footer start--->
    <div class="container-fluid text-center">
        <footer class=“col-md-12">
            <div class=‘row'>
                <section class="col-md-2">
                    <a href="#"><h6>Meet the team</h6></a>
                </section>
                <section class="col-md-2">
                    <a href="#"><h6>Privacy</h6></a>
                </section>
                <section class="col-md-2">
                    <a href="#"><h6>Sitemap</h6></a>
                </section>
                <section class="col-md-2">
                    <a href="#"><h6>Complaints</h6></a>
                </section>
                <section class="col-md-2">
                    <a href="#"><h6>User Policy</h6></a>
                </section>
                <section class="col-md-2">
                    <address>
                        <a href="mailto:groupe_cmm004@live.rgu.ac.uk"><h6>Contact Information</h6></a>
                    </address>
                </section>
                <address>
                    <h6><center>Visit us at<br>
                            Robert Gordon University, Garthdee House,<br>
                            Garthdee Road, Aberdeen, AB10 7QB, Scotland,<br>
                            UK<br>
                            <a href="mailto:groupe_cmm004@live.rgu.ac.uk">
                                <img src="assets/Images/email.png" class="img-thumbnail img-responsive" width="30px" height="20px"></a>
                            <a href="#">
                                <img src="assets/Images/facebook.png" class="img-thumbnail img-responsive" width="30px" height="20px"></a>
                            <a href="#">
                                <img src="assets/Images/twitter.png" class="img-thumbnail img-responsive" width="30px" height="20px"></a>
                            <a href="#">
                                <img src="assets/Images/github.png" class="img-thumbnail img-responsive" width="30px" height="20px"></a>
                        </center> </h6>
                </address>
            </div>
        </footer>
    </div>
    <!---Footer end--->
</body>
</html>