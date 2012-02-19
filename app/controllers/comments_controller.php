<?php
class CommentsController extends AppController {

	var $name = 'Comments';
    

	function index() 
    {
        if($this->Auth->user('id') == 1) // identifies if admin logs in
        {                        
    		$this->layout = 'admin';
            $this->Status->recursive = 0;
    		$this->set('comments', $this->paginate());
        }
        else
        {
            $this->flashWarningGrowl('You are not authorized to access this page!', 'users', 'login');
        }            
	}


	function view($id = null) 
    {
		$this->layout = 'admin';
        $this->idEmpty($id, 'index');
        $this->set('comment', $this->Comment->read(null, $id));
	}


	function add() 
    {
        if($this->Auth->user('id') == 1) // identifies if admin logs in
        {                        
    		$this->layout = 'admin';
            if (!empty($this->data)) 
            {
    			$this->Comment->create();
    			if ($this->Comment->save($this->data)) 
                {
                    $this->flashSuccess('The status has been saved', 'index');
    			} 
                else 
                {
    				$this->flashWarning('The status could not be saved. Please, try again.');                
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
    			if ($this->Comment->save($this->data)) 
                {
    				$this->flashSuccess('The status has been saved', 'index');
    			} 
                else 
                {
    				$this->flashWarning('The status could not be saved. Please, try again.');
    			}
    		}
    		
            if (empty($this->data)) 
            {
    			$this->data = $this->Comment->read(null, $id);
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
    		
            if ($this->Comment->delete($id)) 
            {
    			$this->flashSuccess('Comment deleted', 'index');
    		}
            $this->flashWarning('Comment was not deleted', 'index');
        }
        else
        {
            $this->flashWarningGrowl('You are not authorized to access this page!', 'users', 'login');
        }                                                
	}
}
?>