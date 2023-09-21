<?php
include('SessionValidator.php');
include('Head.php');
include('../Connection/Connection.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>

<body>
<div align="center" id="tab">
<h1>My Profile</h1>
<form id="form1" name="form1" method="post" action="">
<?php

$sel="select * from tbl_labour where labour_id='".$_SESSION["labourid"]."'";
$row=$conn->query($sel);
if($data=$row->fetch_assoc())
{
?>
  <table width="360" border="1">
    <tr>
      <td width="156">Name</td>
      <td width="188"><?php echo $data["labour_name"];?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data["labour_contact"];?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $data["labour_email"];?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="Address"></label><?php echo $data["labour_address"];?></td>
    </tr>
    <tr>
      <td><a href="EditProfile.php">Edit Profile</a></td>
      <td><a href="ChangePassword.php">Change Password</a></td>
    </tr>
  </table>
    <?php
		
	}
   
   ?>
</form>
</div>
<?php
include('Foot.php');
?>
</body>
</html>