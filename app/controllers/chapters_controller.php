<?php

class ChaptersController extends AppController {

	var $name = 'Chapters';


    function beforeFilter()
    {
        parent::beforeFilter();
        
        if($this->only(array('add', 'edit')))
        {
            $this->__lists();
        }
    }


    function chapterOverview($story_id)
    {
        $chapterLists = $this->Chapter->chapterListsStory($story_id);       
        $this->set(compact('chapterLists'));
    }

    
    
    function storyChapter($story_id, $story_title)
    {
        $chapterContent = $this->Chapter->getChapter($story_id, $story_title);       
        $this->set(compact('chapterContent'));
    }
  

	function index() 
    {
        if($this->Auth->user('id') == 1) // identifies if admin logs in
        {                                     	                           
            $this->layout = 'admin';
            $this->Chapter->recursive = 0;
    		$this->set('chapters', $this->paginate());
        }
        else
        {
            $this->flashWarningGrowl('You are not authorized to access this page!', 'users', 'login');         
        }                                      
	}

	function allChaptersPublished($status_id) 
    {
        if($this->Auth->user('id') == 1) // identifies if admin logs in
        {            
            $chapters = $this->Chapter->allChaptersPublished($status_id);
            $this->layout = 'admin';
            $this->Chapter->recursive = 0;
    		$this->set(compact('chapters', $this->paginate()));
        }
        else
        {
            $this->flashWarningGrowl('You are not authorized to access this page!', 'users', 'login');        
        }                                      
	}


    function allChaptersStory($story_id)
    {
        if($this->Auth->user('id') == 1) // identifies if admin logs in
        {            
            $chapters = $this->Chapter->allChaptersStory($story_id);
            $this->layout = 'admin';
            $this->Chapter->recursive = 0;
    		$this->set(compact('chapters', $this->paginate()));
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
            $this->set('chapter', $this->Chapter->read(null, $id));
        }
        else
        {
            $this->flashWarningGrowl('You are not authorized to access this page!', 'users', 'login');
        }                                                  
	}

	
    function add() 
    {
        if($this->Auth->user('id') == 1) // identifies if admin logs in
        {                                            	                                           
    		$this->layout = 'admin';
            if (!empty($this->data)) 
            {
    			$this->Chapter->create();
                if ($this->Chapter->save($this->data))
                {
    				$this->flashSuccess('This chapter has been saved', 'index');
    			} 
                else 
                {
    				$this->flashWarning('This chapter could not be saved. Please, try again.');
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
    			if ($this->Chapter->save($this->data)) 
                {
    				$this->flashSuccess('This chapter has been saved', 'index');
    			} 
                else 
                {
    				$this->flashWarning('This chapter could not be saved. Please, try again.');
    			}
    		}
    		
            if (empty($this->data)) 
            {
    			$this->data = $this->Chapter->read(null, $id);
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
    		
            if ($this->Chapter->delete($id)) 
            {
    			$this->flashSuccess('Chapter deleted', 'index');
    		}
    		
            $this->flashWarning('Chapter was not deleted', 'index');
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
		$stories = $this->Chapter->Story->find('list');
		$titles = $this->Chapter->Title->find('list');
		$images = $this->Chapter->Image->find('list');
		$statuses = $this->Chapter->Status->find('list');
		$this->set(compact('stories', 'titles', 'images', 'statuses'));
    }    
    
}
?>