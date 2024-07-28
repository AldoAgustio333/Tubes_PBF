<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>


<div class="container mx-auto my-16">

<div class="grid grid-cols-4">
    <div class="mx-auto col-span-3">
        <h1 class="text-xl font-bold text-gray-800 text-center mb-3">Bantuan</h1>
        <img src="<?= base_url('assets/image/baru.png') ?>" class="w-96" alt="Baru">
    </div>
    <div>
        <h1 class="text-xl font-bold mb-3 text-gray-800">List Panduan</h1>
        <div class="flex gap-1">
            <img src="<?= base_url('assets/image/baru.png') ?>" class="w-20" alt="Panduan Mengisi Buat Profil Login">
            <div>
                <h2 class="text-sm font-bold text-gray-800 mb-1">Panduan Mengisi Buat Profil Login</h2>
                <p class="text-xs text-gray-700">Penting Mohon Hubungi UPTD LDPI sebelum melakukan penginputan data! Silakan informasikan terlebih dahulu.......</p>
            </div>
        </div>
    </div>
</div>
   
</div>

<?= $this->endSection() ?>