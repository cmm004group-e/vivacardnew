<?php
include_once 'config1.php';
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";

}
$username=$_SESSION['username'];
$sql = "SELECT * FROM contacts WHERE myusername = '" . $_SESSION['username'] . "'";
$result = mysqli_query($db,$sql);
$r = mysqli_fetch_array($result);
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>View contacts</title>
    <link rel="stylesheet" href="assets/css/colours.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</head>
<body>
<!--- Header --->   <!--- Header --->
<header>
    <nav class="navbar navbar-inverse" style="width: 1400px">
        <div class="container-fluid" >
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
<div align="center" style="width: 1400px">
    <div style="  border: solid 1px #006D9C; " align="center">
        <?php
        if(isset($errMsg)){
            echo '<div style="color:green;text-align:center;font-size:17px;">'.$errMsg.'</div>';
        }
        ?>
        <section class="main-container">
            <div style="background-color:grey; color:#FFFFFF; padding:10px;"><h3>View Contacts</h3></div>
            <div style="margin: 15px">
<div class="container" >
	<div class="row">
		<table width="200px" class="table">
			<tr>

				<th>Full Name</th>
				<th>E-Mail</th>
				<th>Job Title</th>
				<th>Company</th>
                <th>Job Desc</th>
                <th>Telephone</th>
                <th>Linkedin</th>
                <th>Twitter</th>
                <th>Instagram</th>
                <th >Facebook</th>

            </tr>
			<?php  $username=$r['myusername'];
            $sql="SELECT * FROM contacts where myusername='$username'";
            $result_set=mysqli_query($db,$sql);
            while($r=mysqli_fetch_array($result_set))
            {
            ?>
			<tr>
				<td><?php echo $r['c_firstname'] . " " . $r['c_lastname']; ?></td>
				<td><?php echo $r['c_email']; ?></td>
				<td><?php echo $r['c_jobtitle']; ?></td>
				<td><?php echo $r['c_company']; ?></td>
                <td><?php echo $r['c_jobdescription']; ?></td>
                <td><?php echo $r['c_telephone']; ?></td>
                <td><?php echo $r['c_linkedin']; ?></td>
                <td><?php echo $r['c_twitter']; ?></td>
                <td><?php echo $r['c_instagram']; ?></td>
                <td style="width: 10px"><?php echo $r['c_facebook']; ?></td>

			</tr>
            <?php
                        }
                        ?>
		</table>
	</div>
</div>
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
                                            <img src="/assets/Images/email.png" class="img-thumbnail img-responsive" width="30px" height="20px"></a>
                                        <a href="#">
                                            <img src="/assets/Images/facebook.png" class="img-thumbnail img-responsive" width="30px" height="20px"></a>
                                        <a href="#">
                                            <img src="/assets/Images/twitter.png" class="img-thumbnail img-responsive" width="30px" height="20px"></a>
                                        <a href="#">
                                            <img src="/assets/Images/github.png" class="img-thumbnail img-responsive" width="30px" height="20px"></a>

                                    </center> </h6>
                            </address>
                        </div>
                    </footer>
                </div>
                <!---Footer end--->
</body>
</html>