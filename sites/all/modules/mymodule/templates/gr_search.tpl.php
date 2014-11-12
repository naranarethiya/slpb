<?php
	$name="";
	$village="0";
	$year="";
	$options=array('' => 'Select Village');
	
	if(isset($_GET['name'])) {
		$name=$_GET['name'];
	}
	
	if(isset($_GET['village'])) {
		$village=$_GET['village'];
	}
	
	if(isset($_GET['year'])) {
		$year=$_GET['year'];
	}
	
	$sql="select distinct(village) from general_register order by village asc";
	
	$result = db_query($sql);
	if ($result) {
    while ($row = $result->fetchAssoc()) {
		$options[$row['village']]=$row['village'];
    }
  }
?>

<form class="form-inline">
	<div class="row">
		<div class="span2">
		</div>
		<div class="span2">
		</div>
		<div class="span2">
		</div>
	</div>
	<fieldset>
		<legend>General Register of Student</legend>
		
		<div class="row">
		<div class="span2">
			<input type="text" class="input-medium" name="name" value="<?php echo $name; ?>" placeholder="Full Name" tabindex="1">
			<span class="help-block">Your first,last or middle name</span>
		</div>
		<div class="span2">
			<?php echo form_dropdown('village',$options,$village,'tabindex="2" class="span2"'); ?>
			<span class="help-block">Select Village</span>
		</div>
		<div class="span2">
			 <input type="text" name="year" value="<?php echo $year; ?>" class="input-small" placeholder="Year wise" tabindex="3">
			 <span class="help-block">Search by Entry year</span>
		</div>
		<div class="span2">
		  <button type="submit" class="btn btn-primary" tabindex="4">Search</button>
		  <a href="<?php echo base_path().'general-register'; ?>" class="btn btn-danger" tabindex="4">Reset</a>
		</div>
	</div>
	</fieldset>
</form>