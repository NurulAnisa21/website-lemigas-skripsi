<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Admin</title>
<link rel="stylesheet" href="../css/dash.css" />

</head>
<body>
	<?php 
	session_start();
	include '../config.php';
	?>
    
	<div class="container">
    	<form method="post"><br />
        <h1><center> Dashboard Login Admin </center></h1><br />
        	<div class="form-input">
            	<input type="text" name="username" placeholder="Input username">
            </div>
            <div class="form-input">
            	<input type="password" name="password" placeholder="Input Password">
            </div>
            
            <input type="submit" name="login" value="Login Here" class="btn-login" />
        </form>

        <?php 
        	if (isset($_POST['login']))
        	{
        		$ambil = $koneksi->query("SELECT * FROM admin WHERE username='$_POST[username]'
        			AND password = '$_POST[password]'");

        		$yangcocok = $ambil->num_rows;
        		if ($yangcocok==1)
        		{
        			$_SESSION['admin']=$ambil->fetch_assoc();
        			echo "<div class='alert alert-info'>login sukses</div>";
        			echo "<meta http-equiv='refresh' content='1;url=index.php'>";
        		}
        		else
        		{
        			echo "<div class='alert alert-danger'>login gagal</div>";
        			echo "<meta http-equiv='refresh' content='1;url=loginadmin.php'>";
        			
        		}
        	} 
        ?>
       
  
    </div>
</body>



</html>
