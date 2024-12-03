<?php

\Carbon\Carbon::setLocale('id');

?>

<?= $this->extend('layout/dashboard_layout') ?>

<?= $this->section('content') ?>
    <div class="m-4 gap-2">
        <div class="flex">
            <div class="card card-side shadow-xl w-4/6 bg-yellow-200 h-32 mr-2">
                <div class="card-body">
                    <h2 class="card-title text-yellow-800">SELAMAT DATANG DI UPTD LDPI KOTA PADANG</h2>
                </div>
                <figure>
                    <img
                            src="<?= base_url('assets/image/disability.png') ?>"
                            class="h-32"
                            alt="image" />
                </figure>
            </div>

        </div>


        <h1 class="font-bold text-2xl my-4">Timetable</h1>
        <h2 class="font-semibold text-lg ">Pelatihan dan Workshop</h2>
        <div class="grid gap-y-2">
            <?php foreach ($training as $train): ?>
            <div class="card card-side bg-base-100 shadow-xl">
                <figure>
                    <img
                            class="h-32 ml-8"
                            src="<?= base_url('assets/image/training/' . $train['image']) ?>"
                            alt="<?= $train['nama'] ?>" />
                </figure>
                <div class="card-body">
                    <div class="card-actions justify-end">
                        <p class="text-red-500">
                            <?php
                            echo \Carbon\Carbon::parse($train['tanggal'])->translatedFormat('d F Y');
                            ?>
                        </p>
                    </div>
                    <h2 class="card-title"><?= $train['nama'] ?></h2>
                    <p class="flex gap-2">
                        <svg  xmlns="http://www.w3.org/2000/svg"
                              width="24"
                              height="24"
                              viewBox="0 0 24 24"
                              fill="currentColor"
                              class="icon icon-tabler icons-tabler-filled icon-tabler-map-pin">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M18.364 4.636a9 9 0 0 1 .203 12.519l-.203 .21l-4.243 4.242a3
                            3 0 0 1 -4.097 .135l-.144 -.135l-4.244 -4.243a9 9 0 0 1 12.728 -12.728zm-6.364
                            3.364a3 3 0 1 0 0 6a3 3 0 0 0 0 -6z" /></svg>
                        <?= $train['tempat'] ?>
                    <p>
                    <div class="flex gap-2">
                        <svg  xmlns="http://www.w3.org/2000/svg"
                              width="24"
                              height="24"
                              viewBox="0 0 24 24"
                              fill="none"
                              stroke="currentColor"
                              stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              class="icon icon-tabler icons-tabler-outline icon-tabler-clock-hour-5">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                            <path d="M12 12l2 3" /><path d="M12 7v5" /></svg>
                    <?php echo \Carbon\Carbon::parse($train['jam_mulai'])->translatedFormat('H:i'); ?> - <?php echo \Carbon\Carbon::parse($train['jam_selesai'])->translatedFormat('H:i');?> WIB
                    </div>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
            <?php foreach ($workshop as $workshop): ?>
                <div class="card card-side bg-base-100 shadow-xl">
                    <figure>
                        <img
                                class="h-32 ml-8"
                                src="<?= base_url('assets/image/workshop/' . $workshop['image']) ?>"
                                alt="<?= $workshop['nama'] ?>" />
                    </figure>
                    <div class="card-body">
                        <div class="card-actions justify-end">
                            <p class="text-red-500">
                                <?php
                                echo \Carbon\Carbon::parse($train['tanggal'])->translatedFormat('d F Y');
                                ?>
                            </p>
                        </div>
                        <h2 class="card-title"><?= $workshop['nama'] ?></h2>
                        <p class="flex gap-2">
                            <svg  xmlns="http://www.w3.org/2000/svg"
                                  width="24"
                                  height="24"
                                  viewBox="0 0 24 24"
                                  fill="currentColor"
                                  class="icon icon-tabler icons-tabler-filled icon-tabler-map-pin">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M18.364 4.636a9 9 0 0 1 .203 12.519l-.203 .21l-4.243 4.242a3
                            3 0 0 1 -4.097 .135l-.144 -.135l-4.244 -4.243a9 9 0 0 1 12.728 -12.728zm-6.364
                            3.364a3 3 0 1 0 0 6a3 3 0 0 0 0 -6z" /></svg>
                            <?= $workshop['tempat'] ?>
                        <p>
                        <div class="flex gap-2">
                            <svg  xmlns="http://www.w3.org/2000/svg"
                                  width="24"
                                  height="24"
                                  viewBox="0 0 24 24"
                                  fill="none"
                                  stroke="currentColor"
                                  stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  class="icon icon-tabler icons-tabler-outline icon-tabler-clock-hour-5">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                <path d="M12 12l2 3" /><path d="M12 7v5" /></svg>
                            <?php echo \Carbon\Carbon::parse($workshop['jam_mulai'])->translatedFormat('H:i'); ?> - <?php echo \Carbon\Carbon::parse($workshop['jam_selesai'])->translatedFormat('H:i');?> WIB
                        </div>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?= $this->endSection() ?>
