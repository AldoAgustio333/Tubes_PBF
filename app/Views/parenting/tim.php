<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="container mx-auto my-10">
    <div class="flex items-center gap-x-5">
        <div class="w-full">
            <label class="input input-bordered flex items-center gap-2">
            <input type="text" class="grow" placeholder="Search" />
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 16 16"
                    fill="currentColor"
                    class="h-4 w-4 opacity-70">
                    <path
                    fill-rule="evenodd"
                    d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                    clip-rule="evenodd" />
                </svg>
            </label>
        </div>
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-warning ">Filter Tahun</div>
            <ul tabindex="0" class="dropdown-content menu bg-yellow-300 rounded-box z-[1] w-52 p-2 shadow">
                <li><a>Semua</a></li>
                <li><a>Kepala</a></li>
                <li><a>Kepala Sub Bagian Tata Usaha</a></li>
                <li><a>Tenaga Ahli</a></li>
                <li><a>Asesmen</a></li>
                <li><a>Layanan Inventaris</a></li>
            </ul>
        </div>
    </div>

    <div class="container mx-auto">
    <h1 class="uppercase font-bold text-3xl my-12">Tim</h1>
    <div class="grid grid-cols-5 gap-12 py-10">
        <?php foreach($guru as $g): ?>
        <div class="flex flex-col items-center overflow-visible bg-yellow-300 p-6 rounded-lg shadow-lg">
            <img class="rounded-full w-32 h-32 -mt-16" src="<?= base_url('assets/image/person.jpg') ?>" alt="Profile Photo">
            <div class="text-center mt-4">
                <h1 class="font-bold text-2xl"><?= $g['nama_guru'] ?></h1>
                <p class="text-xl"><?= $g['jabatan'] ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    </div>
    
</div>

<?= $this->endSection() ?>