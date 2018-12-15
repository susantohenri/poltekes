<li class="item form-spj" data-uuid="<?= $item['uuid'] ?>" data-child-controller="<?= $item['childController'] ?>" data-child-uuid="<?= $item['childUuid'] ?>" data-urutan="<?= $item['urutan'] ?>" data-parent="<?= $item['parent'] ?>">
    <input type="hidden" name="<?= "{$item['parent']}[Spj_uuid][]" ?>" value="<?= $item['uuid'] ?>">
    <div class="item-row">
        <div class="item-col">
            <div class="form-group row">
                <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 control-label">Uraian</label>
                      <div class="col-sm-8">
                        <input class="form-control" <?= !in_array('create', $permitted_actions) ? 'disabled="disabled"':'' ?>
                        type="text" value="<?= $item['uraian'] ?>" name="<?= "{$item['parent']}[Spj_uraian][]" ?>" placeholder="Uraian">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 control-label">Volume</label>
                      <div class="col-sm-8">
                        <input class="form-control input-vol" <?= !in_array('create', $permitted_actions) ? 'disabled="disabled"':'' ?>
                        type="text" value="<?= $item['vol_format'] ?>" name="<?= "{$item['parent']}[Spj_vol][]" ?>" data-number="true" placeholder="Volume">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 control-label">Satuan</label>
                      <div class="col-sm-8">
                        <input class="form-control" <?= !in_array('create', $permitted_actions) ? 'disabled="disabled"':'' ?>
                        type="text" value="<?= $item['sat'] ?>" name="<?= "{$item['parent']}[Spj_sat][]" ?>" placeholder="Satuan">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 control-label">Harga Satuan</label>
                      <div class="col-sm-8">
                        <input name="<?= "{$item['parent']}[Spj_hargasat][]" ?>" <?= !in_array('create', $permitted_actions) ? 'disabled="disabled"':'' ?>
                        class="form-control input-hargasat" type="text" value="<?= $item['hargasat_format'] ?>" data-number="true" placeholder="Harga Satuan">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 control-label">PPN</label>
                      <div class="col-sm-8">
                        <input name="<?= "{$item['parent']}[Spj_ppn][]" ?>" <?= !in_array('create', $permitted_actions) ? 'disabled="disabled"':'' ?>
                        class="form-control input-ppn" type="text" value="<?= $item['ppn_format'] ?>" data-number="true" placeholder="PPN">
                      </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 control-label">PPH</label>
                      <div class="col-sm-8">
                        <input name="<?= "{$item['parent']}[Spj_pph][]" ?>" <?= !in_array('create', $permitted_actions) ? 'disabled="disabled"':'' ?>
                        class="form-control input-pph" type="text" value="<?= $item['pph_format'] ?>" data-number="true" placeholder="PPH">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 control-label">Total SPJ</label>
                      <div class="col-sm-8">
                        <input class="form-control total_spj" <?= !in_array('create', $permitted_actions) ? 'disabled="disabled"':'' ?>
                        type="text" value="<?= $item['total_spj'] ?>" disabled="disabled" data-number="true">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 control-label">Alasan Ditolak</label>
                      <div class="col-sm-8">
                        <textarea class="form-control" name="<?= "{$item['parent']}[Spj_unverify_reason][]" ?>" <?= strlen($userDetail['bawahan'][0]) < 1 ? 'disabled="disabled"':'' ?>><?= $item['unverify_reason'] ?></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-9">
                            <a class="btn btn-success form-verification-btn">
                              <i class="fa fa-check-circle"></i> Verify
                            </a>
                            <?php if (strlen($userDetail['bawahan'][0]) > 0): ?>
                            <a class="btn btn-warning form-unverification-btn">
                              <i class="fa fa-times-circle"></i> Unverify
                            </a>
                            <?php endif ?>
                            <a class="btn btn-info" href="<?= site_url("Spj/read/{$item['uuid']}") ?>" target="_blank">
                              <i class="fa fa-info-circle"></i> Detail
                            </a>
                            <a class="btn btn-info" href="<?= site_url("SpjPayment/read/{$item['uuid']}") ?>" target="_blank">
                              <i class="fa fa-info-circle"></i> Payment
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>