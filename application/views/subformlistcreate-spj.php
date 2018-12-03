<li class="item form-spj" data-uuid="" data-child-controller="" data-child-uuid="" data-urutan="" data-parent="<?= $item['parent'] ?>">
    <div class="item-row">
        <div class="item-col">
            <div class="form-group row">

                <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 control-label">Uraian</label>
                      <div class="col-sm-8">
                        <input class="form-control" type="text" name="<?= "{$item['parent']}[Spj_uraian][]" ?>" placeholder="Uraian">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 control-label">Volume</label>
                      <div class="col-sm-8">
                        <input class="form-control input-vol" type="text" name="<?= "{$item['parent']}[Spj_vol][]" ?>" data-number="true" placeholder="Volume">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 control-label">Satuan</label>
                      <div class="col-sm-8">
                        <input class="form-control" type="text" name="<?= "{$item['parent']}[Spj_sat][]" ?>" placeholder="Satuan">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 control-label">Harga Satuan</label>
                      <div class="col-sm-8">
                        <input name="<?= "{$item['parent']}[Spj_hargasat][]" ?>" class="form-control input-hargasat" type="text" data-number="true" placeholder="Harga Satuan">
                      </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 control-label">PPN</label>
                      <div class="col-sm-8">
                        <input name="<?= "{$item['parent']}[Spj_ppn][]" ?>" class="form-control input-ppn" type="text" data-number="true" placeholder="PPN">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 control-label">PPH</label>
                      <div class="col-sm-8">
                        <input name="<?= "{$item['parent']}[Spj_pph][]" ?>" class="form-control input-pph" type="text" data-number="true" placeholder="PPH">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 control-label">Realisasi</label>
                      <div class="col-sm-8">
                        <input class="form-control realisasi" type="text" disabled="disabled" data-number="true">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-9">
                            <a class="btn btn-danger btn-delete" data-uuid="">
                              <i class="fa fa-trash-o"></i> Batal
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</li>