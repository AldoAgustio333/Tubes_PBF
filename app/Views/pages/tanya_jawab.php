<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="container mx-auto my-16">
    <div class="grid grid-cols-5 gap-2">
        <div class="col-span-3 border-yellow-300 border-2 p-4 rounded-xl">
            <h1 class="font-bold text-2xl">FAQs</h1>
            <div class="collapse collapse-arrow bg-base-200">
            <input type="radio" name="my-accordion-2" checked="checked" />
            <div class="collapse-title text-xl font-medium bg-yellow-400">Pertanyaan 1</div>
                <div class="collapse-content bg-yellow-200">
                    <p>Jawaban 1</p>
                </div>
            </div>
            <div class="collapse collapse-arrow bg-base-200">
            <input type="radio" name="my-accordion-2" />
            <div class="collapse-title text-xl font-medium bg-yellow-400">Pertanyaan 2</div>
                <div class="collapse-content bg-yellow-200">
                    <p>Jawaban 2</p>
                </div>
            </div>
        </div>
        <div class="col-span-2 border-yellow-300 border-2 p-4 rounded-xl">
            <h1 class="font-bold text-2xl mb-4">Sampaikan Pertanyaan Anda Disini</h1>
                        <form class="bg-white">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Nama Lengkap
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Nama">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="subjek">
                        Subjek Pertanyaan
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="subjek" type="text" placeholder="Subjek Pertanyaan"></input>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Alamat Email
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="text" placeholder="Alamat Email"></input>
                </div>
                <div class="mb-6">
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="pertanyaan" type="text" placeholder="Ketikan Pertanyaan Anda Disini"></textarea>
                </div>
                <div class="grid gap-2">
                    <button class="bg-yellow-400 w-1/2 hover:bg-yellow-500 py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                        Cari Subjek
                    </button>
                    <button class="bg-yellow-400 w-1/2 hover:bg-yellow-500 py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                        Kirim Pertanyaan
                    </button>
                </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>