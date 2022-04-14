<?php

 // die;
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
JHtml::_('formbehavior.chosen', 'select',null,array('search_contains' => true));
JHtml::_('jquery.framework', false);
JHtml::_('behavior.core');
JHtml::_('behavior.formvalidator');
// JHtml::_('behavior.multiselect');

?>

  <form action="index.php?option=com_osce&view=generatequiz&task=generatequiz.generate" method="post" id="adminform" name="adminform" class="form-validate">
  <div class="group">

    <div class="form-horizontal">
      <fieldset class="siteform">
        
          <div class="row-fluid">
              <?php  
              
                     foreach($this->form->getFieldset() as $field) {
                            
                            // echo "<pre>";print_r($field->jform_tags[1]);
                            echo $field->renderField();        
                        }


              ?> 
          </div>
      </fieldset>
    </div> 
   <div class="span6">
          <?php
            echo JLayoutHelper::render(
              'joomla.searchtools.default',
              array('view' => $this)
            );
          ?>
    </div> 
    <div class="btn-toolbar">
    <div class="btn-group">
      <button type="submit" class="btn btn-primary">
        <span class="icon-ok"></span><?php echo JText::_('Generate') ?>
      </button>
    </div>
    </div>
        
  </div>
  <input type="hidden" name="generatequiz.save"/>
    <?php echo JHtml::_('form.token'); ?>

</form>


  <script type="text/javascript">
    jQuery(document).ready(function($){
// window.setInterval('refresh()', 10000);   
    // Call a function every 10000 milliseconds 
    // (OR 10 seconds).

    // Refresh or reload page.
    // function refresh() {
        // window .location.reload();
    // }
      // $('#jform_tags').chosen();
      // $('.chzn-container chzn-container-multi chzn-with-drop chzn-container-active').chosen().change(function(event,val){
      //     const tag_id = val.selected
      //     console.log(tag_id);
      /*$.ajax({
          type: "POST",
          url: "index.php?option=com_osce&task=generatequiz.getQuebyTagsId",
          data: JSON.stringify({id: tag_id}),
          contentType: "application/json; charset=utf-8",
          dataType: 'json',
          success: function(res){
            console.log(res)
            // ploatQuetions(res);

          },
          error: function(err){
            console.log(err)
          }
        });*/
      // });
    });

  </script>
 