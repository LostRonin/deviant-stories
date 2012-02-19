<?php
class TitlesController extends AppController {

	var $name = 'Titles';

    function beforeFilter()
    {
        parent::beforeFilter();
        
        if($this->only(array('add', 'edit')))
        {
            $this->__lists();
        }
    }    



	function index() 
    {
        if($this->Auth->user('id') == 1) // identifies if admin logs in
        {                                     	                           
    		$this->layout = 'admin';
            $this->Title->recursive = 0;
    		$this->set('titles', $this->paginate());
            $this->set('tags', $this->Title->Tagged->find('cloud', array('limit' => 20)));
        }
        else
        {
            $this->flashWarningGrowl('You are not authorized to access this page!', 'users', 'login');         
        }                                      
	}
    
    
    function find()
    {            
        if (isset($this->passedArgs['by'])) 
        {
    		$this->paginate['Tagged'] = array(
    			'model' => 'Title',
    			'tagged',
    			'by' => $this->passedArgs['by']);            
    		$output = $this->paginate('Tagged');
       	} 
        else 
        {
    		$this->Title->recursive = 1;
    		$output = $this->paginate();
       	}
        	$this->set('tags', $output);
    }
    

    function view($id = null) 
    {
		$this->layout = 'admin';
        $this->idEmpty($id, 'index');
        $this->set('title', $this->Title->read(null, $id));
	}

	
    function add() 
    {
        if($this->Auth->user('id') == 1) // identifies if admin logs in
        {
    		$this->layout = 'admin';
            if (!empty($this->data)) 
            {
    			$this->Title->create();
    			if ($this->Title->save($this->data)) 
                {
    				$this->flashSuccess('This title has been saved', 'index');
    			} 
                else 
                {
    				$this->flashWarning('This title could not be saved. Please, try again.');
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
    			if ($this->Title->save($this->data)) 
                {
    				$this->flashSuccess('This title has been saved', 'index');
    			} 
                else 
                {
    				$this->flashWarning('This title could not be saved. Please, try again.');
    			}
    		}
    		
            if (empty($this->data)) 
            {
    			$this->data = $this->Title->read(null, $id);
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
    		
            if ($this->Title->delete($id)) 
            {
    			$this->flashSuccess('Title deleted', 'index');
    		}
    		
            $this->flashWarning('Title was not deleted', 'index');
        }
        else
        {
            $this->flashWarningGrowl('You are not authorized to access this page!', 'users', 'login');
        }                        
	}
}
?>