<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
<body>
  
<div class="container">
  <h2>All Employees</h2>
  <label>Search</label>
  <input id="search_input" type="text" placeholder="Search.." >
  <br><br>          
  <table class="wp-list-table widefat fixed striped table-view-list posts">
	<thead>
	  <tr>
		<th>Image</th>
		<th>Firstname</th>
		<th>Lastname</th>
		<th>Email</th>
		<th>joining date</th>
		<th>Mobile No.</th>
		<th>Designation</th>
		<th>Gender</th>
		<th>Mode</th>
		<th>skill</th>
		
		<th>Delete</th>
		<th>Update</th>
		<th>Print<th>
	  </tr>
	</thead>
	<tbody id="seacrh_table">
	   
	<?php

	foreach ( $results as $row ) {

		?>
	<tr>
		<td id="get-<?php echo $row->id; ?>-1"><img src="<?php echo $row->img; ?>" style="width:40px;height:40px;border-radius:25px;;"></td>
		<td id="get-<?php echo $row->id; ?>-2" class ="capital_first_letter"><?php echo $row->fname; ?></td>
		<td id="get-<?php echo $row->id; ?>-3" class ="capital_first_letter"><?php echo $row->lname; ?></td>
		<td id="get-<?php echo $row->id; ?>-4"><?php echo $row->email; ?></td>
		<td id="get-<?php echo $row->id; ?>-5"><?php echo $row->joining_date; ?></td>
		<td id="get-<?php echo $row->id; ?>-6"><?php echo $row->phone_no; ?></td>
		<td id="get-<?php echo $row->id; ?>-7"><?php echo $row->desgination; ?></td>
		<td id="get-<?php echo $row->id; ?>-8"><?php echo $row->gender; ?></td>
		<td id="get-<?php echo $row->id; ?>-9"><?php echo $row->checking; ?></td>
		<td id="get-<?php echo $row->id; ?>-10"><?php echo $row->skill; ?></td>
		<td> <form  method="POST">  
		  <input type="text" id="emp_id" name="emp_id" style="display: none;" value="<?php echo $row->id; ?>">
		  <input type="submit"  value="Delete" name="employee_delete" class="btndata"></form></td>
		<td> <form   method="POST"> 
		  <input type="text" id="emp_id2"  name="emp_id2" style="display: none;" value="<?php echo $row->id; ?>">
		  <input type="submit" class="update_button" value="Update" name="employee_update" class="btndata"></form></td>
		<td> 
		   
		  <input type="button" id="<?php echo $row->id; ?>" value="Print"  class="btndata2">
		</td>  
	</tr>
	<?php } ?>
	
	</tbody>
  </table>
</div>

</body>
</html>
