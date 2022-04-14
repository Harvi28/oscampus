<?php  

defined('_JEXEC') or die('Restricted access');


class OsceControllerQuesbank extends JControllerForm
{
    protected $text_prefix = 'COM_OSCE_QUESBANK';

    public function __construct($config = array())
    {
        //die("sdda");
        parent::__construct($config);


    }

    public function postSaveHook($model, $validData)
    {
        //echo "<pre>";
        // die;
        $item = $model->getItem();
        $entryId = $item->get('id');
        // print_r($entryId);
        // echo "<pre>";
        // print_r($validData);
        // die;
        $idlistarr = $validData['tag_id'];
        $idlists = json_encode($idlistarr);
        
        foreach($validData['tag_id'] as $idlist)
        {
            //die("ds");
            $db = JFactory::getDbo();
            $query = $db->getQuery(true);
            $columns=array('quesbank_id','tag_id');
            $values=array($entryId,$idlist);

            $query
                ->insert($db->quoteName('vdpme_osce_quesbank_tags'))
                ->columns($db->quoteName($columns))
                ->values(implode(',',$values));
            $db->setQuery($query);
            $db->execute();
    }

    }
}