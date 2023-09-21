<?php
include('SessionValidator.php');
include('Head.php');
include('../Connection/Connection.php');


if(isset($_GET["aid"]))
{
	$a = "update tbl_workrequest set workrequest_status='1' where workrequest_id='".$_GET["aid"]."'";
	if($conn->query($a))
	{
		?>
		<script>
			window.location="WorkRequest.php";
			</script>
		<?php
	}
	else
	{
		echo "<script>alert('Failed')</script>";
	}
	
}
if(isset($_GET["rid"]))
{
	$r = "update tbl_workrequest set workrequest_status='2' where workrequest_id='".$_GET["rid"]."'";
	if($conn->query($r))
	{
		?>
		<script>
			window.location="WorkRequest.php";
			</script>
		<?php
	}
	else
	{
		echo "<script>alert('Failed')</script>";
	}
	
}
if(isset($_GET["fid"]))
{
	$f = "update tbl_workrequest set workrequest_status='3' where workrequest_id='".$_GET["fid"]."'";
	if($conn->query($f))
	{
		?>
		<script>
			window.location="WorkRequest.php";
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
<form id="form1" name="form1" method="post" action="">
  <p>&nbsp;</p>
  <table width="402" border="1">
    <tr>
      <th width="38">Sl.No</th>
      <th width="90">Date</th>
      <th width="142">Details</th>
      <th width="142">Amount</th>
       <th width="142">Name Of user</th>
      <th width="142">Contact Info</th>
      <th width="104">Action</th>
    </tr>
   <?php
   
   $i = 0;
    $sel = "select * from tbl_workrequest  w  inner join tbl_user u on u.user_id=w.user_id where w.labour_id='".$_SESSION["labourid"]."' ORDER BY workrequest_id DESC ";
   $row = $conn->query($sel);
   while($data = $row->fetch_assoc())
   {
	   $i++;	
   ?>
   
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data["workrequest_date"]; ?></td>
      <td><?php echo $data["workrequest_details"]; ?></td>
      <td><?php echo $data["workrequest_amount"]; ?></td>
        <td><?php echo $data["user_name"]; ?></td>
          <td><?php echo $data["user_contact"]; ?></td>
      <td>
      		<?php
			
			 if($data["workrequest_status"]=="0")
			{
				?>
                	<a href="WorkRequest.php?aid=<?php echo $data["workrequest_id"]; ?>">Accept</a>
                    <a href="WorkRequest.php?rid=<?php echo $data["workrequest_id"]; ?>">Reject</a>
                <?php
			}
			else if($data["workrequest_status"]=="2")
			{
				?>
                	Rejected
                <?php
			}
			else if($data["workrequest_status"]=="3")
			{
				?>
                	Payment Pending
                <?php
			}
			else if($data["workrequest_status"]=="4")
			{
				?>
                	Completed
                <?php
			}
			else if($data["workrequest_status"]=="1")
			{
				$selU = "select * from tbl_user where user_id = '".$data["user_id"]."'";
				$rowU = $conn->query($selU);
				$datU = $rowU->fetch_assoc();
				?>
                	<a href="tel:<?php echo $datU["user_contact"];?>">Contact</a> | 
                    <a href="WorkRequest.php?fid=<?php echo $data["workrequest_id"]; ?>">Finish</a>
                <?php
			}
			
			
			?>
      </td>
    </tr>
   
   <?php
   }
   ?>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</div>
<?php
include('Foot.php');
?>
</body>
</html>