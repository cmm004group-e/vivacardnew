<?php
include ('config1.php');

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php.php');
}
$sql = "SELECT * FROM user_profile WHERE username = '" . $_SESSION['username'] . "'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result);

// Upload feature
$output_dir = "vivacarduploads/";
$allowedExts = array("jpg", "jpeg", "gif", "png","JPG",);
$extension = @end(explode(".", $_FILES["myfile"]["name"]));
if(isset($_POST['submit']))
{
    $user=$row['username'];
    //Filter the file types , if you want.
    if ((($_FILES["myfile"]["type"] == "image/gif")
            || ($_FILES["myfile"]["type"] == "image/jpeg")
            || ($_FILES["myfile"]["type"] == "image/JPG")
            || ($_FILES["myfile"]["type"] == "image/png")
            || ($_FILES["myfile"]["type"] == "image/pjpeg"))
        && ($_FILES["myfile"]["size"] < 10000000)
        && in_array($extension, $allowedExts))
    {
        if ($_FILES["myfile"]["error"] > 0)
        {
            echo "Return Code: " . $_FILES["myfile"]["error"] . "<br>";
        }
        if (file_exists($output_dir. $_FILES["myfile"]["name"]))
        {
            unlink($output_dir. $_FILES["myfile"]["name"]);
        }
        else
        {
            $pic=$_FILES["myfile"]["name"];
            $conv=explode(".",$pic);
            $ext=$conv['1'];

            //move the uploaded file to uploads folder;
            move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$user.".".$ext);

            $pics=$output_dir.$user.".".$ext;


            $url=$user.".".$ext;

            $update="update user_profile set profile_picture='$url' where username='$user'";

            if($db->query($update)){
                echo '<div data-alert class="alert-box success radius">';
                echo  '<b>Success !</b>  Image Updated' ;
                echo  '<a href="#" class="close">&times;</a>';
                echo '</div>';
                header('refresh:2;url=dashboard.php');
            }
            else{
                echo '<div data-alert class="alert-box alert radius">';
                echo  '<b>Error !</b> ' .$db->error ;
                echo  '<a href="#" class="close">&times;</a>';
                echo '</div>';
            }



        }

    }
    else{

        echo '<div data-alert class="alert-box warning radius">';
        echo  '<b>Warning !</b>  File not Uploaded, Check image' ;
        echo  '<a href="#" class="close">&times;</a>';
        echo '</div>';

    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>dashboard</title>
    <link rel="stylesheet" href="assets/css/colours.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>

<body>
<div class="container-fluid">
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
    <body>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        Upload a File:
        <input type="file" name="myfile" id="fileToUpload">
        <input type="submit" name="submit" value="Upload File Now" >
    </form>
    </body>


    <!---Footer start--->
    <div style="margin-top: 400px" class="container-fluid text-center">
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
</html>

