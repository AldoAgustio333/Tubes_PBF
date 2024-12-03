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
                Register
            </div>
            <div class="p-6">
               <p class="mb-4">Mohon buat Profil Login:</p>
                <a href="/register" class="bg-yellow-400 font-bold py-2 px-4 rounded-lg">Buat Profil</a>
                <p class="my-6"><span class="text-yellow-500">atau</span> Masuk dengan Profil Anda:</p>
                <a href="/login" class="bg-yellow-400 font-bold py-2 px-4 rounded-lg">Login</a>
                <p class="my-6"><span class="text-yellow-500">atau</span> Minta Password baru:</p>
                <a href="/login" class="bg-yellow-400 font-bold py-2 px-4 rounded-lg">Lupa Password</a>
            </div>
            </div>
        </div>
        <div>
            <div class="rounded-full w-96 h-96 flex items-center justify-center mx-auto">
                <img src="<?= base_url('assets/image/register.png') ?>" class="h-96" alt="Parenting">
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>