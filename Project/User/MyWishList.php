<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	include('../Connection/Connection.php');
	include('SessionValidator.php');
	session_start();
		if(isset($_GET["did"]))
		{
			$did=$_GET["did"];
			$delqry="delete from tbl_wishlist where wishlist_id='".$did."'";
			if($conn->query($delqry))
			{
				?>
            <script>
			alert("deleted..");
			location.href="MyWishlist.php";
			</script>
            <?php
			}
			else
			{
				?>
            <script>
			alert("failed..");
			location.href="MyWishlist.php";
			</script>
            <?php
			}
		}
	?>
<form id="form1" name="form1" method="post" action="">
 <table border="1" cellpadding="60" align="center">
  
    <tr>
    <?php
	$i=0;
  $selW="select * from tbl_wishlist wl inner join tbl_worker w on w.worker_id=wl.worker_id inner join tbl_workertype wt on wt.workertype_id=w.workertype_id inner join tbl_location l on l.location_id=w.location_id inner join tbl_place p on p.place_id=l.place_id inner join tbl_district d on d.district_id=p.district_id where wl.user_id='".$_SESSION["uid"]."'";
  $roww=$conn->query($selW);
  while($dataw=$roww->fetch_assoc())
  {
	  $i++;
  ?>
      <td><p><img src="../Assets/Files/WorkerPhotos/<?php echo $dataw["worker_photo"]?>" width="150" height="150">
      <br /><br />
      <b>Name : <?php echo $dataw["worker_name"]?></b>
      <br /><br />
      <b>Contact : <?php echo $dataw["worker_contact"]?></b>
      <br /><br />
      <b>Email : <?php echo $dataw["worker_email"]?></b>
      </p> 
    <p align="center">
    <a href="MyWishList.php?did=<?php echo $dataw["wishlist_id"]; ?>">delete
   </a> 
    </p>
   </td>

      
      
      <?php
	  if($i==4)
	  {
		  echo "</tr>";
		  $i=0;
		  echo "<tr>";
	  }
  }
	  ?>
</form>

</body>
</html>