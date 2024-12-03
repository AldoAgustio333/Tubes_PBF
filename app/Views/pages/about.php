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
    
    <div class="grid grid-cols-5 gap-8">
        <div class="col-span-3">
            <h1 class="font-bold text-2xl">FAQs</h1>
            <div class="collapse collapse-arrow bg-base-200">
            <input type="radio" name="my-accordion-2" checked="checked" />
            <div class="collapse-title text-xl font-medium bg-yellow-400">Pertanyaan 1</div>
                <div class="collapse-content bg-yellow-200">
                    <p>Jawaban 1</p>
                </div>
            </div>
            <div class="collapse collapse-arrow bg-base-200">
            <input type="radio" name="my-accordion-2" />
            <div class="collapse-title text-xl font-medium bg-yellow-400">Pertanyaan 2</div>
                <div class="collapse-content bg-yellow-200">
                    <p>Jawaban 2</p>
                </div>
            </div>
        </div>
        <div class="col-span-2">
            <h1 class="font-bold text-2xl">Sampaikan Pertanyaan Anda Disini</h1>
                        <form class="bg-white">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Nama Lengkap
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Nama">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="subjek">
                        Subjek Pertanyaan
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="subjek" type="text" placeholder="Subjek Pertanyaan"></input>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Alamat Email
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="text" placeholder="Alamat Email"></input>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Ketikan Pertanyaan Anda Disini
                    </label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="pertanyaan" type="text" placeholder="Ketikan Pertanyaan Anda Disini"></textarea>
                </div>
                <div class="flex items
                -center justify-between">
                    <button class="bg-yellow-400 w-full hover:bg-yellow-500 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                        Kirim
                    </button>
                </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>