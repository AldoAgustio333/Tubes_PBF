<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="absolute left-0 top-0 -z-30">
    <svg width="679" height="453" viewBox="0 0 679 453" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M678.5 289.5V0H0V452.5L678.5 289.5Z" fill="#FBC63C"/>
    </svg>
</div>

<div class="container mx-auto my-10">
    <div class="grid grid-cols-2">
            <img class="rounded-xl object-none w-80 h-96" src="<?= base_url('assets/image/home.jpeg') ?>">
            <div>
                <h1 class="font-bold text-4xl">UPTD Layanan Disabilitas dan Pendidikan Inklusif</h1>
                <p class="text-xl">(Dinas Pendidikan dan Kebudayaan Kota Padang)</p>
                <p class="text-justify mt-4">
                UPTD Layanan Disabilitas dan Pendidikan Inklusif (LDPI) 
                merupakan lembaga yang memberikan layanan asesmen dan 
                Layanan Intervensi Terpadu kepada Penyandang Disabilitas. 
                Layanan tersebut perlu dilakukan untuk meminimalisir 
                hambatan/gangguan perilaku repetitif, agresif, gangguan 
                keseimbangan dan lain-lain, membentuk perilaku adaptif dalam 
                lingkungan, meningkatkan komunikasi, membentuk kemandirian 
                anak dan mendukung kemampuan dasar akademis.
            </div>
    </div>
    <p class="text-justify mt-4">
        Lembaga ini adalah milik Pemerintah Kota Padang, Dinas Pendidikan Kota Padang, UPTD Layanan Disabilitas dan Pendidikan Inklusif 
        merupakan satu-satunya di Provinsi Sumatera Barat. UPTD LDPI Kota Padang berlokasi 
        di Jalan Kampung Jambak, Kelurahan Gunung Sarik Kecamatan Kuranji, Kota Padang. UPTD LDPI Kota Padang 
        memberikan layanan kepada seluruh masyarakat khususnya warga Kota Padang dan sekitarnya bagi 
        penyandang Disabilitas Usia 2 s/d 18 Tahun tanpa pungut biaya (GRATIS).
    </p>
    <p class="text-justify mt-4 mb-8">
    UPTD Layanan Disabilitas dan Pendidikan Inklusif (LDPI) memiliki Tenaga Ahli Pendidikan, Psikolog Klinik Anak, Gizi, 
    Gigi dan Analis Peserta Didik yang sudah berpengalaman melalui proses seleksi dan pelatihan sehingga 
    memiliki kompetensi di bidangnya. UPTD LDPI bekerja sama dengan Australian Volunteers For International 
    Development sebagai pendampingan tenaga ahli okupasi.
    </p>
</div>

<?= $this->endSection() ?>