<div class="row">
<div class="col s12">
<h4 class="pad-left-15">Edit testimonial</h4>
</div>
</div>
<div class="row">
<form class='col s12' method='post' action='<?php echo site_url("site/edittestimonialsubmit");?>' enctype= 'multipart/form-data'>
<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
<div class="row">
<div class="input-field col s6">
<label for="Name">Name</label>
<input type="text" id="Name" name="name" value='<?php echo set_value('name',$before->name);?>'>
</div>
</div>
<div class="row">
<div class="col s12 m6">
<label>Testimonial</label>
<textarea name="testimonial" placeholder="Enter text ..."><?php echo set_value( 'testimonial',$before->testimonial);?></textarea>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="Designation">Designation</label>
<input type="text" id="Designation" name="designation" value='<?php echo set_value('designation',$before->designation);?>'>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="Company">Company</label>
<input type="text" id="Company" name="company" value='<?php echo set_value('company',$before->company);?>'>
</div>
</div>
<div class="row">
<div class="col s6">
<button type="submit" class="btn btn-primary waves-effect waves-light  blue darken-4">Save</button>
<a href='<?php echo site_url("site/viewtestimonial"); ?>' class='btn btn-secondary waves-effect waves-light red'>Cancel</a>
</div>
</div>
</form>
</div>
