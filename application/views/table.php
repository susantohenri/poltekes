<article class="content responsive-tables-page">
    <div class="title-block">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="title"> <?= $page_title ?> </h1>
                <p class="title-description"> Manajemen <?= $page_title ?> </p>
            </div>

            <?php if (in_array("create_{$current['controller']}", $permission)) : ?>
            <div class="col-sm-6 text-right">
                <a href="<?= site_url($current['controller'] . '/create') ?>" class="btn btn-primary">
                    <i class="fa fa-plus"></i>&nbsp;Add New <?= $page_title ?>
                </a>
            </div>
            <?php endif ?>

        </div>
    </div>
    <section class="section">
        <div class="card card-block">
            <table class="table table-bordered table-striped datatable table-model">
            </table>
        </div>
    </section>
</article>
<script type="text/javascript">
    var allow_read = <?= in_array("read_{$current['controller']}", $permission) ?>
</script>