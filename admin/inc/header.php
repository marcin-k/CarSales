<!--HEADER START-->
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="../_/css/style.css">
<title><?php echo $title;?></title>
<meta name="description" content="<?php echo $description;?>">
</head>
<?php
    //to have it always available
    include 'stickyForm.php';
    $loginAndPasswordAvailable=false;
    if(isset($_POST['username'])&&isset($_POST['pass'])){
        $username = $_POST['username'];
        $password = $_POST['pass'];
        $loginAndPasswordAvailable=true;
    }
?>
<body class="backend">

	<header class="admin">

		<div class="wrap">
			<div class="logo">
                <form action ='index.php' method = "post" enctype = "multipart/form-data">
                    <?php
                    //if user is already logged in place a hidden elements of form
                    if($loginAndPasswordAvailable) {
                        echo "<input name='username' value='$username' hidden>
                              <input name='pass' value='$password' hidden>";
                    } ?>
                    <button type = "submit" name='logged' >
                    				<img src="../app/img/logo.svg" alt="logo" />
                    </button>
                </form>
			</div>

			<div class="right">
                <!-- Brings user to login page-->
					<a href="index.php">Log off</a>
			</div>
		</div>
	</header>
<!--HEADER END-->
