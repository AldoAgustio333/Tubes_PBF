<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>


<div class="container mx-auto my-16">
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
                <li><a>2024</a></li>
                <li><a>2023</a></li>
                <li><a>2022</a></li>
                <li><a>2021</a></li>
            </ul>
        </div>
    </div>

    <div class="grid grid-cols-3 mt-10 gap-4">
        <div class="max-w-2xl bg-white border border-gray-200 rounded-lg shadow">
            <a href="#">
                <img class="rounded-t-lg" src="https://placehold.co/700x400" alt="Placeholder">
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl tracking-tight text-gray-900">Title</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700">Date</p>
            </div>
        </div>
        <div class="max-w-2xl bg-white border border-gray-200 rounded-lg shadow">
            <a href="#">
                <img class="rounded-t-lg" src="https://placehold.co/700x400" alt="Placeholder">
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl tracking-tight text-gray-900">Title</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700">Date</p>
            </div>
        </div>
        <div class="max-w-2xl bg-white border border-gray-200 rounded-lg shadow">
            <a href="#">
                <img class="rounded-t-lg" src="https://placehold.co/700x400" alt="Placeholder">
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl tracking-tight text-gray-900">Title</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700">Date</p>
            </div>
        </div>
        <div class="max-w-2xl bg-white border border-gray-200 rounded-lg shadow">
            <a href="#">
                <img class="rounded-t-lg" src="https://placehold.co/700x400" alt="Placeholder">
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl tracking-tight text-gray-900">Title</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700">Date</p>
            </div>
        </div>
        <div class="max-w-2xl bg-white border border-gray-200 rounded-lg shadow">
            <a href="#">
                <img class="rounded-t-lg" src="https://placehold.co/700x400" alt="Placeholder">
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl tracking-tight text-gray-900">Title</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700">Date</p>
            </div>
        </div>
        <div class="max-w-2xl bg-white border border-gray-200 rounded-lg shadow">
            <a href="#">
                <img class="rounded-t-lg" src="https://placehold.co/700x400" alt="Placeholder">
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl tracking-tight text-gray-900">Title</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700">Date</p>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>