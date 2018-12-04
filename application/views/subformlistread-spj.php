<li class="item form-spj" data-uuid="<?= $item['uuid'] ?>" data-child-controller="<?= $item['childController'] ?>" data-child-uuid="<?= $item['childUuid'] ?>" data-urutan="<?= $item['urutan'] ?>" data-parent="<?= $item['parent'] ?>">
    <input type="hidden" name="<?= "{$item['parent']}[Spj_uuid][]" ?>" value="<?= $item['uuid'] ?>">
    <div class="item-row">
        <div class="item-col">
            <div class="form-group row">
                <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 control-label">Uraian</label>
                      <div class="col-sm-8">
                        <input class="form-control" type="text" value="<?= $item['uraian'] ?>" name="<?= "{$item['parent']}[Spj_uraian][]" ?>" placeholder="Uraian">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 control-label">Volume</label>
                      <div class="col-sm-8">
                        <input class="form-control input-vol" type="text" value="<?= $item['vol_format'] ?>" name="<?= "{$item['parent']}[Spj_vol][]" ?>" data-number="true" placeholder="Volume">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 control-label">Satuan</label>
                      <div class="col-sm-8">
                        <input class="form-control" type="text" value="<?= $item['sat'] ?>" name="<?= "{$item['parent']}[Spj_sat][]" ?>" placeholder="Satuan">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 control-label">Harga Satuan</label>
                      <div class="col-sm-8">
                        <input name="<?= "{$item['parent']}[Spj_hargasat][]" ?>" class="form-control input-hargasat" type="text" value="<?= $item['hargasat_format'] ?>" data-number="true" placeholder="Harga Satuan">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 control-label">PPN</label>
                      <div class="col-sm-8">
                        <input name="<?= "{$item['parent']}[Spj_ppn][]" ?>" class="form-control input-ppn" type="text" value="<?= $item['ppn_format'] ?>" data-number="true" placeholder="PPN">
                      </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 control-label">PPH</label>
                      <div class="col-sm-8">
                        <input name="<?= "{$item['parent']}[Spj_pph][]" ?>" class="form-control input-pph" type="text" value="<?= $item['pph_format'] ?>" data-number="true" placeholder="PPH">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 control-label">Realisasi</label>
                      <div class="col-sm-8">
                        <input class="form-control realisasi" type="text" value="<?= $item['realisasi'] ?>" disabled="disabled" data-number="true">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 control-label">Alasan</label>
                      <div class="col-sm-8">
                        <textarea class="form-control" disabled="disabled"><?= $item['unverify_reason'] ?></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-9">
                            <a class="btn btn-danger btn-delete" data-uuid="<?= $item['uuid'] ?>">
                              <i class="fa fa-trash-o"></i> Hapus SPJ
                            </a>
                            <a class="btn btn-success verifikasi-ulang-spj">
                              <i class="fa fa-check-circle"></i> Verifikasi Ulang SPJ
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>