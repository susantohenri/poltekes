<style type="text/css">
  .fa.fa-plus-square, .fa.fa-minus-square {cursor: pointer}
  .fa.fa-plus-square:hover, .fa.fa-minus-square:hover {color: #fe821d}
  .form-group {margin-bottom: 0}
  ul li div span {font-size: 14px}
  #form_list, #form_list input, #form_list select {font-size: 14px}
</style>
<article class="content responsive-tables-page">
    <div class="title-block">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="title"> <?= $page_title ?> </h1>
                <p class="title-description"> Detail <?= $page_title ?> </p>
            </div>
            <div class="col-sm-6 text-right">
                <?php if (in_array('update', $permitted_actions)) : ?>
                <a class="btn btn-info btn-save"><i class="fa fa-save"></i> Simpan</a>
                <?php endif ?>
                <?php if (in_array('delete', $permitted_actions)) : ?>
                <a href="<?= site_url($current['controller'] . "/delete/{$item['uuid']}") ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i> &nbsp; Hapus</a>
                <?php endif ?>
                <a href="<?= site_url($current['controller']) ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card items">
          <ul class="item-list striped">
            <li class="item item-list-header">
                <div class="item-row">
                    <div class="item-col fixed item-col-check">
                        <label class="item-check">
                          &nbsp;
                          <span></span>
                        </label>
                    </div>
                    <div class="item-col item-col-header fixed col-sm-9">
                        <div>
                            <span>URAIAN</span>
                        </div>
                    </div>
                    <div class="item-col item-col-header text-right">
                        <div>
                            <span class="">PAGU</span>
                        </div>
                    </div>
                    <div class="item-col item-col-header text-right">
                        <div>
                            <span class="">REALISASI</span>
                        </div>
                    </div>
                </div>
            </li>
            <form method="POST" action="<?= site_url($current['controller']) ?>" enctype="multipart/form-data" id="form_list">
                <input type="hidden" name="last_submit" value="<?= time() ?>">        
                <li class="item item-list-header" data-uuid="<?= $item['uuid'] ?>" data-child-controller="<?= $item['childController'] ?>" data-child-uuid="<?= $item['childUuid'] ?>">
                    <div class="item-row">
                        <div class="item-col fixed item-col-check">
                            <label class="item-check">
                              <i class="fa fa-plus-square expand-btn"></i>
                              <span></span>
                            </label>
                        </div>
                        <div class="item-col item-col-header fixed col-sm-9">
                            <div>
                                <span><?= "{$item['kode']} {$item['uraian']}" ?></span>
                            </div>
                        </div>
                        <div class="item-col item-col-header text-right">
                            <div>
                                <span class="pagu"><?= $item['pagu'] ?></span>
                            </div>
                        </div>
                        <div class="item-col item-col-header text-right">
                            <div>
                                <span class="realisasi"><?= $item['realisasi'] ?></span>
                            </div>
                        </div>
                    </div>
                </li>
            </form>
          </ul>
            
        </div>
    </section>
</article>