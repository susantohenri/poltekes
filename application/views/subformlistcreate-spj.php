<style type="text/css">
    .new-spj [class^="col-sm-"] {
        margin-bottom: 5px
    }
</style>
<li class="item new-spj" data-uuid="" data-child-controller="" data-child-uuid="" data-urutan="" data-parent="<?= $item['parent'] ?>">
    <div class="item-row">
        <div class="item-col">
            <div class="form-group row">

                <div class="col-sm-4">
                    <input class="form-control" type="text" value="" name="<?= "{$item['parent']}[Spj_uraian][]" ?>" placeholder="Uraian">
                </div>
                <div class="col-sm-2">
                    <input class="form-control input-vol" type="text" value="" name="<?= "{$item['parent']}[Spj_vol][]" ?>" data-number="true" placeholder="Volume">
                </div>
                <div class="col-sm-2">
                    <input class="form-control" type="text" value="" name="<?= "{$item['parent']}[Spj_sat][]" ?>" placeholder="Satuan">
                </div>
                <div class="col-sm-3">
                    <input name="<?= "{$item['parent']}[Spj_hargasat][]" ?>"
                    class="form-control input-hargasat" type="text" value="" data-number="true" placeholder="Harga Satuan">
                </div>
                <div class="col-sm-2">
                    <input name="<?= "{$item['parent']}[Spj_ppn][]" ?>"
                    class="form-control input-ppn" type="text" value="" data-number="true" placeholder="PPN">
                </div>
                <div class="col-sm-2">
                    <input name="<?= "{$item['parent']}[Spj_pph][]" ?>"
                    class="form-control input-pph" type="text" value="" data-number="true" placeholder="PPH">
                </div>
                <div class="col-sm-2">
                    <input class="form-control realisasi" type="text" value="" disabled="disabled" data-number="true">
                </div>

                <div class="col-sm-1">
                  <a class="btn btn-danger btn-delete" data-uuid="">
                    <i class="fa fa-trash-o"></i>
                  </a>
                </div>

            </div>
        </div>
    </div>
</li>