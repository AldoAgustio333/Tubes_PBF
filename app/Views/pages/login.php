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
                Buat Profil Login
            </div>
            <div class="p-6">
                <form class="p-6">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                            Username
                        </label>
                        <input class="shadow appearance-none border rounded-lg w-full bg-gray-200 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Password
                        </label>
                        <input class="shadow appearance-none border rounded-lg bg-gray-200 w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            NIK
                        </label>
                        <input class="shadow appearance-none border rounded-lg bg-gray-200 w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="text">
                    </div>
                    <div class="flex items-center justify-between gap-8">
                        <button class="border border-yellow-400 hover:bg-slate-50 w-1/2 py-2 text-center rounded focus:outline-none focus:shadow-outline font-semibold">
                            Login
                        </button>
                        <a href="<?= base_url('register') ?>" class="bg-yellow-400 hover:bg-yellow-500 w-1/2 py-2 text-center rounded focus:outline-none focus:shadow-outline font-semibold">
                            Buat profil
                        </a>
                    </div>
                    <div class="text-center mt-4">
                    Apkah Anda Lupa akun? <a href="/lupa-password" class="text-yellow-400 hover:text-yellow-500 underline">KLIK DISINI</a>
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

<?= $this->endSection() ?>