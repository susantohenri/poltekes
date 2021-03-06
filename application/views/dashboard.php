<article class="content">
    <section class="section">
        <div class="row sameheight-container">

            <div class="col-xl-6">
                <div class="card" data-exclude="xs,sm,lg">
                    <div class="card-header">
                        <div class="header-block">
                            <h3 class="title"> Penyerapan Anggaran </h3>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="tab-content">
                            <div id="dashboard-penyerapan-chart" style="position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card" data-exclude="xs,sm,lg">
                    <div class="card-header">
                        <div class="header-block">
                            <h3 class="title"> Realisasi Volume Keluaran </h3>
                        </div>
                    </div>
                    <div class="card-block">
                        <canvas id="realisasi" style="width: 500px"></canvas>
                        <p style="font-size: 14px; text-align: center">
                            Pagu <b><?= number_format($gauge['pagu'],0,',','.') ?></b><br>
                            Realisasi <b><?= number_format($gauge['realisasi'],0,',','.') ?></b>
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <div class="row sameheight-container">

            <div class="col-xl-6">
                <div class="card" data-exclude="xs,sm,lg">
                    <div class="card-header">
                        <div class="header-block">
                            <h3 class="title"> Komposisi Realisasi Anggaran </h3>
                        </div>
                    </div>
                    <div class="card-block">
                        <div id="dashboard-komposisi-chart" style="position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                        </div>
                        <p style="font-size: 14px; text-align: center">
                            <?php foreach ($komposisiRealisasi as $kr): ?>
                                <?= str_replace('B.', 'Belanja ', $kr->absis) ?> <b>Rp <?= number_format($kr->ordinat, 0, ',', '.') ?></b><br>
                            <?php endforeach ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card" data-exclude="xs,sm,lg">
                    <div class="card-header">
                        <div class="header-block">
                            <h3 class="title"> Komposisi Alokasi Anggaran </h3>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="dashboard-alokasi-chart" id="dashboard-alokasi-chart">
                        </div>
                        <p style="font-size: 14px; text-align: center">
                            <?php foreach ($komposisiAlokasi as $ka): ?>
                                <?= $ka->label ?> <b><?= $ka->value ?> %</b><br>
                            <?php endforeach ?>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>
</article>
<script type="text/javascript">
    var lineData = <?= json_encode($penyerapanAnggaran) ?>;
    var gaugeData = <?= json_encode($gauge) ?>;
    var barData = <?= json_encode($komposisiRealisasi) ?>;
    var donutData = <?= json_encode($komposisiAlokasi) ?>;
</script>