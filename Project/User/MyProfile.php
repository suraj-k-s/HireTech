<?php
include('SessionValidator.php');
include('../Connection/Connection.php');
include('Head.php');
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
<br><br>
<form id="form1" name="form1" method="post" action="">
<?php

$sel="select * from tbl_user where user_id='".$_SESSION["userid"]."'";
$row=$conn->query($sel);
if($data=$row->fetch_assoc())
{
?>

  <table width="200" border="1">
    <tr>
      <td width="86">Name</td>
      <td width="98"><?php echo $data["user_name"];?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data["user_contact"];?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $data["user_email"];?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label><?php echo $data["user_address"];?></td>
    </tr>
  </table>
   <?php
  
  }
  
  ?>
</form>
<?php
include('Foot.php');
?>
</body>
</html>