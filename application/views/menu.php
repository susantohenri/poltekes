<nav class="menu">
    <ul class="sidebar-menu metismenu" id="sidebar-menu">
        <li>
            <a href="<?= site_url('Dashboard') ?>"><i class="fa fa-bar-chart-o"></i>Dashboard</a>
        </li>
        <?php if (in_array('User', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('User/') ?>"><i class="fa fa-group"></i>User</a>
        </li>
        <?php endif ?>
        <?php if (in_array('Jabatan', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('Jabatan/') ?>"><i class="fa fa-angle-double-down"></i>Jabatan</a>
        </li>
        <?php endif ?>
        <?php if (in_array('Breakdown', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('Breakdown/') ?>"><i class="fa fa-sitemap"></i>Breakdown Pagu</a>
        </li>
        <?php endif ?>
        <?php if (in_array('Program', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('Program/') ?>"><i class="fa fa-laptop"></i>Program</a>
        </li>
        <?php endif ?>
        <?php if (in_array('Kegiatan', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('Kegiatan/') ?>"><i class="fa fa-tasks"></i>Kegiatan</a>
        </li>
        <?php endif ?>
        <?php if (in_array('Output', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('Output/') ?>"><i class="fa fa-align-justify"></i>Output</a>
        </li>
        <?php endif ?>
        <?php if (in_array('SubOutput', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('SubOutput/') ?>"><i class="fa fa-list-ul"></i>Sub Output</a>
        </li>
        <?php endif ?>
        <?php if (in_array('Komponen', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('Komponen/') ?>"><i class="fa fa-th-large"></i>Komponen</a>
        </li>
        <?php endif ?>
        <?php if (in_array('SubKomponen', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('SubKomponen/') ?>"><i class="fa fa-th"></i>Sub Komponen</a>
        </li>
        <?php endif ?>
        <?php if (in_array('Akun', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('Akun/') ?>"><i class="fa fa-windows"></i>Akun</a>
        </li>
        <?php endif ?>
        <?php if (in_array('Detail', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('Detail/') ?>"><i class="fa fa-gift"></i>Detail</a>
        </li>
        <?php endif ?>
        <?php if (in_array('Spj', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('Spj/') ?>"><i class="fa fa-dropbox"></i>SPJ</a>
        </li>
        <?php endif ?>
    </ul>
</nav>