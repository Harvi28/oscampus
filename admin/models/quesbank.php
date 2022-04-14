<?php

defined('_JEXEC') or die('Restricted access');


class OsceModelQuesbank extends JModelAdmin
{
		//protected $messages;

	public function getTable($type = 'Quesbank', $prefix = 'OsceTable', $config = array())
	{
		//die("sdsf");
		return JTable::getInstance($type, $prefix, $config);
	}
 	

	public function getForm($data = array(), $loadData = true)
	{
		
		$app = JFactory::getApplication();
		
		$form = $this->loadForm('com_osce.quesbank','quesbank',array('control' => 'jform','load_data' => $loadData));
		
		if (empty($form))
		{
			//die("sdf");
			return false;
		}

		return $form;
	}

	

	protected function loadFormData()
	{
		
		$data = JFactory::getApplication()->getUserState(
			'com_osce.edit.quesbank.data',
			array()
		);

		if (empty($data))
		{
			// die("sdf");
			$data = $this->getItem();
			
		}

		return $data;
	}

	public function save($csvDa)
	{
		
		$jinput = JFactory::getApplication()->input;
		$data = $jinput->get('jform', array(),'post' ,'array');
		
		
		$db = JFactory::getDbo();
	

		$data['tag_id'] = json_encode($data['tag_id']);

		$did=$jinput->get('id');
		
			
		if($did !== 0)
		{
				$db = JFactory::getDbo();
				$query = $db->getQuery(true);
				$conditions = array($db->quoteName('quesbank_id') . ' = ' . $did); 
				
				$query->delete($db->quoteName('#__osce_quesbank_tags'))->where($conditions);
				$db->setQuery($query);
				$result = $db->execute();
				
				
		}


		return parent::save($data);

	}


 
}