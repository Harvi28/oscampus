<?php  
defined('_JEXEC') or die('Restricted access');


class OsceModelImport extends JModelList
{
	public function data($csvDa)
	{
		// echo "<pre>";
		// print_r($csvDa);
		// die;

		$dCount= count($csvDa);
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select(array('id','title'));
		$query->from($db->quoteName('#__osce_tags'));
		$db->setQuery($query);
		$tagsR = $db->loadAssocList('id');
	

		 $tags = [];
		 foreach($tagsR as $tsgK=>$tagr){
		 	$tags[$tsgK] = $tagr['title'];
		 }


		 // echo "<pre>";
		 // print_r($csvDa);
		 // die;

		foreach($csvDa as $csvDK=>$singleEntry)
		{
			$tagsId = [];
			foreach($singleEntry['title'] as $titleKey=>$title)
			{
				if(!in_array($title, $tags))
				{
					// die("hiii");
					$insertedId = $this->insertTag($title);
					// die;

					$tags[$insertedId] = $title;
					$csvDa[$csvDK]['title'][$titleKey] = $insertedId;
				}
				
				else
				{
					$csvDa[$csvDK]['title'][$titleKey] = array_search($title, $tags);
	
				}


			}
	
		}


		return $csvDa;
	}
	private function insertTag($tagName)
	{
		// code..
		// print_r($csvDa);
		// die;
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->insert($db->quoteName('#__osce_tags'))
				  ->columns($db->quoteName('title'))
				  ->values("'".$tagName."'");
		// echo $query;
		$db->setQuery($query);
		$insertedList = $db->execute();
		$new_row_id = $db->insertid();
		return $new_row_id;

	}


	public function generateQuestion($test)
	{
		// die;
		// echo "<pre>";
		// print_r($test);
		// die;
		foreach($test as $t)
		{
			// echo "<pre>";
			// print_r($t['title']);
			// die;
			$t['title'] = json_encode($t['title']);

			$columns = array('tag_id','ques','opt1','opt2','opt3','opt4','correct_ans','created_by','modified_by');

			$db    = JFactory::getDbo();
			$query = $db->getQuery(true);
			$query->insert($db->quoteName('#__osce_quesbanks'))
					  ->columns($db->quoteName($columns))
					  ->values("'".$t['title']."', '".$t['ques']."', '".$t['opt1']."', '".$t['opt2']."', '".$t['opt3']."', '".$t['opt4']."', '".$t['correct ans']."','".$t['created by']."','".$t['modified by']."'");

					 // echo $query;
			
			$db->setQuery($query);
		$insertedQuestion = $db->execute();
		$lastInsertedID = $db->insertid();
		$mapData = $this->addInMap($lastInsertedID);
		// return $lastInsertedID;
		
		}
	}

	public function addInMap($lastInsertedID)
	{
		
			$db = JFactory::getDbo();
			$query = $db->getQuery(true);
			$query->select($db->quoteName(array('id', 'tag_id')));
			$query->from($db->quoteName('#__osce_quesbanks'));
			$query->where($db->quoteName('id') . ' LIKE ' . $db->quote($lastInsertedID));
			// echo $query;
			// die("dfsd");
			$db->setQuery($query);
			$results = $db->loadAssocList();
			// echo "<pre>";
			// print_r($results);
			// die;

			foreach($results as $key=>$val)
			{
				$qid = $val['id'];
				
				foreach($val as $skey=>$sval)
				{

					$sval = json_decode($sval);
					// echo $sval;
					 foreach($sval as $mkey=>$mval)
					 {
					 	// echo $mval;
					 	$db    = JFactory::getDbo();
						$query = $db->getQuery(true);
						$columns = array('quesbank_id','tag_id');
						$query->insert($db->quoteName('#__osce_quesbank_tags'))
							   ->columns($db->quoteName($columns))
					  			->values("'".$qid."', '".$mval."'");
					  	$db->setQuery($query);
						$finald = $db->execute();
						// echo $finald;
						// die;
						
					  	// return $finald;
					 }

				}
			}	
	}
	
	
}
