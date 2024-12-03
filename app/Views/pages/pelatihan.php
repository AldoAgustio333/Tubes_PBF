<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>



<div class="absolute right-0 top-0 -z-30">
<svg width="651" height="453" viewBox="0 0 651 453" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0 289.82V0H651V453L0 289.82Z" fill="#FBC63C"/>
</svg>

</div>

<div class="container mx-auto my-10">
    <div class="grid grid-cols-2 gap-4">
        <div>
            <div class="block rounded-lg bg-white shadow-secondary-1 border-2 border-yellow-400">
            <div class="border-b-2 bg-yellow-400 px-6 py-3 font-bold text-xl">
                Pelatihan dan Workshop
            </div>
            <div class="p-6">
                <form class="p-6" action="<?= base_url('/pelatihan') ?>"  method="post">
                    <?= csrf_field() ?>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">
                            Nama
                        </label>
                        <input class="shadow appearance-none border rounded-lg w-full bg-gray-200 py-2 px-3 text-gray-700 leading-tight" id="nama" name="nama" type="text" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                            Email
                        </label>
                        <input class="shadow appearance-none border rounded-lg bg-gray-200 w-full py-2 px-3 text-gray-700 leading-tight" id="email" name="email" type="email" required>
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="nomor_wa">
                            Nomor Wa Aktif
                        </label>
                        <input class="shadow appearance-none border rounded-lg bg-gray-200 w-full py-2 px-3 text-gray-700 leading-tight" id="nomor_wa" name="nomor_wa" required type="text">
                    </div>
                    <div class="flex items-center justify-between gap-8">
                        <button class="border bg-yellow-400 w-1/2 py-2 text-center rounded font-semibold mx-auto" type="submit">
                            Kirim Notifikasi
                        </button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        <div>
            <div class="rounded-full bg-yellow-200 w-96 h-96 flex items-center justify-center mx-auto">
                <img src="<?= base_url('assets/image/vector.png') ?>" class="h-96" alt="Parenting">
            </div>
        </div>
    </div>
</div>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="toast">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')) : ?>
    <div class="toast">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>

<?php endif; ?>

<?= $this->endSection() ?>