<?php echo head(array('title' => __('Element Manager'))); ?>
<?php echo flash(); ?>

<table>
  <thead>
    <tr>
      <th><?php echo __('Element'); ?></th>
      <th><?php echo __('Actions'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($elements as $element): ?>
      <tr>
        <td><?php echo __($element['element_name']) . ' (' . $element['item_type_names'] . ')'; ?></td>
        <td>
          <a href="<?php echo url("element-manager/index/edit/element_id/{$element['element_id']}"); ?>"><?php echo __('Modify'); ?></a>
          | <a href="<?php echo url("element-manager/index/delete/element_id/{$element['element_id']}"); ?>"><?php echo __('Delete'); ?></a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php echo foot(); ?>
