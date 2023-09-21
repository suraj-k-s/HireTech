<?php
ob_start();
include('../Connection/Connection.php');
include('Head.php');
include('SessionValidator.php');
if(isset($_GET["cid"]))
{
	$a = "update tbl_workpost set workpost_status='0',user_id='0' where workpost_id='".$_GET["cid"]."'";
	if($conn->query($a))
	{
		header("Location:MyBooking.php");
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
<h1>Bookings</h1>
<br><br>
<form id="form1" name="form1" method="post" action="">
  <table width="402" border="1">
    <tr>
      <th width="38">Sl.No</th>
      <th width="90">Date</th>
      <th width="142">Details</th>
      <th width="142">Amount</th>
      <th width="104">Action</th>
    </tr>
   <?php
   
   $i = 0;
   $sel = "select * from tbl_workpost where user_id='".$_SESSION["userid"]."' ORDER BY workpost_id DESC ";
   $row = $conn->query($sel);
   while($data =$row->fetch_assoc())
   {
	   $i++;	
   ?>
   
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data["workpost_date"]; ?></td>
      <td><?php echo $data["workpost_details"]; ?></td>
      <td><?php echo $data["workpost_amount"]; ?></td>
      <td>
      		<?php
			
			if($data["workpost_status"]=="1")
			{
				?>
                <a href="MyBooking.php?cid=<?php echo $data["workpost_id"]; ?>">Cancel</a>
                <?php
			}
			else if($data["workpost_status"]=="3")
			{
				?>
                	Rejected
                <?php
			}
			else if($data["workpost_status"]=="4")
			{
				?>
                	<a href="PaymentGateway.php?pid=&bid=<?php echo $data["workpost_id"]; ?>">Pay Now</a>
                <?php
			}
			else if($data["workpost_status"]=="5")
			{
				?>
                	Completed | <a href="LabourRating.php?lid=<?php echo $data["labour_id"]; ?>">Rate Now</a>
                <?php
			}
			else if($data["workpost_status"]=="2")
			{
				$selU = "select * from tbl_labour where labour_id = '".$data["labour_id"]."'";
				$rowU = $conn->query($selU);
				$datU = $rowU->fetch_assoc();
				?>
                	<a href="tel:<?php echo $datU["labour_contact"];?>">Contact</a>
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
ob_flush();
?>
</body>
</html>