<?php

// No direct access
defined('_JEXEC') or die('Restricted access');

class OsceTableGeneratequiz extends JTable
{
	
	function __construct(&$db)
	{
		parent::__construct('#__osce_tags', 'id', $db);
	}

}