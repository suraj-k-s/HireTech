<?php
include('SessionValidator.php');
include('Head.php');
include('../Connection/Connection.php');
if(isset($_POST['btn_save']))
{
	
	
	
	$currentPassword=$_POST["txt_password"];
	$newPassword=$_POST["txt_newpassword"];
	$rePassword=$_POST["txt_repassword"];
	
	$sel="select * from tbl_user where user_id='".$_SESSION["userid"]."'";
	$row=$conn->query($sel);
	$data=$row->fetch_assoc();
	$dbPassword = $data["user_password"];
		
		if($dbPassword==$currentPassword)
		{
				if($newPassword==$rePassword)
				{
					$up="update tbl_user set user_password='".$newPassword."' where user_id='".$_SESSION["userid"]."'";
					 $conn->query($up);
				
					if($conn->query($up))
					{
					echo "<script>alert('Updated')</script>";
					}
				}
				else
				{
					echo "<script>alert('Password Missmatch')</script>";
				}
		}
		else
		{
			echo "<script>alert('Incorrect Current Password')</script>";		
		}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>

<body>
<div align="center" id="tab">
<h1>Change Password</h1>
<br /><br />
<form id="form1" name="form1"  method="post" action="">
  <table width="400" border="1">
    <tr>
      <td>Current Password</td>
      <td><label for="txt_password"></label>
      <input type="text" name="txt_password" id="txt_password" /></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txt_newpassword"></label>
      <input type="text" name="txt_newpassword" id="txt_newpassword" /></td>
    </tr>
    <tr>
      <td>Re-Password</td>
      <td><label for="txt_repassword"></label>
      <input type="text" name="txt_repassword" id="txt_repassword" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_save" id="btn_save" value="save" /></td>
    </tr>
  </table>
</form>
</div>
<?php
include('Foot.php');
?>
</body>
</html>