<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="absolute left-0 top-0 -z-30">
    <svg width="679" height="453" viewBox="0 0 679 453" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M678.5 289.5V0H0V452.5L678.5 289.5Z" fill="#FBC63C"/>
    </svg>
</div>

<div class="container mx-auto my-16">
    <h1 class="font-bold text-4xl mb-8">SOP Pelayanan Intervensi Terpadu</h1>
    <div class="grid grid-cols-2 gap-8">
        <img src="<?= base_url('assets/image/sop-layanan.jpeg') ?>" />
        <p class="text-xl w-[528px]">
        Standar Operasional Prosedur Layanan Intervensi Terpadu adalah rincian 
        prosedur yang dilakukan secara kronologis dalam layanan. 
        SOP ini bertujuan untuk memperoleh hasil layanan yang paling efektif bagi peserta didik.
        </p>
    </div>
</div>

<?= $this->endSection() ?>