<?php

defined('_JEXEC') or die('Restricted access');

class OsceTableQuesbank extends JTable
{
	function __construct(&$db)
	{
		parent::__construct('vdpme_osce_quesbanks', 'id', $db);
	}

	function bind( $array, $ignore = '' )
    {
        if (key_exists( 'tag_id', $array ) && is_array( $array['tag_id'] )) {
	        $array['tag_id'] = implode( ',', $array['tag_id'] );
        }

        return parent::bind( $array, $ignore );
    }

    function check() {
		// $data=$this->getItem();
		$ques= $this->ques;
		$db = JFactory::getDBO();
		$query = 'SELECT ques FROM #__osce_quesbanks WHERE `ques` = ' . $db->quote( $ques );
		$db->setQuery($query);
		$results = $db->loadColumn();
		
		

        if (in_array($ques,$results)) {
           JError::raiseWarning(500, 'question already exists');
        	// die("ss");
           return false;
        } 
      
        return true;
    }

}