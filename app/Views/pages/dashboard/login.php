<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Disabilitas dan Pendidikan Inklusif Kota Padang</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css') ?>">

</head>
<body>
<div class="mx-16">
    <div class="flex justify-center items-center h-screen">
        <div class="w-1/4">
            <img src="<?= base_url('assets/image/logo.png') ?>" alt="logo" class=" mx-auto">
            <img src="<?= base_url('assets/image/logo_text.png') ?>" class=" mx-auto" alt="Logo" />
        </div>
        <div class="w-3/4 p-6 bg-yellow-500 rounded-2xl">
            <h1 class="text-center text-4xl font-bold">Login</h1>
            <form class="p-6" action="<?= base_url('dashboard/auth') ?>" method="post">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="shadow appearance-none border rounded-lg w-full bg-gray-200 py-2 px-3 text-gray-700 leading-tight" id="email" name="email" type="text">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input class="shadow appearance-none border rounded-lg bg-gray-200 w-full py-2 px-3 text-gray-700 leading-tight " id="password" name="password" type="password">
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-yellow-300 w-1/2 py-2 text-center rounded mx-auto font-semibold" type="submit">
                        Login
                    </button>
                </div>
            </form>
            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Perhatian!</strong>
                    <span class="block sm:inline"><?= session()->getFlashdata('msg') ?></span>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>