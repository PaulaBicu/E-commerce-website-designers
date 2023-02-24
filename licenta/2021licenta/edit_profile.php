<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bezal.el | skill, ability and knowledge in all kinds of crafts</title>
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include("header.php");
    include("includes/dbh.inc.php");

    $usersId = $_GET['id']; // get id through query string

    $qry = mysqli_query($conn,"SELECT * FROM users WHERE usersId='$usersId'"); // select query
    
    $data = mysqli_fetch_array($qry); // fetch data
    
    if(isset($_POST['update'])) // when click on Update button
{
    $usersName = $_POST['usersName'];
    $usersEmail = $_POST['usersEmail'];
    $usersUid = $_POST['usersUid'];
	
    $edit = mysqli_query($conn,"UPDATE users set usersName='$usersName', usersEmail='$usersEmail', usersUid ='$usersUid' where usersId='$usersId'");
	
    if($edit)
    {
        mysqli_close($conn); // Close connection
        header("location:profile.php");
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}
?>
<div class="container">
<h3>Update Data - Profil</h3>

<form method="POST">
  <input type="text" name="usersName" value="<?php echo $data['usersName'] ?>" placeholder="Enter Full Name" Required>
  <input type="text" name="usersEmail" value="<?php echo $data['usersEmail'] ?>" placeholder="Enter Email" Required>
  <input type="text" name="usersUid" value="<?php echo $data['usersUid'] ?>" placeholder="Enter UID" Required>
  <input type="submit" name="update" value="Update">
</form>
</div>
</body>
</html>


