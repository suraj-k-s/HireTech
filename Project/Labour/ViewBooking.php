<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>VIEWBOOKING</title>
</head>

<body>
<?php
include('../Connection/Connection.php');
	


		
	if(isset($_GET["acid"]))
	{
		$delQry = "update tbl_booking set booking_status='1' where booking_id='".$_GET["acid"]."'";
		$Conn->query($delQry);
		header("location:ViewBooking.php");
	}
	
	
			
	if(isset($_GET["rejid"]))
	{
		$delQry = "update tbl_booking set booking_status='2' where booking_id='".$_GET["rejid"]."'";
		$Conn->query($delQry);
		header("location:ViewBooking.php");
	}
	
	
	
	
?>

<?php
session_start();
include("Head.php");
	$selQry="select * from tbl_servicebooking b INNER JOIN tbl_user u ON u.user_id=b.user_id INNER JOIN tbl_service s ON s.service_id=b.srvice_id INNER JOIN tbl_labour w on w.labour_id=s.worker_id INNER JOIN tbl_place p on p.place_id=w.place_id INNER JOIN tbl_district d on d.district_id=p.district_id where w.labour_id='".$_SESSION["labourid"]."' ";
	echo $selQry;
	$row=$conn->query($selQry);
	
	
?>
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10">
    <tr>
      <td ><p>User Name</p></td>
      <td >Service Name</td>
      <td >Booking Date</td>
      <td >Booked Date</td>
      <td >User Address</td>
      <td >User Contact</td>
      <td >User Photo</td>
      <td >User District</td>
      <td >User Place</td>
      <td >User Location</td>
      <td >Payment Status
        <label for="txt_paymentstatus2"></label></td>
      <td>Action</td>
    </tr>
    <?php
	while($data=$row->fetch_assoc())
	{
	?>
    <tr>
      <td ><?php  echo $data["user_name"]?></td>
      <td ><?php  echo $data["service_name"]?></td>
      <td ><?php  echo $data["booking_date"]?></td>
      <td ><?php  echo $data["bokked_date"]?></td>
      <td ><?php  echo $data["user_address"]?></td>
      <td ><?php  echo $data["user_contact"]?></td>
      <td ><?php  echo $data["user_photo"]?></td>
      <td ><?php  echo $data["district_name"]?></td>
      <td ><?php  echo $data["place_name"]?></td>
      <td ><?php  echo $data["location_name"]?></td>
      <td ><?php if($data["payment_status"]==0) echo "Pending"; else echo "received"; ?></td>
      <td><a href="ViewBooking.php?acid=<?php echo $row["booking_id"]?>">Accept</a>/
        <a href="ViewBooking.php?rejid=<?php echo $row["booking_id"]?>">Reject</a>

      </td>
    </tr>
    <?php
	}
	?>
  </table>
</form>
</body>
</html>
<?php
include("Foot.php");
?>