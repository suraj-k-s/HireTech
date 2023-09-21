<?php
include('SessionValidator.php');
include('Head.php');
include('../Connection/Connection.php');

	if(isset($_POST["btn_save"]))
	{
		$caption = $_POST["txt_caption"];
	
	
		$photo=$_FILES["file_photo"]['name'];
		$temp=$_FILES['file_photo']['tmp_name'];
		move_uploaded_file($temp,"../Assets/WorkGallery/".$photo);
		
		$ins = "insert into tbl_workgallery(workgallery_caption,workgallery_file,labour_id)
	values('".$caption."','".$photo."','".$_SESSION["labourid"]."')";
	
	if($conn->query($ins))
	{
		?>
         <script type="text/javascript">
            alert("Gallery Added");
            setTimeout(function(){window.location.href='WorkGallery.php'},40);
        </script>
        <?php
	}
	else
	{
		echo "<script>alert('Failed')</script>";
		
		
	}
	
		
		
	}
	
	if(isset($_GET['did']))
	{
		$del = "delete from tbl_workgallery where workgallery_id = '".$_GET['did']."'";
		if($conn->query($del))
		{
			?>
            <script>
				window.location="WorkGallery.php";
			</script>
            <?php
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
<h1>Work Gallery</h1>
<form id="form1" name="form1" enctype="multipart/form-data" method="post" action="">



  <table width="360" border="1">
    <tr>
      <td width="156">File</td>
      <td width="188"><input type="file" name="file_photo" /></td>
    </tr>
    <tr>
      <td>Caption</td>
      <td><textarea name="txt_caption"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_save" value="Add"></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="300" style="border-collapse:collapse;" align="center" id="dataT">
  <tr>
  <?php
  $sel = "select * from tbl_workgallery where labour_id = '".$_SESSION["labourid"]."'";
	$rowz = $conn->query($sel);
	$i=0;
	while($data = $rowz->fetch_assoc())
	{
		
		$i++;
		?><td style="padding:30px">
            	<p style="border:1px solid black;padding:20px;text-align:center">
                <img src="../Assets/WorkGallery/<?php echo $data["workgallery_file"];?>" style="border-radius:50%" width="80" height="80"/><br /><br />
                Caption : <?php echo $data["workgallery_caption"];?></br><br />
				<a style="color:green" href="WorkGallery.php?did=<?php echo $data["workgallery_id"];?>">Delete</a>
                </p>
			</td>
		<?php
		if($i==4)
		{
			echo "</tr><tr>";
			$i=0;
		}
	}
  
  
  ?>
  </table>

</form>
</div>
<?php
include('Foot.php');
?>
</body>
</html>