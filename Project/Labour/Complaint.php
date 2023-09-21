<?php
ob_start();
include('SessionValidator.php');
include('Head.php');
include('../Connection/Connection.php');

if(isset($_POST['btn_submit']))
	{
		$complaint = $_POST['txt_complaint'];
		$complainttype = $_POST['sel_complainttype_name'];
		
		
		if($_POST['txt_complaint'])
		{
			$ins = "insert into tbl_complaint (complaint_content,complainttype_id,labour_id,complaint_date) values('".$complaint."','".$complainttype."','".$_SESSION["labourid"]."',curdate())";
		
			if($conn->query($ins))
			{
		header("Location:Complaint.php");
	}
	else
	{
		echo "<script>alert('Failed')</script>";
		echo $ins;
	
	}

		
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
<h1>Complaint</h1>
<br><br>
<form id="form1" name="form1" method="post" action="">
  <table >
    <tr>
      <td>Type</td>
      <td>
      <select name="sel_complainttype_name">
        <option value="">---Select ------</option>
      <?php
                                                $i = 0;
                                                $selQry = "select * from tbl_complainttype";
                                                $rs = $conn->query($selQry);
                                                while ($data = $rs->fetch_assoc()) {

                                                    $i++;

                                            ?>

<option value="<?php echo $data["complainttype_id"] ?>"><?php echo $data["complainttype_name"] ?></option>

<?php 
                                                }
?>
  </select>
      </td>
    </tr>
    <tr>
      <td>Complaint</td>
      <td><label for="txt_complaint"></label>
      <textarea name="txt_complaint" id="txt_complaint" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
      <p>&nbsp;</p>
      <table>
      <tr>
        <td>Sl.No</td>
        <td>type</td> 
        <td>content</td>
        <td>date</td>
        <td>reply</td>
        </tr>
         <?php
	  $i=0;
	  $sel = "select * from tbl_complaint c inner join tbl_complainttype ct on ct.complainttype_id=c.complainttype_id where labour_id='".$_SESSION["labourid"]."'" ;
	  $row = $conn->query($sel);
	  while($data = $row->fetch_assoc())
	  {
		  $i++;
	  
		  ?>
          <tr>
            <td><?php echo $i; 	?></td>
            <td><?php echo $data['complainttype_name']; ?></td>
            <td><?php echo $data['complaint_content']; ?></td>
            <td><?php echo $data['complaint_date']; ?></td>
            <td><?php echo $data['complaint_reply']; ?></td>
      </tr>
      <?php
	  }
	  ?>
     </table>
</form>
</div>
<?php
include('Foot.php');
ob_flush();
?>
</body>
</html>