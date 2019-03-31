<article class="content responsive-tables-page">
  <form action="<?= site_url($current['controller']) ?>" method="POST" class="main-form">
    <div class="title-block">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="title"> <?= $page_title ?> </h1>
                <p class="title-description"> Manajemen <?= $page_title ?> </p>
            </div>
            <div class="col-sm-6 text-right">
                <?php if((empty($uuid) && in_array("create_{$current['controller']}", $permission)) || (!empty($uuid) && in_array("update_{$current['controller']}", $permission))) : ?>
                <button class="btn btn-info btn-save"><i class="fa fa-save"></i> &nbsp; Simpan</button>
                <?php endif ?>
                <?php if (!empty ($uuid) && in_array("delete_{$current['controller']}", $permission)): ?>
                <a href="<?= site_url($current['controller'] . "/delete/$uuid") ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i> &nbsp; Hapus</a>
                <?php endif ?>
                <?php if (!empty ($uuid) && in_array("verify_{$current['controller']}", $permission)): ?>
                <a href="<?= site_url($current['controller'] . "/verify/$uuid") ?>" class="btn btn-success"><i class="fa fa-check"></i> &nbsp; Verify</a>
                <?php endif ?>
                <?php if (!empty ($uuid) && in_array("unverify_{$current['controller']}", $permission)): ?>
                <a href="<?= site_url($current['controller'] . "/unverify/$uuid") ?>" class="btn btn-danger"><i class="fa fa-times"></i> &nbsp; Unverify</a>
                <?php endif ?>
                <a href="<?= site_url($current['controller']) ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> &nbsp; Batal</a>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card card-block">
            <div class="form-horizontal form-groups">
            <input type="hidden" name="last_submit" value="<?= time() ?>">        

            <?php foreach ($form as $field) : ?>

                <?php switch($field['type']): case 'hidden': ?>
                    <input class="form-control" type="<?= $field['type'] ?>" value="<?= $field['value'] ?>" name="<?= $field['name'] ?>" <?= $field['attr'] ?>>
                <?php break; ?>
                <?php case 'select': ?>
                    <div class="form-group row">
                      <label class="col-sm-2 control-label"><?= $field['label']  ?></label>
                      <div class="col-sm-9">
                        <?php if(preg_match('/(multiple)/', $field['attr']) > 0): ?>
                        <input type="hidden" name="<?= str_replace('[]','',$field['name']) ?>">
                        <?php endif ?>
                        <select class="form-control" name="<?= $field['name'] ?>" <?= $field['attr'] ?>>
                            <?php foreach ($field['options'] as $opt): ?>
                            <option <?= $opt['value'] === $field['value'] || (is_array($field['value']) && in_array($opt['value'], $field['value'])) ? 'selected="selected"':'' ?> value="<?= $opt['value'] ?>"><?= $opt['text'] ?></option>
                            <?php endforeach ?>
                        </select>
                      </div>
                    </div>
                <?php break; ?>
                <?php case 'textarea': ?>
                    <div class="form-group row">
                      <label class="col-sm-2 control-label"><?= $field['label']  ?></label>
                      <div class="col-sm-9">
                        <textarea class="form-control" name="<?= $field['name'] ?>" <?= $field['attr'] ?> ></textarea>
                      </div>
                    </div>
                <?php break; ?>
                <?php default: ?>
                    <div class="form-group row">
                      <label class="col-sm-2 control-label"><?= $field['label']  ?></label>
                      <div class="col-sm-9">
                        <input class="form-control" type="<?= $field['type'] ?>" value="<?= htmlentities($field['value']) ?>" name="<?= $field['name'] ?>" <?= $field['attr'] ?>>
                      </div>
                    </div>
                <?php break; ?>
                <?php endswitch; ?>

            <?php endforeach ?>

            <?php foreach ($subform as $subfield) : ?>
              <hr>
              <fieldset class="form-child" data-controller="<?= $subfield['controller'] ?>" data-uuids="<?= str_replace('"', "'", json_encode($subfield['uuids'])) ?>">
                <legend><?= $subfield['label'] ?></legend>
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-12">
                    <?php if((empty($subfield->uuids) && in_array("create_{$subfield['controller']}", $permission)) || (!empty($subfield->uuids) && in_array("update_{$subfield['controller']}", $permission))) : ?>

                      <?php if (in_array($subfield['controller'], array('Spj', 'SpjPayment'))) : ?>
                      <a class="btn btn-warning btn-sm" href="<?= site_url("{$subfield['controller']}/create/{$uuid}") ?>" target="_blank">
                        <i class="fa fa-plus"></i> &nbsp;Input <?= $subfield['label'] ?>
                      </a>
                      <?php else : ?>
                      <a class="btn btn-warning btn-sm btn-add">
                        <i class="fa fa-plus"></i> &nbsp;Input <?= $subfield['label'] ?>
                      </a>
                      <?php endif ?>

                    <?php endif ?>
                  </div>
                </div>
              </fieldset>
            <?php endforeach ?>
            <?= !empty($subform) ? '<hr>':'' ?>
            </div>
        </div>
    </section>
  </form>
</article>