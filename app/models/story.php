<?php
class Story extends AppModel {
	var $name = 'Story';
	var $displayField = 'name';

	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'username_id'
		),
		'Status' => array(
			'className' => 'Status',
			'foreignKey' => 'status_id'
		)
	);

	var $hasMany = array(
		'Chapter' => array(
			'className' => 'Chapter',
			'foreignKey' => 'story_id',
			'dependent' => false
		)
	);

    
    #returns all published stories
    function storyLists()
    {
        return $this->find('all', array('conditions' => array(
                                            'Story.status_id' => 2),        // look for 'published' stories 
                                            'order' => 'Story.id ASC'));    // oldest first
    }

    #returns all stories
    function storyListsAll()
    {
        return $this->find('all', array('order' => 'Story.id ASC'));        // oldest first
    }
    
    
    #returns number of published stories
    function stats()
    {
        $stats = array();
        $stats['total'] = $this->find('count', array('conditions' => array(
                                            'Story.status_id' => 2)       // look for 'published' stories 
                                            ));
        return $stats;
    }    
    
    
    var $validate = array(
        'name'  => array(
            'minLength'  =>  array(
            'rule'          => array('minLength', 3),
            'allowEmpty'    => false,
            'message'       => 'A story title is required.'
            )
        ),
        
        'content'  => array(
            'minLength'  =>  array(
            'rule'          => array('minLength', 3),
            'allowEmpty'    => false,
            'message'       => 'Content is required.'
            )        
        )
    );       


}
?>