<article class="content responsive-tables-page">
    <div class="title-block">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="title"> <?= $page_title ?> </h1>
                <p class="title-description"> <?= $page_title ?> Management </p>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card card-block">
          <form action="<?= site_url($current['controller']) ?>" class="form-horizontal form-groups" enctype="multipart/form-data" method="POST">
		        <input type="hidden" name="last_submit" value="<?= time() ?>">
		        <input type="hidden" name="delete" value="<?= $uuid ?>">

		        <div class="text-center">
		          <h1>Apakah Anda Yakin ?</h1>
		          <button class="btn btn-danger"><i class="fa fa-check"></i> &nbsp; Ya</button>
		          <a href="<?= site_url($current['controller']) ?>" class="btn btn-info"><i class="fa fa-arrow-left"></i> &nbsp; Tidak</a>
		        </div>
		      </form>
			  </div>
		</section>
</article>