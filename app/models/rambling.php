<?php
class Rambling extends AppModel {
	var $name = 'Rambling';
    
    //public $actsAs = array('Tags.Taggable');
    
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'username_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

   	var $hasMany = array(
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'foreign_id',
			'conditions' => array('Comment.class'=>'Rambling'),
		),
	);

    #returns all Ramblings
    function ramblingListsOverview()
    {
        //return $this->find('all', array('order' => 'rambling.id DESC'));     // oldest first
        return $this->find('all');
    }

}
?>