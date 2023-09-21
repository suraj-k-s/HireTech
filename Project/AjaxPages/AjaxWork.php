<tr>
<?php 
include("../Connection/Connection.php");

$did = $_GET["did"];
$pid = $_GET["pid"];
$tid = $_GET["tid"];
$i = 0;

if($pid && $tid)
{
		$sel = "select * from tbl_workpost w inner join tbl_labour l on w.labour_id=l.labour_id inner join tbl_place p on p.place_id=l.place_id where l.place_id = '".$pid."' and l.worktype_id='".$tid."' and workpost_status='0'";
	$row = $conn->query($sel);
	while($data = $row->fetch_assoc())
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
		?>
			<td style="padding:30px">
            	<p style="border:1px solid black;padding:20px;text-align:center">
                <img src="../Assets/LabourPhoto/<?php echo $data["labour_photo"];?>" style="border-radius:50%" width="80" height="80"/><br /><br />
                Name : <?php echo $data["labour_name"];?></br><br />
                 Rating :	<?php echo number_format($average_rating, 1);?>/5</br><br />
				Details :	<?php echo $data["workpost_details"];?></br><br />
				Amount :	<?php echo $data["workpost_amount"];?>
                </br><br />
				<a href="SearchWork.php?bid=<?php echo $data["workpost_id"];?>">Book Now</a>
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
else if($tid && $did)
{
		$sel = "select * from tbl_workpost w inner join tbl_labour l on w.labour_id=l.labour_id inner join tbl_place p on p.place_id=l.place_id where p.district_id = '".$did."' and l.worktype_id='".$tid."' and workpost_status='0'";
	$row = $conn->query($sel);
	while($data = $row->fetch_assoc())
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
				<a href="SearchWork.php?bid=<?php echo $data["workpost_id"];?>">Book Now</a>
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
else if($tid)
{
	$sel = "select * from tbl_workpost w inner join tbl_labour l on w.labour_id=l.labour_id inner join tbl_place p on p.place_id=l.place_id where l.worktype_id = '".$tid."' and workpost_status='0'";
	$row = $conn->query($sel);
	while($data = $row->fetch_assoc())
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
				<a href="SearchWork.php?bid=<?php echo $data["workpost_id"];?>">Book Now</a>
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
else if($did)
{
		$sel = "select * from tbl_workpost w inner join tbl_labour l on w.labour_id=l.labour_id inner join tbl_place p on p.place_id=l.place_id where p.district_id = '".$did."' and workpost_status='0'";
		echo $sel;
	$row = $conn->query($sel);
	while($data = $row->fetch_assoc())
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
				<a href="SearchWork.php?bid=<?php echo $data["workpost_id"];?>">Book Now</a>
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
else if($pid)
{
		$sel = "select * from tbl_workpost w inner join tbl_labour l on w.labour_id=l.labour_id inner join tbl_place p on p.place_id=l.place_id where l.place_id = '".$pid."' and workpost_status='0'";
	$row = $conn->query($sel);
	while($data = $row->fetch_assoc())
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
				<a href="SearchWork.php?bid=<?php echo $data["workpost_id"];?>">Book Now</a>
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

?>