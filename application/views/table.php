<article class="content responsive-tables-page">
    <div class="title-block">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="title"> <?= $page_title ?> </h1>
                <p class="title-description"> <?= $page_title ?> Management </p>
            </div>
            <div class="col-sm-6 text-right">
                <a href="<?= site_url($current['controller'] . '/create') ?>" class="btn btn-primary" style="font-size: 14px">
                    <i class="fa fa-plus"></i>&nbsp;Add New <?= $page_title ?>
                </a>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card card-block">
            <table class="table table-bordered table-striped datatable table-model"></table>
        </div>
    </section>
</article>