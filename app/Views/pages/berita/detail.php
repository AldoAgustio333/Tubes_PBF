<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>


<div class="container mx-auto my-16">
    <img src="<?php echo base_url('assets/image/berita/' . $berita['image']) ?>" alt="Placeholder" class="w-full h-96 rounded-lg">

    <div class="my-10">
        <h1 class="font-bold text-3xl uppercase"><?= $berita['nama_kegiatan'] ?></h1>
        <p class="text-gray-500 text-sm mt-2"><?= $berita['tanggal_mulai'].' - '.$berita['tanggal_selesai'] ?></p>
        <p class="mt-5"><?= $berita['deskripsi'] ?></p>
    </div>

    <div>
        <h1 class="font-bold text-2xl">
            Baca Kegiatan Lainnya
        </h1>
        <?= view_cell('\App\Libraries\Widget::recentPost') ?>
    </div>
</div>

<?= $this->endSection() ?>