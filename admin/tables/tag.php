<?php

defined('_JEXEC') or die('Restricted access');

class OsceTableTag extends JTable
{
	function __construct(&$db)
	{
		parent::__construct('vdpme_osce_tags', 'id', $db);
	}

	function check() {
		// $data=$this->getItem();
		$title= $this->title;
		$db = JFactory::getDBO();
		$query = 'SELECT title FROM #__osce_tags WHERE `title` = ' . $db->quote( $title );
		$db->setQuery($query);
		$results = $db->loadColumn();
		
		

        if (in_array($title,$results)) {
           JError::raiseWarning(500, 'tag already exists');
        	// die("ss");
           return false;
        } 
      
        return true;
    }
}