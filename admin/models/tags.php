<?php  
defined('_JEXEC') or die('Restricted access');


class OsceModelTags extends JModelList
{
	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id',
				'title'
				
			);
		}

		parent::__construct($config);
	}

	public function getListQuery()
	{
		//die("ss");
		$db    = JFactory::getDbo();
		// echo "<pre>";
		// print_r($db);
		// die("fd");
		$query = $db->getQuery(true);

		// Create the base select statement.
		$query->select('*')
                ->from($db->quoteName('#__osce_tags'));
        // echo "<pre>";
        // print_r($query);
        // die();

		return $query;
	}

	public function getTags(){
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select($db->quoteName(array('id', 'title')));
		$query->from($db->quoteName('#__osce_tags'));
		$db->setQuery($query);
		return $db->loadObjectList();

	}

	public function getQuebyTagsId(){
		 die("sds");
		$req_body = file_get_contents('php://input');
		$data = json_decode($req_body);
		$dataid = $data->id;

		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select($db->quoteName(array('a.quesbank_id','b.ques','b.opt1','b.opt2','b.opt3','b.opt4','correct_ans')));
		$query->from($db->quoteName('#__osce_quesbank_tags','a'));
		$query->JOIN('INNER',$db->quoteName('#__osce_quesbanks','b') . 'ON' .$db->quoteName('a.quesbank_id'). '=' .$db->quoteName('b.id') );
		$query->where($db->quoteName('a.tag_id') . "=". (int)$dataid);
		$db->setQuery($query);
		$results = $db->loadObjectList();
		//$result = objectTo
		
		return $results;

	}

}

?>