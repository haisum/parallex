<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1>Admin Dashboard</h1>

<p>
	<?php
	$this->widget('zii.widgets.CMenu', array(
	    'items'=>array(
	        // Important: you need to specify url as 'controller/action',
	        // not just as 'controller' even if default acion is used.
	        array('label'=>'Programs', 'url'=>array('/admin/program/index'), 'items'=>array(
	            array('label'=>'Create', 'url'=>array('/admin/program/create')),
	            array('label'=>'Manage', 'url'=>array('/admin/program/admin')),
	        )),
	        // 'Products' menu item will be selected no matter which tag parameter value is since it's not specified.
	        array('label'=>'Users', 'url'=>array('/admin/user/index'), 'items'=>array(
	            array('label'=>'Create', 'url'=>array('/admin/user/create')),
	            array('label'=>'Manage', 'url'=>array('/admin/user/admin')),
	        )),
	        array('label'=>'Comments', 'url'=>array('/admin/comment/index'), 'items'=>array(
	            array('label'=>'Create', 'url'=>array('/admin/comment/create')),
	            array('label'=>'Manage', 'url'=>array('/admin/comment/admin')),
	        )),
	        array('label'=>'Images', 'url'=>array('/admin/image/index'), 'items'=>array(
	            array('label'=>'Create', 'url'=>array('/admin/image/create')),
	            array('label'=>'Manage', 'url'=>array('/admin/image/admin')),
	        )),
	        array('label'=>'Settings', 'url'=>array('/admin/setting/index'), 'items'=>array(
	            array('label'=>'Create', 'url'=>array('/admin/setting/create')),
	            array('label'=>'Manage', 'url'=>array('/admin/setting/admin')),
	        ))
	    ),'htmlOptions'=>array('class'=>'operations'),
	));
	?>
</p>