<?php echo head(array('title' => __('Element Manager'))); ?>
<?php echo flash(); ?>

<h1><?php echo __('Modify element %s', __($element['name'])); ?></h1>

<form method="post" action="<?php echo url('element-manager/index/save'); ?>">
  <div>
    <?php
      echo $this->formHidden('element_id', $element['id']);
      $name = 'name';
      echo $this->formLabel($name, __('Name'));
      echo ' ';
      echo $this->formText($name, $element['name']);
    ?>
  </div>
  <?php
    echo $this->formSubmit('save', __('Save'));
  ?>
</form>

<?php echo foot(); ?>
