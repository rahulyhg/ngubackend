<div class="row">
<div class="col s12">
<h4 class="pad-left-15">Edit media</h4>
</div>
</div>
<div class="row">
<form class='col s12' method='post' action='<?php echo site_url("site/editmediasubmit");?>' enctype= 'multipart/form-data'>
<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
<div class="row">
<div class="input-field col s6">
<label for="Order">Order</label>
<input type="text" id="Order" name="order" value='<?php echo set_value('order',$before->order);?>'>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="Name">Name</label>
<input type="text" id="Name" name="name" value='<?php echo set_value('name',$before->name);?>'>
</div>
</div>
<input type="file" id="normal-field" class="form-control" name="image" value='<?php echo set_value('image',$before->image);?>'>
<div class="row">
<div class="file-field input-field col s12 m6">
<span class="img-center big">
image; ?>" ></span>
<div class="btn blue darken-4">
<span>Image</span>
<input type="file" name="image" multiple>
</div>
<div class="file-path-wrapper">
<input class="file-path validate" type="text" placeholder="Upload one or more files" value='<?php echo set_value('image',$before->image);?>'>
<?php if($before->image == "") { } else { ?> <?php } ?>
</div>
</div>
</div>
<div class="row">
<div class="col s6">
<button type="submit" class="btn btn-primary waves-effect waves-light  blue darken-4">Save</button>
<a href='<?php echo site_url("site/viewmedia"); ?>' class='btn btn-secondary waves-effect waves-light red'>Cancel</a>
</div>
</div>
</form>
</div>
