<li class="item" data-uuid="" data-parent="<?= $item['parent'] ?>">
    <div class="item-row">
      <div class="item-col">
				<a class="add-btn btn btn-info" href="<?= site_url("{$this->controller}/create/{$item['parent']}") ?>">
					<i class="fa fa-plus"></i> <?= strtoupper($item['entity']) ?>
				</a>
			</div>
		</div>
</li>