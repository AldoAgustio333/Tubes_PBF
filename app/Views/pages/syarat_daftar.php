<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>
<div class="container mx-auto my-16">
    <h1 class="font-bold text-4xl mb-8">Syarat Pendaftaran</h1>
    <h1 class="font-bold text-2xl mb-8">Download File Berikut</h1>
    <div class="grid grid-cols-2 gap-8">
            <div class="flex">
                <img src="<?= base_url('assets/image/surat_pengantar.png') ?>" class="me-6" />
                <div>
                    <h1 class="text-xl font-bold uppercase">SURAT PENGANTAR DARI SEKOLAH</h1>
                    <a href="#">
                    <button class="bg-[#FBC63C] font-bold px-3 py-2 rounded-lg mt-2 flex items-center"> 
                        <span class="me-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" 
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ai ai-Download">
                        <path d="M12 15V3m0 12l-4-4m4 4l4-4"/><path d="M2 17l.621 2.485A2 2 0 0 0 4.561 
                        21H19.439a2 2 0 0 0 1.94-1.515L22 17"/></svg></span>
                        Download File
                    </button>
                    </a>
                </div>
            </div>
            <div class="flex">
                <img src="<?= base_url('assets/image/deteksi-disini.png') ?>" class="me-6" />
                <div>
                    <h1 class="text-xl font-bold uppercase">Deteksi Disini</h1>
                    <a href="#">
                    <button class="bg-[#FBC63C] font-bold px-3 py-2 rounded-lg mt-2 flex items-center"> 
                        <span class="me-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" 
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ai ai-Download">
                        <path d="M12 15V3m0 12l-4-4m4 4l4-4"/><path d="M2 17l.621 2.485A2 2 0 0 0 4.561 
                        21H19.439a2 2 0 0 0 1.94-1.515L22 17"/></svg></span>
                        Download File
                    </button>
                    </a>
                </div>
            </div>
    </div>
    <div class="my-16">
        <h1 class="font-bold text-2xl mb-8">Syarat Lainnya</h1>
        <div class="text-xl font-light grid gap-y-8">
            <div class="flex justify-between items-center">
                Isi Formulir Biodata
                <a href="#">
                    <button class="bg-[#FBC63C] font-bold px-3 py-2 rounded-lg mt-2 flex items-center text-sm">
                        Klik Disini
                    </button>
                </a>
            </div>
            <div class="flex justify-between items-center">
                Upload Dokumen
                <a href="#">
                    <button class="bg-[#FBC63C] font-bold px-3 py-2 rounded-lg mt-2 flex items-center text-sm">
                        Klik Disini
                    </button>
                </a>
            </div>
            <div>Foto Copy KK</div>
            <div>Foto Copy Akte Kelahiran</div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>