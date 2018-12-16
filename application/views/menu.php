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
        <?php if (in_array('Program', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('Program/') ?>"><i class="fa fa-laptop"></i>Program</a>
        </li>
        <?php endif ?>
        <?php if (in_array('KegiatanProgram', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('KegiatanProgram/') ?>"><i class="fa fa-tasks"></i>Kegiatan</a>
        </li>
        <?php endif ?>
        <?php if (in_array('OutputProgram', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('OutputProgram/') ?>"><i class="fa fa-align-justify"></i>Output</a>
        </li>
        <?php endif ?>
        <?php if (in_array('SubOutputProgram', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('SubOutputProgram/') ?>"><i class="fa fa-list-ul"></i>Sub Output</a>
        </li>
        <?php endif ?>
        <?php if (in_array('KomponenProgram', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('KomponenProgram/') ?>"><i class="fa fa-th-large"></i>Komponen</a>
        </li>
        <?php endif ?>
        <?php if (in_array('SubKomponenProgram', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('SubKomponenProgram/') ?>"><i class="fa fa-th"></i>Sub Komponen</a>
        </li>
        <?php endif ?>
        <?php if (in_array('AkunProgram', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('AkunProgram/') ?>"><i class="fa fa-windows"></i>Akun</a>
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
        <?php if (in_array('SpjPayment', $permitted_menus)) : ?>
        <li>
            <a href="<?= site_url('SpjPayment/') ?>"><i class="fa fa-ticket"></i>SPJ Payment</a>
        </li>
        <?php endif ?>
    </ul>
</nav>