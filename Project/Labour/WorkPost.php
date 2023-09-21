<?php
include('SessionValidator.php');
include('Head.php');
include('../Connection/Connection.php');
if(isset($_POST["btn_post"]))
{
	$detail = $_POST["txt_details"];
	
	$ins = "insert into tbl_workpost(workpost_details,workpost_date,labour_id,workpost_amount)values('".$detail."',curdate(),'".$_SESSION["labourid"]."','".$_POST["txt_amount"]."')";
	if($conn->query($ins))
	{
		?>
		<script>
			window.location="WorkPost.php";
			</script>
		<?php
	}
	else
	{
		echo "<script>alert('Failed')</script>";
	}
	
}

if(isset($_GET["did"]))
{
	$del = "delete from tbl_workpost where workpost_id = '".$_GET["did"]."'";
	if($conn->query($del))
	{
		?>
		<script>
			window.location="WorkPost.php";
			</script>
		<?php	}
	else
	{
		echo "<script>alert('Failed')</script>";
	}
	
}
if(isset($_GET["aid"]))
{
	$a = "update tbl_workpost set workpost_status='2' where workpost_id='".$_GET["aid"]."'";
	if($conn->query($a))
	{
		?>
		<script>
			window.location="WorkPost.php";
			</script>
		<?php	}
	else
	{
		echo "<script>alert('Failed')</script>";
	}
	
}
if(isset($_GET["rid"]))
{
	$r = "update tbl_workpost set workpost_status='3' where workpost_id='".$_GET["rid"]."'";
	if($conn->query($r))
	{
		?>
		<script>
			window.location="WorkPost.php";
			</script>
		<?php	}
	else
	{
		echo "<script>alert('Failed')</script>";
	}
	
}
if(isset($_GET["fid"]))
{
	$f = "update tbl_workpost set workpost_status='4' where workpost_id='".$_GET["fid"]."'";
	if($conn->query($f))
	{
		?>
		<script>
			window.location="WorkPost.php";
			</script>
		<?php	}
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
<h1>Work Post</h1>
<br /><br />
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Amount</td>
      <td><input type="number" name="txt_amount"/></td>
    </tr>
    <tr>
      <td>Details</td>
      <td><label for="txt_details"></label>
      <textarea name="txt_details" id="txt_details" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_post" id="btn_post" value="Post" />
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table>
    <tr>
      <th>Sl.No</th>
      <th>Date</th>
      <th>Details</th>
      <th>Amount</th>
      <th>Action</th>
    </tr>
   <?php
   
   $i = 0;
   $sel = "select * from tbl_workpost where labour_id='".$_SESSION["labourid"]."' ORDER BY workpost_id DESC ";
   $row = $conn->query($sel);
   while($data = $row->fetch_assoc())
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
			
			if($data["workpost_status"]=="0")
			{
				?>
                <a href="WorkPost.php?did=<?php echo $data["workpost_id"]; ?>">Delete</a>
                <?php
			}
			else if($data["workpost_status"]=="1")
			{
				?>
                	<a href="WorkPost.php?aid=<?php echo $data["workpost_id"]; ?>">Accept</a>
                    <a href="WorkPost.php?rid=<?php echo $data["workpost_id"]; ?>">Reject</a>
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
                	Payment Pending
                <?php
			}
			else if($data["workpost_status"]=="5")
			{
				?>
                	Completed
                <?php
			}
			else if($data["workpost_status"]=="2")
			{
				$selU = "select * from tbl_user where user_id = '".$data["user_id"]."'";
				$rowU = $conn->query($selU);
				$datU = $rowU->fetch_assoc();
				?>
                	<a href="tel:<?php echo $datU["user_contact"];?>">Contact</a> | 
                    <a href="WorkPost.php?fid=<?php echo $data["workpost_id"]; ?>">Finish</a>
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