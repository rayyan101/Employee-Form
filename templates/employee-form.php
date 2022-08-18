
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

input[type=text], input[type=email],input[type=file]{
  width: 50%;
  padding: 5px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}



.btnform{
  background-color: #008B8B;
  color: white;
  padding: 12px 20px;
  margin-right: 450px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}


.btndata {
  background-color: #008B8B;
  color: white;
 
  margin-right: 0px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  height: 30px;
}

.btndata2 {
  background-color: #008B8B;
  color: white;
  padding: 7px 12px;
  margin-right: 0px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  height: 60px;
}

.update_button{
  background-color: #008B8B;
  color: white;
  margin-right: 0px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  height: 30px;
}


input[type=submit]:hover {
  background-color: #20B2AA;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>
<div  class="container">
<h2>Employee Form</h2>
  <form  method="POST" enctype="multipart/form-data">
    <div class="row"> 
      <div class="col-25">
        <label for="fname">Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="name" value="<?php echo $res[0]->name?>" placeholder="Enter yoour Name..." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Last Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="fname" value="<?php echo $res[0]->fname?>" placeholder="Enter Father Name..." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="email">E-mail</label>
      </div>
      <div class="col-75">
        <input type="email" id="email" name="email" value="<?php echo $res[0]->email?>" placeholder="Enter Email..." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="image">Image</label>
      </div>
      <div class="col-75">
        <input type="file" id="img" name="image" required>
      </div>
    </div>
    <?php if($res=="") {?>
    <div class="row">
      <input type="submit" class="btnform" name="employee_submit" value="Submit"> 
    </div> 
    <?php }?>
    <?php if(!$res=="") {?>
    <div class="row">
    <input type="text" id="emp_id3" style="display: none;" name="emp_id3" value="<?php echo $res[0]->id?>">
      <input type="submit" class="btnform" name="employee_update_data" value="Update"> 
    </div> 
    <?php }?>
  </form>
</div>
</body>
</html>
