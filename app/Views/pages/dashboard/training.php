<?php

use Carbon\Carbon;
Carbon::setLocale('id');

?>
x<?= $this->extend('layout/dashboard_layout') ?>

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
            <div class="grid grid-rows-2">
                <div></div>
                <button class="btn btn-warning rounded-full" onclick="my_modal_2.showModal()">
                    <svg  xmlns="http://www.w3.org/2000/svg"
                          width="24"
                          height="24"
                          viewBox="0 0 24 24"
                          fill="none"
                          stroke="currentColor"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round" >
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M9 12h6" /><path d="M12 9v6" />
                    </svg>
                    Tambah Training
                </button>
            </div>
        </div>

        <dialog id="my_modal_2" class="modal">
            <div class="modal-box w-11/12 max-w-5xl">
                <h3 class="text-lg font-bold text-center">Tambah Training</h3>
                <form class="grid text-center gap-y-3 my-5 mx-8" action="<?= base_url('dashboard/training') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <input type="text" placeholder="Nama Training" class="input input-bordered w-full" id="nama" name="nama" value="<?= old('nama') ?>" required/>
                    <input type="text" placeholder="Lokasi" class="input input-bordered w-full" id="lokasi" name="tempat" value="<?= old('tempat') ?>" required/>
                    <input type="date" placeholder="Tanggal" class="input input-bordered w-full" id="tanggal" name="tanggal" value="<?= old('tanggal') ?>" required/>
                    <input type="time" placeholder="Waktu Mulai" class="input input-bordered w-full" id="jam_mulai" name="jam_mulai" value="<?= old('jam_mulai') ?>" required/>
                    <input type="time" placeholder="Waktu Selesai" class="input input-bordered w-full" id="jam_selesai" name="jam_selesai" value="<?= old('jam_selesai') ?>" required/>
                    <input type="file" class="file-input file-input-bordered w-full" id="image" name="image" required/>

                    <button class="btn btn-warning" type="submit">Submit</button>
                </form>
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                </form>
            </div>
        </dialog>

        <?php foreach ($training as $t): ?>
            <dialog id="edit_modal_<?= $t['id_training'] ?>" class="modal">
                <div class="modal-box w-11/12 max-w-5xl">
                    <h3 class="text-lg font-bold text-center">Edit Data Training</h3>
                    <form class="grid text-center gap-y-3 my-5 mx-8" action="<?= base_url('/dashboard/training/' . $t['id_training']) ?>" method="post" >
                        <?= csrf_field() ?>
                        <input type="text" placeholder="Nama Training" class="input input-bordered w-full" id="nama" name="nama" value="<?= $t['nama'] ?>" required/>
                        <input type="text" placeholder="Lokasi" class="input input-bordered w-full" id="lokasi" name="tempat" value="<?= $t['tempat'] ?>" required/>
                        <input type="date" placeholder="Tanggal" class="input input-bordered w-full" id="tanggal" name="tanggal" value="<?= $t['tanggal'] ?>"/>
                        <input type="time" placeholder="Waktu Mulai" class="input input-bordered w-full" id="jam_mulai" name="jam_mulai" value="<?= $t['jam_mulai'] ?>" required/>
                        <input type="time" placeholder="Waktu Selesai" class="input input-bordered w-full" id="jam_selesai" name="jam_selesai" value="<?= $t['jam_selesai'] ?>" required/>
                        <button class="btn btn-warning" type="submit">Submit</button>
                    </form>
                    <form method="dialog">
                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                    </form>
                </div>
            </dialog>
        <?php endforeach; ?>

        <h1 class="font-bold text-2xl my-4">Training</h1>
        <div class="grid gap-y-2">
            <?php foreach($training as $t): ?>
            <div class="card card-side bg-base-100 shadow-xl">
                <figure>
                    <img
                            class="h-32 ml-8"
                            src="<?= base_url('assets/image/training/'.$t['image']) ?>"
                            alt="kegiatan 1" />
                </figure>
                <div class="card-body">
                    <div class="card-actions justify-end">
                        <p class="text-red-500">
                            <?php
                            echo Carbon::parse($t['tanggal'])->translatedFormat('d F Y');
                            ?>
                        </p>
                        <button onclick="edit_modal_<?= $t['id_training'] ?>.showModal()">
                            <svg  xmlns="http://www.w3.org/2000/svg"
                                  width="24"
                                  height="24"
                                  viewBox="0 0 24 24"
                                  fill="none"
                                  stroke="currentColor"
                                  stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  class="text-green-500"
                                  >
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                <path d="M16 5l3 3" /></svg>
                        </button>
                        <button onclick="deleteTraining(<?= $t['id_training'] ?>)">
                            <svg  xmlns="http://www.w3.org/2000/svg"
                                  width="24"
                                  height="24"
                                  viewBox="0 0 24 24"
                                  fill="none"
                                  stroke="currentColor"
                                  stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  class="text-red-500">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                <path d="M10 10l4 4m0 -4l-4 4" /></svg>
                        </button>
                    </div>
                    <h2 class="card-title"><?= $t['nama'] ?></h2>
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
                        <?= $t['tempat'] ?></p>
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
                        <?php echo Carbon::parse($t['jam_mulai'])->translatedFormat('H:i'); ?> - <?php echo Carbon::parse($t['jam_selesai'])->translatedFormat('H:i');?> WIB
                        </div>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

<script>
    function deleteTraining(id) {
        if (confirm('Yakin ingin menghapus training ini?')) {
            fetch('/dashboard/training/' + id, {
                method: 'DELETE',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
                }
            }).then(response => {
                if (response.ok) {
                    location.reload();
                }
            });
        }
    }
</script>
<?= $this->endSection() ?>

