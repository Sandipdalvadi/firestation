<option value="">Select</option>
<?php
foreach($result as $key => $value)
{
?>
<option value="<?php echo $value['id']?>"><?php echo $value['title']?></option>
<?php }
?>