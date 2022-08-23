<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>


<div class="container" id="hide_add_form">
  <h2>Employee Form</h2>
  <form method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-25">
        <label for="fname">First Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="first_name" name="fname" value="<?php echo $res[0]->fname?>" placeholder="Enter First Name..." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Last Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="last_name" value="<?php echo $res[0]->lname?>" name="lastname" placeholder="Enter Last Name..." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="email">Joining Date</label>
      </div>
      <div class="col-75">
        <input type="date" id="jdate" name="jdate" value="<?php echo $res[0]->joining_date?>" required>
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
        <label for="image">Profile Image</label>
      </div>
      <div class="col-75">
        <input type="file" id="image" name="image" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="mobile">Mobile Number</label>
      </div>
      <div class="col-75">
        <input type="tel" value="<?php echo $res[0]->phone_no?>"  id="mobile" name="mobile" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Enter mobile number"required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="Designation">Choose a Designation</label>
      </div>
      <div class="col-75">
      <select name="designation" id="designation">
        <option> <?php echo $res[0]->desgination?> </option>
        <option value="Account Manager">Account Manager</option>
        <option value="Manager">Manager</option>
        <option value="HR">HR</option>
        <option value="Developer">Software Developer</option>
        <option value="SQA">SQA</option>
        <option value="Content Writer">Content Writer</option>
      </select>
      </div>
      <input type="checkbox" id="mode" 
      <?php if($res[0]->checking=="on"){ ?> checked  <?php } ?>
      name="mode"style="margin:9px;"><b>Enable If Designation is Developer</b>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="Skills">Skills level</label>
      </div>
      <div class="col-75">
      <input type="range" id="skills" style="width:300px;" name="rangeInput" min="0" max="100" onchange="updateTextInput(this.value);" required>
    <input type="text" id="textInput" value="<?php echo $res[0]->skill?>" disabled style="width:45px;height:45px; text-align: center; border-radius: 50%; border:1px solid grey; color: black;">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="gender">Gender</label>
      </div>
      <div class="col-75">
        <input type="radio" id="gender" name="gender" 
        <?php if($res[0]->gender=="male"){ ?> checked  <?php } ?>
        
        checked value="male">Male
        <input type="radio" id="gender" name="gender" 
        <?php if($res[0]->gender=="female"){ ?> checked  <?php } ?>
        value="female">female
      </div>
    </div>
    
    <?php if($res=="") {?>
    <div class="row">
      <input type="submit" class="sub_button" name="employee_submit" value="Submit"> 
    </div> 
    <?php }?>
    <?php if(!$res=="") {?>
    <div class="row">
    <input type="text" id="emp_id3" style="display: none;" name="emp_id3" value="<?php echo $res[0]->id?>">
      <input type="submit" class="sub_button" name="employee_update_data" value="Update"> 
    </div> 
    <?php }?>




  </form>
</div>
</body>
</html>

