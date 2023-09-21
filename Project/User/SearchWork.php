<?php
include('../Connection/Connection.php');
include('SessionValidator.php');
include('Head.php');
if(isset($_GET["bid"]))
{
	$a = "update tbl_workpost set workpost_status='1',user_id='".$_SESSION["userid"]."' where workpost_id='".$_GET["bid"]."'";
	if($conn->query($a))
	{
		?>
        <script>
		window.location="MyBooking.php";
		</script>
        <?php
	}
	else
	{
		echo "<script>alert('Failed')</script>";
	}
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ENnullhttp://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>

<body>
<div align="center" id="tab">
<form id="form1" name="form1" method="post" action=null>
<h1>Search Work</h1>
<br><br>
  <table width="750" border="1" align="center">
    <tr>
      <td><label for="sel_district"></label>
              <select name="sel_district" id="sel_district" onchange="getPlace(this.value),getWork()">
         <option value="">-----Select District-----</option>
         <?php
         	  $sel ="select * from tbl_district ";
	  $row = $conn->query($sel);
	  while($data = $row->fetch_assoc())
	  {
     ?>
		 <option value="<?php echo $data['district_id'];?>" 
		
          ><?php echo $data['district_name']; ?></option >
         
         <?php
         }
		 ?>
		</select>
        </td>
        
      <td><label for="sel_place"></label>
        <select name="sel_place" id="sel_place" onchange="getWork()">
        <option value="">-----Select Place-----</option>
        
        
        

      </td>
      <td><label for="sel_type"></label>
        <select name="sel_type" id="sel_type" onchange="getWork()">
              <option value="">-----Select Type-----</option>
        <?php
         	  $sel ="select * from tbl_worktype ";
	  $row = $conn->query($sel);
	  while($data =  $row->fetch_assoc())
	  {
     ?>
		 <option value="<?php echo $data['worktype_id'];?>" 
          ><?php echo $data['worktype_name']; ?></option >
         
         <?php
         }
		 ?>
		</select>
        </td>
        
        
      
    </tr>
  </table>
  <table style="border-collapse:collapse;" align="center" id="dataT">
  <tr>
  <?php
  $i=0;
  $sel = "select * from tbl_workpost w inner join tbl_labour l on w.labour_id=l.labour_id inner join tbl_place p on p.place_id=l.place_id where workpost_status='0'";
	$rowz = $conn->query($sel);
	while($data =  $rowz->fetch_assoc())
	{
			$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;

	$query = "
	SELECT * FROM tbl_review where labour_id = '".$data["labour_id"]."' ORDER BY review_id DESC
	";

	$result = $conn->query($query);

	while($row =  $result->fetch_assoc())
	{
		if($row["user_rating"] == '5')
		{
			$five_star_review++;
		}

		if($row["user_rating"] == '4')
		{
			$four_star_review++;
		}

		if($row["user_rating"] == '3')
		{
			$three_star_review++;
		}

		if($row["user_rating"] == '2')
		{
			$two_star_review++;
		}

		if($row["user_rating"] == '1')
		{
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row["user_rating"];

	}
if($total_user_rating>0)
{
	$average_rating = $total_user_rating / $total_review;
}

		$i++;
		?>
			<td style="padding:30px">
            	<p style="border:1px solid black;padding:20px;text-align:center">
                <img src="../Assets/LabourPhoto/<?php echo $data["labour_photo"];?>" style="border-radius:50%" width="80" height="80"/><br /><br />
                Name : <?php echo $data["labour_name"];?></br><br />
                Rating :	<?php echo number_format($average_rating, 1);?>/5</br><br />
				Details :	<?php echo $data["workpost_details"];?>
                </br><br />
				Amount :	<?php echo $data["workpost_amount"];?>
                </br><br />
				<a href="SearchWork.php?bid=<?php echo $data["workpost_id"];?>">Book Now</a><br>
                <a style="color:green" href="ViewWorkGallery.php?lid=<?php echo $data["labour_id"];?>">View Works</a>
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
<script src="../Jq/jquery.js"></script>
<script>
function getPlace(did)
{


	$.ajax({
	url: "../AjaxPages/AjaxPlace.php?did="+did,
	  success: function(result){
		$("#sel_place").html(result);
	  }
	});
	
}
function getWork()
{
	var did = document.getElementById('sel_district').value.trim();
	var pid = document.getElementById('sel_place').value;
	var tid = document.getElementById('sel_type').value.trim();
	
	
	if(pid.length===0 && did.length!==0 && tid.length!==0)
	{
		//alert('District and Type');
		$.ajax({
		url: "../AjaxPages/AjaxWork.php?did="+did+"&tid="+tid,
		  success: function(result){
			  $("#dataT").html(result);
		  }
		});
	}
	else if(tid.length===0 && did.length!==0 && pid.length!==0)
	{
		//alert('Place');
		$.ajax({
		url: "../AjaxPages/AjaxWork.php?pid="+pid,
		  success: function(result){
			  $("#dataT").html(result);
		  }
		});
	}
	else if(tid.length!==0 && did.length!==0 && pid.length!==0)
	{
		//alert('Place and Type');
		$.ajax({
		url: "../AjaxPages/AjaxWork.php?pid="+pid+"&tid="+tid,
		  success: function(result){
			  $("#dataT").html(result);
		  }
		});
	}
	else if(tid.length!==0 && did.length===0 && pid.length===0)
	{
		//alert('Type');
		$.ajax({
		url: "../AjaxPages/AjaxWork.php?tid="+tid,
		  success: function(result){
			  $("#dataT").html(result);
		  }
		});
	}
	else if(tid.length===0 && did.length!==0 && pid.length===0)
	{
		//alert('District');
		$.ajax({
		url: "../AjaxPages/AjaxWork.php?did="+did,
		  success: function(result){
			  $("#dataT").html(result);
		  }
		});
	}
	
	
	
}
</script>
<?php
include('Foot.php');
?>
</body>
</html>