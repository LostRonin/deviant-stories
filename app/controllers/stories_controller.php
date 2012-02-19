<?php
class StoriesController extends AppController {

	var $name = 'Stories';
    var $paginate = array(  'limit' => 5, 
                            'conditions' => array('Story.status_id' => 2),
                            'order' => 'Story.id ASC');


    function beforeFilter()
    {
        parent::beforeFilter();
        
        if($this->only(array('add', 'edit')))
        {
            $this->__lists();
        }
    }    


    function storyOverview()
    {        
        $storyLists = $this->paginate('Story');
        $stats = $this->Story->stats();             
        $this->set(compact('storyLists', 'stats'));
    }
    
    
    function adminStoryOverview()
    {
        if($this->Auth->user('id') == 1) // identifies if admin logs in
        {                
            $this->layout = 'admin';
            $storyLists = $this->Story->storyListsAll();               
            $this->set(compact('storyLists', 'stats'));
        }
        else
        {
            $this->flashWarningGrowl('You are not authorized to access this page!', 'users', 'login');
        }            
    }
    

	function view($id = null) 
    {
        if($this->Auth->user('id') == 1) // identifies if admin logs in
        {                
    		$this->layout = 'admin';
            $this->idEmpty($id, 'index');
            $this->set('story', $this->Story->read(null, $id));
        }
        else
        {
            $this->flashWarningGrowl('You are not authorized to access this page!', 'users', 'login');
        }                        
	}


	function add() {
        if($this->Auth->user('id') == 1) // identifies if admin logs in
        {                
      		$this->layout = 'admin';
            if (!empty($this->data)) 
            {
    			$this->Story->create();
    			if ($this->Story->save($this->data)) 
                {
    				$this->flashSuccess('This story has been saved', 'adminstoryoverview');
    			} 
                else 
                {
    				$this->flashWarning('This story could not be saved. Please, try again.');
    			}
    		}
        }
        else
        {
            $this->flashWarningGrowl('You are not authorized to access this page!', 'users', 'login');
        }                                    
	}


	function edit($id = null) 
    {
        if($this->Auth->user('id') == 1) // identifies if admin logs in
        {                        
    		$this->layout = 'admin';
            $this->idEmpty($id, 'index');
    		
            if (!empty($this->data)) 
            {
    			if ($this->Story->save($this->data)) 
                {
    				$this->flashSuccess('This story has been saved', 'adminstoryoverview');
    			} 
                else 
                {
    				$this->flashWarning('This story could not be saved. Please, try again.');
    			}
    		}
    		
            if (empty($this->data)) 
            {
    			$this->data = $this->Story->read(null, $id);
    		}
        }
        else
        {
            $this->flashWarningGrowl('You are not authorized to access this page!', 'users', 'login');
        }                                                
	}


    function delete($id = null) 
    {
        if($this->Auth->user('id') == 1) // identifies if admin logs in
        {                        
            $this->layout = 'admin';
            $this->idEmpty($id, 'index');
    		
            if ($this->Story->delete($id)) 
            {
    			$this->flashSuccess('Story deleted', 'index');
    		}
    		
            $this->flashWarning('Story was not deleted', 'index');
        }
        else
        {
            $this->flashWarningGrowl('You are not authorized to access this page!', 'users', 'login');
        }                                                            
	}
    
    
    ##################
    # Private Methods
    ##################
    
    function __lists()
    {
		$users = $this->Story->User->find('list');
		$statuses = $this->Story->Status->find('list');
		$this->set(compact('users', 'statuses'));
    }    
        
}
?>