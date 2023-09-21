<?php
include('../Connection/Connection.php');
include('SessionValidator.php');

if(isset($_POST["btn_post"]))
{
	$detail = $_POST["txt_details"];
	
	$ins = "insert into tbl_workrequest(workrequest_fordate,workrequest_details,workrequest_date,labour_id,workrequest_amount,user_id)values('".$_POST["txt_date"]." 12:00','".$detail."',curdate(),'".$_GET["lid"]."','".$_POST["txt_amount"]."','".$_SESSION["userid"]."')";
	if($conn->query($ins))
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
<h1>Request</h1>
<br><br>
<form id="form1" name="form1" method="post" action="">
  <table border="1">
  <tr>
      <td>Date</td>
      <td><input type="date" autocomplete="off" placeholder="Select a Date" class="form-control" id="datepicker_projectStartDate" name="txt_date" /></td>
    </tr>
    <tr>
      <td>Amount</td>
      <td><input type="tel" class="form-control" placeholder="Enter Amount"  name="txt_amount"/></td>
    </tr>
    <tr>
      <td>Details</td>
      <td><label for="txt_details"></label>
      <textarea name="txt_details" class="form-control" placeholder="Enter Details" id="txt_details" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_post" id="btn_post" value="Request" />
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
 
</form>
<?php
$selQry = "SELECT workrequest_fordate FROM tbl_workrequest WHERE labour_id ='".$_GET["lid"]."'";
$res = $conn->query($selQry);
$rows = [];
while($row = $res->fetch_assoc())
{
    $rows[] = $row["workrequest_fordate"];
}
$arrr =  json_encode($rows);
?>
<span id="txt_arr" style="visibility: hidden;"><?php echo $arrr; ?></span>

</div>
<?php
include('Foot.php');
?>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>


<script>
var mydisabledDates = document.getElementById("txt_arr").innerHTML.replace(/['"]+/g, '');


var disabledDates = mydisabledDates.replace("[", "")
                      .replace("]", "")
                      .split(',')
                      .map(d => new Date(d.trim()));
                      console.log(disabledDates);
$("#datepicker_projectStartDate").datepicker({
  format: "yyyy-mm-dd",
  daysOfWeekDisabled: [0, 6],
  datesDisabled: disabledDates 
});

</script>
</body>
</html>