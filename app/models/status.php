<?php
class Status extends AppModel {
	var $name = 'Status';
	//var $displayField = 'name';

	var $hasMany = array(
		'Chapter' => array(
			'className' => 'Chapter',
			'foreignKey' => 'status_id',
			'dependent' => false
		),
        
		'Image' => array(
			'className' => 'Image',
			'foreignKey' => 'status_id',
			'dependent' => false
		),
        
		'Updates' => array(
			'className' => 'Updates',
			'foreignKey' => 'status_id',
			'dependent' => false
		),
        
		'Story' => array(
			'className' => 'Story',
			'foreignKey' => 'status_id',
			'dependent' => false
		)
	);

}
?>