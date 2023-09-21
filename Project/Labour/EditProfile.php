<?php
include('SessionValidator.php');
include('Head.php');
include('../Connection/Connection.php');
if(isset($_POST['btn_Submit']))
{
	
	$name = $_POST["txt_name"] ;
	$contact = $_POST["txt_contact"] ;
	$email = $_POST["txt_email"] ;
	$address = $_POST["txt_address"] ;

	$up = "update tbl_labour set labour_name='".$name."',labour_contact='".$contact."',labour_email='".$email."',labour_address='".$address."' where labour_id='".$_SESSION["labourid"]."'";
	
	if($conn->query($up))
	{
		?>
         <script type="text/javascript">
            alert("Updated");
            setTimeout(function(){window.location.href='EditProfile.php'},40);
        </script>
        <?php
	}
	else
	{
		echo "<script>alert('Failed')</script>";
		
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
<h1>Edit Profile</h1>
<br /><br />
<form id="form1" name="form1" method="post" action="">

<?php



$sel="select * from tbl_labour where labour_id='".$_SESSION["labourid"]."'";
$row=$conn->query($sel);
if($data=$row->fetch_assoc())
{
?>
  <table width="200" border="1">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" value="<?php echo $data["labour_name"];?>" id="txt_name" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" value="<?php echo $data["labour_contact"];?>" id="txt_contact" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email"  value="<?php echo $data["labour_email"];?>" id="txt_email" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
    <textarea name="txt_address"  id="txt_address" cols="45" rows="5"><?php echo $data["labour_address"];?></textarea></td>
    
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_Submit" id="btn_Submit" value="Submit" /></td>
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