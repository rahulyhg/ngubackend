<div class="row">
<div class="col s12">
<div class="row">
<div class="col s12 drawchintantable">
<?php $this->chintantable->createsearch("subscribe");?>
<table class="highlight responsive-table">
<thead>
<tr>
<th data-field="id">id</th>
<th data-field="email">email</th>
</tr>
</thead>
<tbody>
</tbody>
</table>
</div>
</div>
<?php $this->chintantable->createpagination();?>
 <div class="createbuttonplacement"><a class="btn btn-primary waves-effect waves-light  blue darken-4 tooltipped" href="<?php echo site_url('site/exportsubscribecsv'); ?>"data-position="top" data-delay="50" target="_blank" data-tooltip="Excel Export">Excel Export</a></div> 
</div>
</div>
<script>
function drawtable(resultrow) {
return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.email + "</td><td><a class='btn btn-danger btn-xs waves-effect waves-light red pad10 z-depth-0 less-pad' onclick=return confirm(\"Are you sure you want to delete?\") href='<?php echo site_url('site/deletesubscribe?id='); ?>"+resultrow.id+"'><i class='material-icons propericon'>delete</i></a></td></tr>";
}
generatejquery("<?php echo $base_url;?>");
</script>
