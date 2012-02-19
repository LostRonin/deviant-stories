<?php
class Title extends AppModel {
	var $name = 'Title';
	var $displayField = 'name';   
    
    public $actsAs = array('Tags.Taggable');
    
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Chapter' => array(
			'className' => 'Chapter',
			'foreignKey' => 'title_id',
			'dependent' => false
		)
	);

}
?>