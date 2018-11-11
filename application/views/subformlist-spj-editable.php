<li class="item" data-uuid="<?= $item['uuid'] ?>" data-child-controller="<?= $item['childController'] ?>" data-child-uuid="<?= $item['childUuid'] ?>" data-urutan="<?= $item['urutan'] ?>" data-parent="<?= $item['parent'] ?>">
    <div class="item-row">
        <div class="item-col">
            <div class="form-group row">

                <div class="col-sm-3">
                    <input class="form-control" type="text" value="<?= $item['uraian'] ?>" name="<?= "{$item['parent']}[Spj_uraian][]" ?>" placeholder="Uraian">
                </div>
                <div class="col-sm-2">
                    <input class="form-control input-vol" type="text" value="<?= $item['vol_format'] ?>" name="<?= "{$item['parent']}[Spj_vol][]" ?>" data-number="true" placeholder="Volume">
                </div>
                <div class="col-sm-1">
                    <input class="form-control" type="text" value="<?= $item['sat'] ?>" name="<?= "{$item['parent']}[Spj_sat][]" ?>" placeholder="Satuan">
                </div>
                <div class="col-sm-2">
                    <input name="<?= "{$item['parent']}[Spj_hargasat][]" ?>"
                    class="form-control input-hargasat" type="text" value="<?= $item['hargasat_format'] ?>" data-number="true" placeholder="Harga Satuan">
                </div>
                <div class="col-sm-2">
                    <input class="form-control realisasi" type="text" value="<?= $item['realisasi'] ?>" disabled="disabled" data-number="true">
                </div>
                <input type="hidden" value="<?= $item['uuid'] ?>" name="<?= "{$item['parent']}[Spj_uuid][]" ?>">
                <input type="hidden" value="<?= $item['status'] ?>" name="<?= "{$item['parent']}[Spj_status][]" ?>">
                <div class="col-sm-2" style="padding: 0">
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
                    <a class="btn btn-danger btn-delete" data-uuid="<?= $item['uuid'] ?>">
                      <i class="fa fa-trash-o"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</li>