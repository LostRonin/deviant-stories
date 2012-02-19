<?php
App::import('Sanitize');

class ImagesController extends AppController {

	var $name = 'Images';
    
    
    var $paginate = array('limit' => 9, 
                        'conditions' => array('Image.status_id' => 2),
                        'order' => 'Image.id DESC');    
    
    function beforeFilter()
    {
        parent::beforeFilter();
        
        if($this->only(array('add', 'edit')))
        {
            $this->__lists();
        }
    }    

    function gallery()
    {        
        $imageLists = $this->paginate('Image');
        $stats = $this->Image->stats();       
        $this->set(compact('imageLists', 'stats'));
    }
    

	function comment($image_id) 
    {        
        $imageContent = $this->Image->getImage($image_id);       
        $stats = $this->Image->lastId();


		if (!$image_id) {
			//$this->_flash(__('Invalid Post.', true),'error');
			$this->redirect(array('action'=>'comment'));
		}

		// save the comment
		if (!empty($this->data['Comment'])) {
			$this->data['Comment']['class'] = 'Image'; 
            
			$this->data['Comment']['foreign_id'] = $image_id;
            $this->data['Comment']['name'] = $this->Session->read('Auth.User.username');
            $this->data['Comment']['email'] = $this->Session->read('Auth.User.email');
            
            $cc = $this->data['Comment']['class'];
            $fi = $this->data['Comment']['foreign_id'];            
             
			$this->Image->Comment->create();
             
			if ($this->Image->Comment->save(Sanitize::paranoid($this->data, array(
                       ' ', '@', '.', ',', ';', '?', '!', ':', '-', '_', '"')), false)) 
            {
				$this->Session->setFlash(__('The Comment has been saved.', true),'success');
				$this->redirect(array('action'=>'comment',$image_id));
			}
			$this->Session->setFlash(__('The Comment could not be saved. Please, try again.', true),'warning');
		}

		// set the view variables
		$comments = $this->Image->read(null, $image_id); // contains $post['Comments']
		$this->set(compact('comments', 'cc', 'fi'));
        $this->set(compact('imageContent', 'stats'));
	}


	function index() 
    {
        if($this->Auth->user('id') == 1) // identifies if admin logs in
        {                                            	   
    		$this->layout = 'admin';
            $this->Image->recursive = 0;
    		$this->set('images', $this->paginate());
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
            $this->set('image', $this->Image->read(null, $id));
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
    			$this->Image->create();
    			if ($this->Image->save($this->data)) 
                {
    				$this->flashSuccess('This image has been saved', 'index');
    			} 
                else 
                {
    				$this->flashWarning('This image could not be saved. Please, try again.');
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
    			if ($this->Image->save($this->data)) 
                {
    				$this->flashSuccess('This image has been saved', 'index');
    			} 
                else 
                {
    				$this->flashWarning('This image could not be saved. Please, try again.');
    			}
    		}
    		
            if (empty($this->data)) 
            {
    			$this->data = $this->Image->read(null, $id);
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
    		
            if ($this->Image->delete($id)) 
            {
    			$this->flashSuccess('Image deleted', 'index');
    		}
    		
            $this->flashWarning('Image was not deleted', 'index');
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
		$statuses = $this->Image->Status->find('list');
		$users = $this->Image->User->find('list');
		$this->set(compact('statuses', 'users'));
    } 
    
}
?>