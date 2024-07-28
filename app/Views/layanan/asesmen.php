<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="absolute left-0 top-0 -z-30">
    <svg width="679" height="453" viewBox="0 0 679 453" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M678.5 289.5V0H0V452.5L678.5 289.5Z" fill="#FBC63C"/>
    </svg>
</div>

<div class="container mx-auto my-16">
    <h1 class="font-bold text-4xl mb-8">SOP Pelayanan Asesmen</h1>
    <div class="grid grid-cols-2 gap-8">
        <img src="<?= base_url('assets/image/asesmen.jpeg') ?>" />
        <p class="text-xl w-[528px]">Standar Operasional Prosedur (SOP) adalah 
            sistem yang disusun untuk memudahkan, 
            merapihkan dan menertibkan pekerjaan. Sistem ini berisi urutan proses melakukan 
            pekerjaan dari awal sampai akhir. Dari SOP, 
            masyarakat dapat melihat bahwa terdapat delapan prosedur yang harus dilalui hingga 
            hasil asesmen sampai ke pihak konsumen. 
            Jangka pengolahan data asesmen adalah satu minggu. Data hasil asesmen akan 
            diserahkan kepada konsumen dengan penjelasan dari UPTD. LDPI kepada konsumen</p>
    </div>
</div>

<?= $this->endSection() ?>