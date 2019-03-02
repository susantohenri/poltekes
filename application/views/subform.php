<div class="form-group row" data-urutan="<?= isset ($item) ? $item['urutan'] : '' ?>">

    <?php foreach ($form as $field) : ?>
        <?php switch($field['type']): case 'hidden': ?>
            <input class="form-control" type="<?= $field['type'] ?>" value="<?= $field['value'] ?>" name="<?= "{$controller}_" ?><?= $field['name'] ?>[<?= $uuid ?>]" <?= $field['attr'] ?> placeholder="<?= $field['label'] ?>">
        <?php break; ?>
        <?php case 'select': if(preg_match('/(multiple)/', $field['attr']) > 0) echo '<input type="hidden" name="'.$controller.'_'.$field['name'].'">'; ?>
          <div class="input-group col-sm-<?= $field['width'] ?>">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><?= $field['label'] ?></span>
            </div>
            <select class="form-control" name="<?= "{$controller}_" ?><?= $field['name'] ?>[<?= $uuid ?>]" <?= $field['attr'] ?>>
            <?php foreach ($field['options'] as $opt): ?>
            <option <?= $opt['value'] === $field['value'] || (is_array($field['value']) && in_array($opt['value'], $field['value'])) ? 'selected="selected"':'' ?> value="<?= $opt['value'] ?>"><?= $opt['text'] ?></option>
            <?php endforeach ?>
            </select>
          </div>
        <?php break; ?>
        <?php case 'textarea': ?>
        <!-- not yet available at this moment -->
        <?php break; ?>
        <?php default: ?>
          <div class="input-group col-sm-<?= $field['width'] ?>">
            <div class="input-group-prepend">
              <span class="input-group-text"><?= $field['label'] ?></span>
            </div>
            <input class="form-control" type="<?= $field['type'] ?>" value="<?= htmlentities($field['value']) ?>" name="<?= "{$controller}_" ?><?= $field['name'] ?>[<?= $uuid ?>]" <?= $field['attr'] ?> placeholder="<?= $field['label'] ?>">
          </div>
        <?php break; ?>
        <?php endswitch; ?>
    <?php endforeach ?>

    <?php if (in_array("delete_{$controller}", $permission)) : ?>
    <div class="col-sm-1">
      <a class="btn btn-danger btn-delete" data-uuid="<?= $uuid ?>">
        <i class="fa fa-trash-o"></i>
      </a>
    </div>
    <?php endif ?>
    <?php if (in_array("read_{$controller}", $permission)) : ?>
    <div class="col-sm-1">
      <a class="btn btn-info" href="<?= site_url("{$controller}/read/{$uuid}") ?>" target="_blank">
        <i class="fa fa-external-link"></i>
      </a>
    </div>
    <?php endif ?>

</div>
