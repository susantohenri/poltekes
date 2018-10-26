<li class="item" data-uuid="<?= $item['uuid'] ?>" data-child-controller="<?= $item['childController'] ?>" data-child-uuid="<?= $item['childUuid'] ?>" data-urutan="<?= $item['urutan'] ?>" data-parent="<?= $item['parent'] ?>">
    <div class="item-row">
        <div class="item-col">
            <div class="form-group row">

                <div class="col-sm-4">
                    <input class="form-control" type="text" value="<?= $item['uraian'] ?>" name="<?= "{$item['parent']}[Spj_uraian][{$item['uuid']}]" ?>" placeholder="Uraian">
                </div>
                <div class="col-sm-1">
                    <input class="form-control input-vol" type="text" value="<?= $item['vol_format'] ?>" name="<?= "{$item['parent']}[Spj_vol][{$item['uuid']}]" ?>" data-number="true" placeholder="Volume">
                </div>
                <div class="col-sm-2">
                    <select name="<?= "{$item['parent']}[Spj_sat][{$item['uuid']}]" ?>" class="form-control"></select>
                </div>
                <div class="col-sm-2">
                    <input name="<?= "{$item['parent']}[Spj_hargasat][{$item['uuid']}]" ?>"
                    class="form-control input-hargasat" type="text" value="<?= $item['hargasat_format'] ?>" data-number="true" placeholder="Harga Satuan">
                </div>
                <div class="col-sm-2">
                    <input class="form-control jumlah" type="text" value="<?= $item['jumlah'] ?>" disabled="disabled" data-number="true">
                </div>

                <input class="form-control" type="hidden" value="8cf8f63c-d51e-11e8-80ab-d443d25226c6" name="<?= "{$item['parent']}[Spj_uuid][{$item['uuid']}]" ?>" placeholder="UUID">
                
                <div class="col-sm-1">
                  <a class="btn btn-danger btn-delete" data-uuid="8cf8f63c-d51e-11e8-80ab-d443d25226c6">
                    <i class="fa fa-trash-o"></i>
                  </a>
                </div>

            </div>
        </div>
    </div>
</li>