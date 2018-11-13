<li class="item" data-uuid="<?= $item['uuid'] ?>" data-child-controller="<?= $item['childController'] ?>" data-child-uuid="<?= $item['childUuid'] ?>" data-urutan="<?= $item['urutan'] ?>" data-parent="<?= $item['parent'] ?>">
    <div class="item-row">
        <div class="item-col item-col-header fixed col-sm-9">
            <div>
                <a class="btn btn-sm btn-oval btn-warning unverifiable">
                    <i class="fa fa-clock-o"></i>
                    unverifiable
                </a>
                <a class="btn btn-sm btn-oval btn-success btn-verify verifiable">
                    <i class="fa fa-check"></i> verify
                </a>
                <a class="btn btn-sm btn-oval btn-danger btn-unverify verifiable">
                    <i class="fa fa-ban"></i> unverify
                </a>
                <a class="btn btn-sm btn-oval btn-success verified">
                    <i class="fa fa-check-square-o"></i>
                    verified
                </a>
                <a class="btn btn-sm btn-oval btn-danger unverified">
                    <i class="fa fa-ban"></i>
                    unverified
                </a>
                <input type="hidden" value="<?= $item['uraian'] ?>" name="<?= "{$item['parent']}[Spj_uraian][]" ?>">
                <input type="hidden" value="<?= $item['vol'] ?>" name="<?= "{$item['parent']}[Spj_vol][]" ?>">
                <input type="hidden" value="<?= $item['sat'] ?>" name="<?= "{$item['parent']}[Spj_sat][]" ?>">
                <input type="hidden" value="<?= $item['hargasat'] ?>" name="<?= "{$item['parent']}[Spj_hargasat][]" ?>">
                <input type="hidden" value="<?= $item['status'] ?>" name="<?= "{$item['parent']}[Spj_status][]" ?>">
                <input type="hidden" value="<?= $item['uuid'] ?>" name="<?= "{$item['parent']}[Spj_uuid][]" ?>">
                <a target="_blank" href="<?= site_url($current['controller']) . '/read/' . $item['uuid'] ?>">
                  <?= "{$item['kode']} {$item['uraian']}" ?>
                </a>
                &nbsp;
                <a href="<?= site_url("Jabatan/assignment/{$current['controller']}/{$item['uuid']}") ?>" target="_blank"><i class="fa fa-unlock-alt"></i></a>
            </div>
        </div>
        <div class="item-col item-col-header text-right">
            <div>
                <span class="realisasi"><?= $item['realisasi'] ?></span>
            </div>
        </div>
    </div>
</li>