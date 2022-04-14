<?php  

defined('_JEXEC') or die('Restricted access');



class OsceControllerQuesbanks extends JControllerAdmin
{
	protected $text_prefix = 'COM_OSCE_QUESBANKS';

	public function getModel($name = 'Quesbank', $prefix = 'OsceModel', $config = array('ignore_request' => true))
	{
		//die("sdf");	
		$model = parent::getModel($name, $prefix, $config);

		return $model;
	}

	public function importques()
	{
		 // die;
		$app = JFactory::getApplication();   
		$input = $app->input;
		// die;
		$files = $input->files->get('jform1');
		$fileexe = $files['type'];
		if($fileexe == "text/csv")
		{
			$filePath= $files['tmp_name'];
			
			$rows = array_map('str_getcsv',file($filePath));
			$header = array_shift($rows);
			$csvDa = [];
			foreach($rows as $row) 
			{
				$row[0] = explode(',',$row[0]);
                $csvDa[] = array_combine($header, $row);
	        }

	        $model = $this->getModel('import');

	        $test = $model->data($csvDa);

	        $saveQues = $model->generateQuestion($test);
	        // echo "<pre>";
	        // print_r($saveQues);
	        // $mapData = $model->addInMap($saveQues);

	        
				// 		// redirect to quiz pge
				// $app = JFactory::getApplication(); 
				
				// $url = JRoute::_('index.php?option=com_osce&view=quesbanks');
				
				// $app->redirect($url);
}
		else
		{
			?>
			<script type="text/javascript">
  			<?php echo "alert('file is not in cvv');"; ?>
			</script>
			<?php 
			
		}
		 $app = JFactory::getApplication(); 
				
		$url = JRoute::_('index.php?option=com_osce&view=quesbanks');
				
		$app->redirect($url);

	}

}