<?php

session_start();

require_once '../core/init.php';


$sql = "SELECT * FROM users";
$uquery = $db->query($sql);

$sql1 = "SELECT * FROM users";
$uquery1 = $db->query($sql1);

$sql2 = "SELECT * FROM users";
$uquery2 = $db->query($sql2);

$sql3 = "SELECT * FROM users";
$uquery3 = $db->query($sql3);


?>

<?php
 include 'header.php';?>
 
<?php include 'nav.php'; ?>
<body>



<center>
			<table class="table table-admin col-md-12">
			<center><h2 class='title_stats'>Registered Members Info</h2></center>
			<tr class="table-row-admin">	
			<th class="table_head">Email</th>
			<th class="table_head">Student's Name</th>
			<th class="table_head">Student's Last Name</th>
			<th class="table_head">Parent's Name</th>
			<th class="table_head">Parent's Last Name</th>
			<th class="table_head">Phone Num.</th>
			<th class="table_head">USCF ID</th>
			<th class="table_head">Coach</th>
			</tr>
<?php while($users = mysqli_fetch_assoc($uquery)): ?>
          <tr class="table-row-admin">
          <td><?php echo $users['email']; ?></td>
           <td><?php echo $users['name']; ?></td>
            <td><?php echo $users['lastname']; ?></td>
             <td><?php echo $users['parent_name']; ?></td>
              <td><?php echo $users['parent_lastname']; ?></td>
              <td><?php echo $users['phone']; ?></td>
               <td><?php echo $users['uscf']; ?></td>
                <td><?php echo $users['coach_name']; ?></td>
          </tr>
 <?php endwhile; ?>
          </table></center>
<br><br><br>


          <center><h2 class="title_stats">Info</h2></center>
          <center>
			<table class="table table-admin col-md-12">
			<tr class="table-row-admin">	
			<th class="table_head">Student's Name</th>
			<th class="table_head">Alergies</th>
			<th class="table_head">How they heard about us</th>
			<th class="table_head">Will they attend next camp</th>
			</tr>
<?php while($users2 = mysqli_fetch_assoc($uquery2)): ?>
          <tr class="table-row-admin">
          		<td><?php echo $users2['name']; ?></td>
                 <td><?php echo $users2['alergies']; ?></td>
                  <td><?php echo $users2['heard']; ?></td>
                   <td><?php echo $users2['attend']; ?></td>
          </tr>
 <?php endwhile; ?>
          </table></center>




<br>
<hr>

<center><h2 class="title_stats">Subscribed Users</h2></center>
          <center style="margin-top: 100px;">
			<table class="table table-admin2">
			<tr class="table-row-admin">
			<th class="table_head">Email</th>
			<th class="table_head">Accepted Newsletter</th>
			</tr>
<?php while($users1 = mysqli_fetch_assoc($uquery1)): ?>
          <tr class="table-row-admin">
			<td><?php echo $users1['email']; ?></td>
            <td><?php echo $users1['checknews']; ?></td>
          </tr>
 <?php endwhile; ?>

          </table></center>
          <hr>
   
          <center><h2 class='title_stats'>Info About Payment</h2></center>


<center>
			<table class="table table-admin col-md-12">
			<tr class="table-row-admin">	
			<th class="table_head">Email</th>
			<th class="table_head">Student's Name</th>
			<th class="table_head">Student's Last Name</th>
			<th class="table_head">Full Access</th>
			<th class="table_head">Saturday</th>
			<th class="table_head">Sunday</th>
			<th class="table_head">Tournament</th>
			</tr>
<?php while($users3 = mysqli_fetch_assoc($uquery3)): ?>
          <tr class="table-row-admin">
          <td><?php echo $users3['email']; ?></td>
           <td><?php echo $users3['name']; ?></td>
            <td><?php echo $users3['lastname']; ?></td>
             <td><?php echo $users3['full_paid']; ?></td>
              <td><?php echo $users3['saturday_paid']; ?></td>
              <td><?php echo $users3['sunday_paid']; ?></td>
               <td><?php echo $users3['tour_paid']; ?></td>
          </tr>
 <?php endwhile; ?>
          </table></center>

</body>
</html>