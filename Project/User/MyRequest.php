<?php
include('../Connection/Connection.php');
include('SessionValidator.php');

if(isset($_GET["did"]))
{
	$del = "delete from tbl_workrequest where workrequest_id = '".$_GET["did"]."'";
	if($conn->query($del))
	{
		header("Location:MyRequest.php");
	}
	else
	{
		echo "<script>alert('Failed')</script>";
	}
	
}

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
<h1>Requests</h1>
<form id="form1" name="form1" method="post" action="">
  <p>&nbsp;</p>
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
   $sel = "select * from tbl_workrequest where user_id='".$_SESSION["userid"]."' ORDER BY workrequest_id DESC ";

   $row = $conn->query($sel);
   while($data =$row->fetch_assoc())
   {
	   $i++;	
   ?>
   
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data["workrequest_date"]; ?></td>
      <td><?php echo $data["workrequest_details"]; ?></td>
      <td><?php echo $data["workrequest_amount"]; ?></td>
      <td>
      		<?php
			
			if($data["workrequest_status"]=="0")
			{
				?>
                <a href="MyRequest.php?did=<?php echo $data["workrequest_id"]; ?>">Delete</a>
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
                	<a href="PaymentGateway.php?bid=&pid=<?php echo $data["workrequest_id"]; ?>">Pay Now</a>
                <?php
			}
			else if($data["workrequest_status"]=="4")
			{
				?>
                	Completed | <a href="LabourRating.php?lid=<?php echo $data["labour_id"]; ?>">Rate Now</a>
                <?php
			}
			else if($data["workrequest_status"]=="1")
			{
				$selU = "select * from tbl_user where user_id = '".$data["user_id"]."'";
				$rowU = $conn->query($selU);
				$datU = $rowU->fetch_assoc();
				?>
                	<a href="tel:<?php echo $datU["user_contact"];?>">Contact</a>
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