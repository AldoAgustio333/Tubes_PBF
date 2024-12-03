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
            <h2 class="font-bold text-[#7C0000] mb-2 text-xs">Lupa Password</h2>
            <p class="text-[#6A0909]">
            Silakan hubungi LDPI untuk password baru
            </p>
        </div>
            <div class="block rounded-lg bg-white shadow-secondary-1 border-2 border-yellow-400">
            <div class="border-b-2 bg-yellow-400 px-6 py-3 font-bold text-xl">
                Login
            </div>
            <div class="p-6">
                <h1 class="font-bold text-4xl">Lupa Password</h1>
                <p class="text-xl my-8">Silakan ketik alamat email yang tertaut ke akun Anda untuk mengatur ulang kata sandi Anda.</p>
                <div class="label">
                    <span class="label-text text-gray-400 text-xl">Masukkan alamat email Anda</span>
                </div>
                <form>
                    <input type="text" placeholder="example123@gmail.com" class="input input-bordered w-full mb-4" />
                    <a href="/login">Ingat kata Sandi? <span class="text-yellow-400">Kembali untuk masuk</span></a>
                    <button class="btn bg-yellow-400 mt-4 flex w-full text-xl">Reset Password</button>
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