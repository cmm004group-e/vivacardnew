<?php
include 'config1.php';
if(isset($_POST['save'])){


echo '<div data-alert class="alert-box success radius">';
    echo  '<b>User added Successfully !!</b> ' ;
    echo  '<a href="#" class="close">&times;</a>';
    echo '</div>';
header('refresh:1;url=dashboard.php');




//  header('Location:dashboard.php');

}

?>