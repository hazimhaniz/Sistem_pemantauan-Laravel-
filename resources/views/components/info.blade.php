<?php
if (isset($name)) {
	$name = $name ? $name : null;
}else{
	$name = null;
}
?>
<i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle info_{{ $name }} " data-html="true" data-toggle="tooltip" title="{{ isset($text) ? $text : 'Information about the field' }}"></i>