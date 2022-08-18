
<style>
table th td tr {
  border:1px solid black;
}

</style>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="container">
<h2 style="margin-left: 390px;" >All Employees</h2>
  <table style="margin-left: 170px;  border:1px solid black;" class="table table-hover" >
   
      <tr>
        <th>Id </th>
        <th>Name</th>
        <th>Father name</th>
        <th>Email</th>
        <th>Image</th>
        <th >Delete</th>
        <th>Update</th>
        <th>Print</th>
      </tr>
    <?php
    foreach($results as $row){ 
    ?>
    <tr>
        <td id="get-<?php echo $row->id?>-1"><?php echo $row->id?></td>
        <td id="get-<?php echo $row->id?>-2"><?php echo $row->name?></td>
        <td id="get-<?php echo $row->id?>-3"><?php echo $row->fname?></td>
        <td id="get-<?php echo $row->id?>-4"><?php echo $row->email?></td>  
        <td id="get-<?php echo $row->id?>-5"><img src="<?php echo $row->image ?> " style="width:40px; height:40px;" /></td>
        <td> <form  method="POST">  
          <input type="text" id="emp_id" name="emp_id" style="display: none;" value="<?php echo $row->id?>">
          <input type="submit"  value="Delete" name="employee_delete" class="btndata"></form></td>
        <td> <form   method="POST"> 
          <input type="text" id="emp_id2"  name="emp_id2" style="display: none;" value="<?php echo $row->id?>">
          <input type="submit"  class="update_button" value="Update" name="employee_update" class="btndata"></form></td>
        <td> 
          <a style=" height: 50px;" id="<?php echo $row->id?>" class="btndata2" > Print  </a></td> 
    </tr>
    <?php } ?>
  </table>
</div>
</body>
</html>

