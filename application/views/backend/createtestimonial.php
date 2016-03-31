<div class="row">
<div class="col s12">
<h4 class="pad-left-15">Create testimonial</h4>
</div>
<form class='col s12' method='post' action='<?php echo site_url("site/createtestimonialsubmit");?>' enctype= 'multipart/form-data'>
<div class="row">
<div class="input-field col s6">
<label for="Name">Name</label>
<input type="text" id="Name" name="name" value='<?php echo set_value('name');?>'>
</div>
</div>
<div class="row">
<div class="input-field col s12">
<textarea name="testimonial" id="some-textarea" class="materialize-textarea" length="400"><?php echo set_value( 'testimonial');?></textarea>
<label>Testimonial</label>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="Designation">Designation</label>
<input type="text" id="Designation" name="designation" value='<?php echo set_value('designation');?>'>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="Company">Company</label>
<input type="text" id="Company" name="company" value='<?php echo set_value('company');?>'>
</div>
</div>
<div class="row">
<div class="col s12 m6">
<button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
<a href="<?php echo site_url("site/viewtestimonial"); ?>" class="btn btn-secondary waves-effect waves-light red">Cancel</a>
</div>
</div>
</form>
</div>
