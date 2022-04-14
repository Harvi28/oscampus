<?php  

defined('_JEXEC') or die('Restricted Access');
//$listOrder     = $this->escape($this->state->get('list.ordering'));
//$listDirn      = $this->escape($this->state->get('list.direction'));
?>
<form action="index.php?option=com_osce&view=tags" method="post" id="adminForm" name="adminForm">
	<div id="j-sidebar-container" class="span2">
      		<?php echo JHtmlSidebar::render(); ?>
    </div>
    <div id="j-main-container" class="span10">
	<div class="row-fluid">
		
	</div>
	<table class="table table-striped table-hover">
		<thead>
		<tr>
			<th width="2%"><?php echo JText::_('COM_OSCE_NUM'); ?></th>
			<th width="3%">
				<?php echo JHtml::_('grid.checkall'); ?>
			</th>

			
			<th width="15%">
				<?php echo JHtml::_('searchtools.sort', 'COM_OSCE_ID', 'id'); ?>
			</th>
			<th width="15%">
				<?php echo JHtml::_('searchtools.sort', 'COM_OSCE_TITLE', 'title'); ?>
			</th>
			<th width="15%">
				<?php echo JHtml::_('searchtools.sort', 'COM_OSCE_CREATED_BY', 'created_by'); ?>
			</th>
			<th width="15%">
				<?php echo JHtml::_('searchtools.sort', 'COM_OSCE_CREATED_ON', 'created_on'); ?>
			</th>
			<th width="15%">
				<?php echo JHtml::_('searchtools.sort', 'COM_OSCE_MODIFIED_BY', 'modified_by'); ?>
			</th>
			<th width="15%">
				<?php echo JHtml::_('searchtools.sort', 'COM_OSCE_MODIFIED_ON', 'modified_on'); ?>
			</th>
			
		</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="8">
					<?php //echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
		

			<?php if (!empty($this->items)) : ?>
				<?php foreach ($this->items as $i => $row) : 
					

					$link = JRoute::_('index.php?option=com_osce&view=tag&task=tag.edit&id=' . $row->id);
					
					
				?>

					<tr>
						<td>
							<?php echo $this->pagination->getRowOffset($i); ?>
						</td>

						<td>
							<?php echo JHtml::_('grid.id', $i, $row->id); ?>
						</td>

						

						<td align="center">
							<?php echo $row->id; ?>
						</td>
						<td align="center">
							<a href="<?php echo $link; ?>">
								<?php echo $row->title; ?>
							</a>
						</td>
						<td align="center">
							<?php echo $row->created_by; ?>
						</td>
						<td align="center">
							<?php echo $row->created_on; ?>
						</td>
						<td align="center">
							<?php echo $row->modified_by; ?>
						</td>
						<td align="center">
							<?php echo $row->modified_on; ?>
						</td>
						
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>

	<input type="hidden" name="task" value=""/>
	<input type="hidden" name="boxchecked" value="0"/>
	
	<?php echo JHtml::_('form.token'); ?>
</form>