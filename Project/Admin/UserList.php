<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>
    <?php  
	ob_start();
include('../Connection/Connection.php');
include('Head.php');
      if(isset($_GET["rid"]))
	  {
		  $accept = "update tbl_user set user_status='1' where user_id='".$_GET["rid"]."'";
		  if($conn->query($accept))
		  {
			  header("Location:UserList.php");
		  }
	  }
	  if(isset($_GET["aid"]))
	  {
		  $accept = "update tbl_user set user_status='0' where user_id='".$_GET["aid"]."'";
		  if($conn->query($accept))
		  {
			  header("Location:UserList.php");
		  }
	  }
  
    ?>
    <body>
        <section class="main_content dashboard_part">

            <!--/ menu  -->
            <div class="main_content_iner ">
                <div class="container-fluid p-0">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="QA_section">
                                <h1>Accepted Users</h1>
                                <div class="QA_table mb_30">
                                    <!-- table-responsive -->
                                    <table class="table lms_table_active">
                                        <thead>
                                            <tr style="background-color: #74CBF9">
                                                <td align="center" scope="col">Sl.No</td>
                                                <td align="center" scope="col">Name</td>
                                                <td align="center" scope="col">Contact</td>
                                                <td align="center" scope="col">Email</td>
                                                 <td align="center" scope="col">Photo</td>
                                                <td align="center" scope="col">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
												$i = 0;
                                                $selQry = "select * from tbl_user where user_status='0'";
                                               $rs = $conn->query($selQry);
                                                while ($data = $rs->fetch_assoc()) {

                                                    $i++;

                                            ?>
                                            <tr>
                                                <td align="center"><?php echo $i;?></td>
                                                <td align="center"><?php echo $data["user_name"] ?></td>
                                                <td align="center"><?php echo $data["user_contact"] ?></td>
                                                <td align="center"><?php echo $data["user_email"] ?></td>
                                                <td align="center"><img src="../Assets/UserPhoto/<?php echo $data["user_photo"] ?>"  width="150px" height="150"/></td>
                                                <td align="center"><a href="UserList.php?rid=<?php echo $data["user_id"] ?>" class="status_btn">Reject</a> </td>
                                            </tr>
                                            <?php                     }


                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                                <h1>Rejected Users</h1>
                                <div class="QA_table mb_30">
                                    <!-- table-responsive -->
                                    <table class="table lms_table_active">
                                        <thead>
                                            <tr style="background-color: #74CBF9">
                                                <td align="center" scope="col">Sl.No</td>
                                                <td align="center" scope="col">Complaint</td>
                                                <td align="center" scope="col">Date</td>
                                                <td align="center" scope="col">User</td>
                                                <td align="center" scope="col">Reply</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
												$i = 0;
                                                $selQry = "select * from tbl_user where user_status='1'";
                                               $rs = $conn->query($selQry);
                                                while ($data = $rs->fetch_assoc()) {
                                                   $i++;

                                            ?>
                                            <tr>
                                                <td align="center"><?php echo $i;?></td>
                                                <td align="center"><?php echo $data["user_name"] ?></td>
                                                <td align="center"><?php echo $data["user_contact"] ?></td>
                                                <td align="center"><?php echo $data["user_email"] ?></td>
                                                <td align="center"><a href="UserList.php?aid=<?php echo $data["user_id"] ?>" class="status_btn">Accept</a> </td>
                                            </tr>
                                            <?php                     }


                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </body>
     <?php
		include('Foot.php');
		 ob_end_flush();
		?>

    </html>