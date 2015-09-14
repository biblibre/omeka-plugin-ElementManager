<?php echo head(array('title' => __('Element Manager'))); ?>
<?php echo flash(); ?>

<h1><?php echo __('Delete element %s', __($element['name'])); ?></h1>

<form method="post" action="<?php echo url('element-manager/index/delete'); ?>">
  <p>
    <?php echo __("You are about to delete an element."); ?>
    <?php echo __("All data attached to this element will be removed too."); ?>
  </p>
  <?php
    echo $this->formHidden('element_id', $element['id']);
    echo $this->formHidden('confirm', '1');
    echo $this->formSubmit('confirm', __('Confirm'));
  ?>
</form>

<?php echo foot(); ?>
