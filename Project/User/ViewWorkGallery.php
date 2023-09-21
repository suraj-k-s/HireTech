

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
include('../Connection/Connection.php');
include('SessionValidator.php');
include('Head.php');
?>
<body>
<table width="300" style="border-collapse:collapse;" align="center" id="dataT">
  <tr>
  <?php
  $sel = "select * from tbl_workgallery where labour_id = '".$_GET["lid"]."'";
	$rowz = $conn->query($sel);
	$i=0;
	if($rowz->num_rows>0)
	{
		while($data =  $rowz->fetch_assoc())
	{
		
		$i++;
		?><td style="padding:30px">
            	<p style="border:1px solid black;padding:20px;text-align:center">
                <img src="../Assets/WorkGallery/<?php echo $data["workgallery_file"];?>"  width="120" height="120"/><br /><br />
                Caption : <?php echo $data["workgallery_caption"];?></br><br />
                </p>
			</td>
		<?php
		if($i==4)
		{
			echo "</tr><tr>";
			$i=0;
		}
	}
	}
	else{
		?>
		<h1 style="text-align:center">No Data Found</h1>
		<?php
	}
  
  
  ?>
  </table>
</body>
<?php
		include('Foot.php');
		?>
</html>