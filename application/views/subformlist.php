<li class="item" data-uuid="<?= $item['uuid'] ?>" data-child-controller="<?= $item['childController'] ?>" data-child-uuid="<?= $item['childUuid'] ?>" data-urutan="<?= $item['urutan'] ?>" data-parent="<?= $item['parent'] ?>">
    <div class="item-row">
        <div class="item-col fixed item-col-check">
            <label class="item-check">
              <i class="fa fa-plus-square<?= 'Spj' === $current['controller'] ? '-o ': ' expand-btn' ?>"></i>
              <span></span>
            </label>
        </div>
        <div class="item-col item-col-header fixed col-sm-8">
            <div>
                <?php $routeToEdit = in_array($current['controller'], array('Detail', 'Spj')) ? 'read' : 'readList' ?>
                <a target="_blank" href="<?= site_url("{$current['controller']}/{$routeToEdit}/{$item['uuid']}") ?>">
                  <?= "{$item['kode']} {$item['uraian']}" ?>
                </a>
                <?php if (in_array("update_{$current['controller']}", $permission) && !in_array($current['controller'], array('Spj', 'Lampiran'))) : ?>
                    &nbsp; <a href="<?= site_url("{$current['controller']}/read/{$item['uuid']}") ?>" class="text-info"><i class="fa fa-pencil-square-o"></i> Edit</a>
                    &nbsp; <a target="_blank" href="<?= site_url("Breakdown/Assign/{$current['controller']}/{$item['uuid']}") ?>" class="text-info"><i class="fa fa-pencil-square"></i> Breakdown</a>
                <?php endif ?>
            </div>
        </div>
        <div class="item-col item-col-header text-right">
            <div>
                <span class="pagu"><?= $item['pagu'] ?></span>
            </div>
        </div>
        <div class="item-col item-col-header text-right">
            <div>
                <span class="total_spj"><?= $item['total_spj'] ?></span>
            </div>
        </div>
        <div class="item-col item-col-header text-right">
            <div>
                <span class="paid"><?= $item['paid'] ?></span>
            </div>
        </div>
    </div>
</li>