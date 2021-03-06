<li class="item" data-uuid="<?= $item['uuid'] ?>" data-child-controller="<?= $item['childController'] ?>" data-child-uuid="<?= $item['childUuid'] ?>" data-urutan="<?= $item['urutan'] ?>" data-parent="<?= $item['parent'] ?>">
    <div class="item-row">
        <div class="item-col fixed item-col-check">
            <label class="item-check">
              <!-- <i class="fa expand-btn fa-minus-square"></i> -->
              <span></span>
            </label>
        </div>
        <div class="item-col item-col-header fixed col-sm-8">
            <div>
                <a class="btn btn-sm btn-oval btn-status btn-warning unverifiable" target="_blank" href="<?= site_url("Spj/read/{$item['uuid']}") ?>">
                    <i class="fa fa-clock-o"></i>
                    unverifiable
                </a>
                <a class="btn btn-sm btn-oval btn-status btn-success list-verification-btn verifiable" target="_blank" href="<?= site_url("Spj/read/{$item['uuid']}") ?>">
                    <i class="fa fa-check"></i> verify
                </a>
                <a class="btn btn-sm btn-oval btn-status btn-danger list-unverification-btn verifiable" target="_blank" href="<?= site_url("Spj/read/{$item['uuid']}") ?>">
                    <i class="fa fa-ban"></i> unverify
                </a>
                <a class="btn btn-sm btn-oval btn-status btn-success verified" target="_blank" href="<?= site_url("Spj/read/{$item['uuid']}") ?>">
                    <i class="fa fa-check-square-o"></i>
                    verified
                </a>
                <a class="btn btn-sm btn-oval btn-status btn-danger unverified" target="_blank" href="<?= site_url("Spj/read/{$item['uuid']}") ?>">
                    <i class="fa fa-ban"></i>
                    unverified
                </a>

                <a class="btn btn-sm btn-oval btn-payment btn-success fully-paid" href="<?= site_url("SpjPayment/read/{$item['uuid']}") ?>" target="_blank">
                    <i class="fa fa-star"></i>
                    fully paid
                </a>
                <a class="btn btn-sm btn-oval btn-payment btn-warning partially-paid" href="<?= site_url("SpjPayment/read/{$item['uuid']}") ?>" target="_blank">
                    <i class="fa fa-star-half-o"></i>
                    partially paid
                </a>
                <a class="btn btn-sm btn-oval btn-payment btn-danger unpaid" href="<?= site_url("SpjPayment/read/{$item['uuid']}") ?>" target="_blank">
                    <i class="fa fa-star-o"></i>
                    unpaid
                </a>

                <input type="hidden" value="<?= $item['uraian'] ?>" name="<?= "{$item['parent']}[Spj_uraian][]" ?>">
                <input type="hidden" value="<?= $item['vol'] ?>" name="<?= "{$item['parent']}[Spj_vol][]" ?>">
                <input type="hidden" value="<?= $item['sat'] ?>" name="<?= "{$item['parent']}[Spj_sat][]" ?>">
                <input type="hidden" value="<?= $item['hargasat'] ?>" name="<?= "{$item['parent']}[Spj_hargasat][]" ?>">
                <input type="hidden" value="<?= $item['status'] ?>" name="<?= "{$item['parent']}[Spj_status][]" ?>">
                <input type="hidden" value="<?= $item['uuid'] ?>" name="<?= "{$item['parent']}[Spj_uuid][]" ?>">
                <input type="hidden" value="<?= $item['global_status'] ?>" name="<?= "{$item['parent']}[Spj_global_status][]" ?>">
                <input type="hidden" value="<?= $item['payment_status'] ?>" name="<?= "{$item['parent']}[Spj_payment_status][]" ?>">
                <input type="hidden" value="<?= $item['unverify_reason'] ?>" name="<?= "{$item['parent']}[Spj_unverify_reason][]" ?>">
                <input type="hidden" value="<?= $item['unpaid_reason'] ?>" name="<?= "{$item['parent']}[Spj_unpaid_reason][]" ?>">
                <a target="_blank" href="<?= site_url($current['controller']) . '/read/' . $item['uuid'] ?>">
                  <?= "{$item['kode']} {$item['uraian']}" ?>
                </a>
                <?php if (strlen ($item['unverify_reason'])) : ?>
                    <br><small><b>unverify reason:</b> <?= $item['unverify_reason'] ?></small>
                <?php endif ?>
                <?php if (strlen ($item['unpaid_reason'])) : ?>
                    <br><small><b>unpaid reason:</b> <?= $item['unpaid_reason'] ?></small>
                <?php endif ?>
            </div>
        </div>
        <div class="item-col item-col-header text-right">
            <div>
                <span class=""></span>
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