<?php  

defined('_JEXEC') or die;

class OsceViewImport extends JViewLegacy
{
	function display($tpl=null)
	{
		// die;
				$app = JFactory::getApplication();

		ImportHelper::addSubmenu('import');

		parent::display($tpl);

	}

	
}



?>