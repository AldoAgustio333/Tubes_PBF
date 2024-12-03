<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>


<div class="container mx-auto my-10">
<div class="flex items-center gap-x-5">
        <form class="w-full" method="get">
            <label class="input input-bordered flex items-center gap-2">
            <input type="text" class="grow" placeholder="Search" name="key" />
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
        </form>
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-warning ">Filter Tahun</div>
            <ul tabindex="0" class="dropdown-content menu bg-yellow-300 rounded-box z-[1] w-52 p-2 shadow">
                <li>
                    <a class="menu-item">Semua</a>
                </li>
                <li>
                    <a class="menu-item">Layanan Inventaris</a>
                </li>
                <li>
                    <a class="menu-item">Layanan Penunjang</a>
                </li>
                <li>
                    <a class="menu-item">Wisata Edukasi</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<?= $this->endSection() ?>