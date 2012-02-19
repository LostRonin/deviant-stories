<?php
class Chapter extends AppModel {
    
    var $name = 'Chapter';
    
    var $validate = array
    (    
        'block'  => array
        (
            'numeric'  =>  array
            (
                'rule'          => 'numeric',
                'allowEmpty'    => false,
                'message'       => 'Please input a number.'
            )
        ),
        
        'content'  => array
        (
            'minLength'  =>  array
            (
                'rule'          => array('minLength', 3),
                'allowEmpty'    => false,
                'message'       => 'Content is required.'
            )        
        )
    );                                                                             



	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Story' => array(
			'className' => 'Story',
			'foreignKey' => 'story_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Title' => array(
			'className' => 'Title',
			'foreignKey' => 'title_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Image' => array(
			'className' => 'Image',
			'foreignKey' => 'image_id',
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


    #returns all chapters of a Story
    function chapterListsStory($story_id)
    {
        return $this->find('all', array('conditions' => array(                                            
                                            'Chapter.block'      => 1,          //limit to the first block to avoid duplicate results
                                            'Chapter.story_id'  => $story_id,
                                            'Chapter.status_id' => 2),       // look for 'published' chapter
                                            'order' => 'Story.id ASC'));     // oldest first
    }

    #returns a specific chapter of a Story
    function getChapter($story_id, $title_id)
    {
        return $this->find('all', array('conditions' => array(
                                            'Chapter.story_id'   => $story_id,
                                            'Chapter.title_id'   => $title_id,                                                                                      
                                            'Chapter.status_id'  => 2),       // look for 'published' chapters 
                                            'order' => 'Story.id ASC'));     // oldest first                                            
    }
    

    function allChaptersPublished($status_id)
    {
        return $this->find('all', array('conditions' => array(
                                            'Chapter.status_id'  => $status_id),       // look for all chapters 
                                            'order' => 'Chapter.id ASC'));     // oldest first                                            
    }    


    function allChaptersStory($story_id)
    {
        return $this->find('all', array('conditions' => array(
                                            'Chapter.story_id'  => $story_id),       // look for all chapters 
                                            'order' => 'Chapter.id ASC'));     // oldest first                                            
    } 

    #returns comments
    function getChaps($title_id)
    {
        return $this->find('all', array('conditions' => array(
                                            'Chapter.block'      => 1,
                                            'Chapter.title_id'   => $title_id,                                                                                      
                                            'Chapter.status_id'  => 2), // look for 'published' chapters
                                            'order' => 'Chapter.id ASC'));                                           
    }   

    
}
?>