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
        <div class="bg-[#FFD9D9] p-4 rounded-lg mb-4 text-sm">
            <h2 class="font-bold text-[#7C0000] mb-2 text-xs">PERINGATAN</h2>
            <p class="text-[#6A0909]">
            Mohon Hubungi UPTD LDPI sebelum melakukan penginputan data!
            Silakan informasikan terlebih dahulu nama peserta didik yang akan 
            melakukan pendaftaran asesmen sebelum melakukan pengisian data di database
            </p>
        </div>
            <div class="block rounded-lg bg-white shadow-secondary-1 border-2 border-yellow-400">
            <div class="border-b-2 bg-yellow-400 px-6 py-3 font-bold text-xl">
                Buat Profil Register
            </div>
            <div class="p-6">
                <form class="p-6">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                            Username
                        </label>
                        <input class="shadow appearance-none border rounded-lg w-full bg-gray-200 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text">
                        <span class="text-xs text-red-900">Nama Lengkap Anak. Nama diawali huruf besar di awal dan setelah spasi 
                        <br/>(Contoh: Abc Def)</span>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Password
                        </label>
                        <input class="shadow appearance-none border rounded-lg bg-gray-200 w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Nama Lengkap Anak
                        </label>
                        <input class="shadow appearance-none border rounded-lg bg-gray-200 w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="text">
                        <span class="text-xs text-red-900">Nama Lengkap Anak dengan huruf KAPITAL/BESAR (Contoh: ABC DEF)</span>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            NIK Anak
                        </label>
                        <input class="shadow appearance-none border rounded-lg bg-gray-200 w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="text">
                        <span class="text-xs text-red-900">Isi dengan NIK (Nomor KTP, jika belum memiliki KTP, NIK bisa diperoleh di Kartu Keluarga)</span>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Nama Ibu Kandung
                        </label>
                        <input class="shadow appearance-none border rounded-lg bg-gray-200 w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="text">
                        <span class="text-xs text-red-900">Isi dengan nama lengkap ibu</span>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Alamat Email
                        </label>
                        <input class="shadow appearance-none border rounded-lg bg-gray-200 w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="text">
                        <span class="text-xs text-red-900">Isi dengan alamat email yang masih aktif. Jika tidak memiliki email, tidak perlu diisi.</span>
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            No HP Orang Tua
                        </label>
                        <input class="shadow appearance-none border rounded-lg bg-gray-200 w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="text">
                        <span class="text-xs text-red-900">Isi dengan nomor HP salah satu orang tua yang masih aktif (Contoh: 081234567890)</span>
                    </div>
                    <div class="flex items-center justify-between gap-8">
                        <a href="#" class="border border-yellow-400 hover:bg-slate-50 w-1/2 py-2 text-center rounded focus:outline-none focus:shadow-outline font-semibold">
                            Login
                        </a>
                        <button class="bg-yellow-400 hover:bg-yellow-500 w-1/2 py-2 text-center rounded focus:outline-none focus:shadow-outline font-semibold">
                            Buat profil
                        </button>
                    </div>
                </form>
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