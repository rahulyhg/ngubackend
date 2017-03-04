<div class="row">
<div class="col s12">
<div class="row">
<div class="col s12 drawchintantable">
<?php $this->chintantable->createsearch("contact");?>
<table class="highlight responsive-table">
<thead>
<tr>
<th data-field="id">id</th>
<th data-field="name">name</th>
 <th data-field="email">email</th> 
<th data-field="phone">phone</th>
<th data-field="organization">organization</th>
<th data-field="query">query</th>

</tr>
</thead>
<tbody>
</tbody>
</table>
</div>
</div>
<?php $this->chintantable->createpagination();?>
 <div class="createbuttonplacement"><a class="btn btn-primary waves-effect waves-light  blue darken-4 tooltipped" href="<?php echo site_url('site/exportcontactcsv'); ?>"data-position="top" data-delay="50" target="_blank" data-tooltip="Excel Export">Excel Export</a></div> 
</div>
</div>
<script>
function drawtable(resultrow) {
return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.name + "</td><td>" + resultrow.phone + "</td><td>" + resultrow.email + "</td><td>" + resultrow.organization + "</td><td>" + resultrow.query + "</td><td><a class='btn btn-primary btn-xs waves-effect waves-light blue darken-4 z-depth-0 less-pad' href='<?php echo site_url('site/editcontact?id=');?>"+resultrow.id+"' data-position='top' data-delay='50' data-tooltip='Edit'><i class='fa fa-pencil propericon'></i></a><a class='btn btn-danger btn-xs waves-effect waves-light red pad10 z-depth-0 less-pad' onclick=return confirm(\"Are you sure you want to delete?\") href='<?php echo site_url('site/deletecontact?id='); ?>"+resultrow.id+"'><i class='material-icons propericon'>delete</i></a></td></tr>";
}
generatejquery("<?php echo $base_url;?>");
</script>
