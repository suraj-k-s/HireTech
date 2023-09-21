<?php
include('../Connection/Connection.php');
include('SessionValidator.php');
include('Head.php');


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ENnullhttp://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>

<body>
<div id="tab" align="center">
<form id="form1" name="form1" method="post" action=null>
  <table width="750" border="1" align="center">
    <tr>
      <td><label for="sel_district"></label>
              <select name="sel_district" id="sel_district" onchange="getPlace(this.value),getLabour()">
         <option value="">-----Select District-----</option>
         <?php
         	  $sel ="select * from tbl_district ";
	  $row = $conn->query($sel);
	  while($data =  $row->fetch_assoc())
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
        <select name="sel_place" id="sel_place" onchange="getLabour()">
        <option value="">-----Select Place-----</option>
        
        
        

      </td>
      <td><label for="sel_type"></label>
        <select name="sel_type" id="sel_type" onchange="getLabour()">
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
  <br><br>
  <table  style="border-collapse:collapse;" align="center" id="dataT">
  <tr>
  <?php
  $i=0;
  $sel = "select * from tbl_labour l inner join tbl_worktype wt on wt.worktype_id=l.worktype_id inner join tbl_place p on p.place_id=l.place_id";
	$rowz = $conn->query($sel);
	while($data = $rowz->fetch_assoc())
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

	while($row = $result->fetch_assoc())
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
$flag = true;

		$seqry = "SELECT * FROM tbl_wishlist WHERE labour_id='".$data["labour_id"]."' and  user_id ='".$_SESSION["userid"]."'";

	$red = $conn->query($seqry);

	if($red->fetch_assoc())
	{
		$flag=false;
	}


		?><td style="padding:30px">
            	<p style="border:1px solid black;padding:20px;text-align:center">
				<span id="love-sim<?php echo $data["labour_id"];?>" style="color:<?php if($flag) { echo 'black'; }else{ echo 'red'; }?>;cursor: pointer;font-size: 30px;" onclick="wishList(<?php echo $data['labour_id'];?>)">&#9829;</span> <br>
                <img src="../Assets/LabourPhoto/<?php echo $data["labour_photo"];?>" style="border-radius:50%" width="80" height="80"/><br /><br />
                Name : <?php echo $data["labour_name"];?></br><br />
				Type :	<?php echo $data["worktype_name"];?></br><br />
                Rating :	<?php echo number_format($average_rating, 1);?>/5</br><br />
				<a style="color:green" href="LabourRequest.php?lid=<?php echo $data["labour_id"];?>">Request Now</a><br>
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
function wishList(id)
{


	$.ajax({
	url: "../AjaxPages/AjaxWish.php?id="+id,
	  success: function(result){
		$('#love-sim'+id).css("color", result);
	  }
	});
	
}
function getLabour()
{
	var did = document.getElementById('sel_district').value.trim();
	var pid = document.getElementById('sel_place').value.trim();
	var tid = document.getElementById('sel_type').value.trim();
	
	
		$.ajax({
		url: "../AjaxPages/AjaxLabour.php?did="+did+"&tid="+tid+"&pid="+pid,
		  success: function(result){
			  $("#dataT").html(result);
		  }
		});
	
}
</script>
<?php
include('Foot.php');
?>
</body>
</html>