<?php

defined('_JEXEC') or die('Restricted access');

JFormHelper::loadFieldClass('list');

class JFormFieldQuesbank extends JFormFieldList
{
	
	protected $type = 'Tag';

	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return  array  An array of JHtml options.
	 */
	protected function getOptions()
	{
		//die("fggdf");
		$db    = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('id,title');
		$query->from('vdpme_osce_tags');
		$db->setQuery((string) $query);
		$messages = $db->loadObjectList();
		$options  = array();

		if ($messages)
		{
			foreach ($messages as $message)
			{
				$options[] = JHtml::_('select.option', $message->id,$message->title);
			}
		}

		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}