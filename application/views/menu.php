<nav class="menu">
    <ul class="sidebar-menu metismenu" id="sidebar-menu">
        <?php if ('admin' === $this->session->userdata('email')): ?>
        <li>
            <a href="<?= site_url('User/') ?>"><i class="fa fa-group"></i>User</a>
        </li>
        <li>
            <a href="<?= site_url('Jabatan/') ?>"><i class="fa fa-angle-double-down"></i>Jabatan</a>
        </li>
        <?php endif ?>
        <li>
            <a href="<?= site_url('Program/') ?>"><i class="fa fa-laptop"></i>Program</a>
        </li>
        <li>
            <a href="<?= site_url('KegiatanProgram/') ?>"><i class="fa fa-tasks"></i>Kegiatan</a>
        </li>
        <li>
            <a href="<?= site_url('OutputProgram/') ?>"><i class="fa fa-align-justify"></i>Output</a>
        </li>
        <li>
            <a href="<?= site_url('SubOutputProgram/') ?>"><i class="fa fa-list-ul"></i>Sub Output</a>
        </li>
        <li>
            <a href="<?= site_url('KomponenProgram/') ?>"><i class="fa fa-th-large"></i>Komponen</a>
        </li>
        <li>
            <a href="<?= site_url('SubKomponenProgram/') ?>"><i class="fa fa-th"></i>Sub Komponen</a>
        </li>
        <li>
            <a href="<?= site_url('AkunProgram/') ?>"><i class="fa fa-windows"></i>Akun</a>
        </li>
        <?php if ('admin' === $this->session->userdata('email')): ?>
        <li>
            <a href="<?= site_url('Detail/') ?>"><i class="fa fa-gift"></i>Detail</a>
        </li>
        <li>
            <a href="<?= site_url('Spj/') ?>"><i class="fa fa-dropbox"></i>SPJ</a>
        </li>
        <?php endif ?>
    </ul>
</nav>