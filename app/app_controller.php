<?php

class AppController extends Controller
{

    var $components = array('Session', 'Menu', 'RequestHandler', 'Email', 'MathCaptcha', 'Auth');
    var $helpers = array('Session', 'Form', 'Html', 'Time', 'Menu', 'Paginator', 'Javascript', 'Lightbox', 'Lightbog', 'Tags.TagCloud', 'Flash', 'Gravatar.Gravatar');


//    function beforeRender()
//    {
//        $this->Online->update($this->here);
//    }

    #Sets up success flash message for view
    function flashSuccess($msg, $url = null)
    {
        $this->Session->setFlash($msg, 'success');
        if(!empty($url))
        {
            $this->redirect($url, null, true);
        }
    }


    #Sets up warning flash message for view
    function flashWarning($msg, $url = null)
    {
        $this->Session->setFlash($msg, 'warning');
        if(!empty($url))
        {
            $this->redirect($url, null, true);
        }
    }

    #Sets up a notice flash message for view
    function flashNotice($msg, $url = null)
    {
        $this->Session->setFlash($msg, 'notice');
        if(!empty($url))
        {
            $this->redirect($url, null, true);
        }
    }

    #Sets up warning flash message for view
    function flashWarningGrowl($msg, $cont, $act)
    {
        $this->Session->setFlash($msg, 'flash_error');
        $this->redirect(array('controller' => $cont, 'action' => $act));
    }



    #checks for id, if no id redirects to given action
    function idEmpty($id, $url = null)
    {
        if (empty($id))
        {
            $this->flashWarning('Invalid ID', $url);
        }
    }


    #returns true if on one of the given actions
    function only($actions = array())
    {
        foreach ($actions as $action)
        {
            if($action == $this->params['action'])
            {
                return true;
            }
        }
        return false;
    }


    /**
     * Takes array of named params, compares them to mandatory and optional fields.
     * All mandatory must be present else returns false.
     * Any optional fields that aren't present will use the default value in the associative array.
     */
    function extractNamedParams($mandatory, $optional = array()) {
    	$params = $this->params['named'];

    	// return false immediately if no params are passed in
    	if(empty($params)) {
    		return false;
    	}

    	// convert to named index array
    	$mandatory = array_flip($mandatory);
    	// define array with all keys to be present
    	$all_named_keys = array_merge($mandatory, $optional);
    	// extract valid keys from passed params
    	$valid = array_intersect_key($params, $all_named_keys);
    	// fill valid array with any missing optional params
    	$output = array_merge($optional, $valid);
    	// check that all keys are present in final output
    	$diff = array_diff_key($all_named_keys, $output);

    	if (empty($diff)) {
    		return $output;
    	} else {
    		return false;
    	}
    }


}
?>