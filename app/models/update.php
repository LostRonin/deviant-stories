<?php
class Update extends AppModel {
	var $name = 'Update';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
    public $actsAs = array('Tags.Taggable');

	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'username_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Status' => array(
			'className' => 'Status',
			'foreignKey' => 'status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

    #returns last 3 news
    function threeRecords()
    {
        return $this->find('all', array('conditions' => array(
                                            'Update.status_id' => 2),       // look for 'published' news
                                            'order' => 'Update.id DESC',    // newest first
                                            'limit' => 4));                 // controls number of news-boxes on frontpage
    }
}
?>