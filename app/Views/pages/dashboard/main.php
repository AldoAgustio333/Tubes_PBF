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
        <div class="grid grid-rows-2 mt-6">
            <div class="indicator">
                <span class="indicator-item badge badge-error"><?= $jumlah_pengguna ?> </span>
                <button class="btn" onclick="my_modal_1.showModal()">
                    <svg  xmlns="http://www.w3.org/2000/svg"
                          width="24"
                          height="24"
                          viewBox="0 0 24 24"
                          fill="currentColor"
                    ><path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M18 3a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-4.724l-4.762 2.857a1
                    1 0 0 1 -1.508 -.743l-.006 -.114v-2h-1a4 4 0 0 1 -3.995 -3.8l-.005
                    -.2v-8a4 4 0 0 1 4 -4zm-4 9h-6a1 1 0 0 0 0 2h6a1 1 0 0 0 0 -2m2 -4h-8a1
                    1 0 1 0 0 2h8a1 1 0 0 0 0 -2" /></svg></button>
            </div>
            <button class="btn btn-warning rounded-full" onclick="my_modal_4.showModal()">
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
                Tambah Data Daftar
            </button>
        </div>
    </div>

    <dialog id="my_modal_1" class="modal">
        <div class="modal-box w-11/12 max-w-5xl">
            <h3 class="text-lg font-bold">Message</h3>
            <div class="overflow-x-auto">
                <table class="table">
                    <!-- head -->
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Date</th>
                        <th>Email</th>
                        <th>Nomor WA Aktif</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($pengguna as $p): ?>
                    <tr>
                        <th> <?= $nomor++; ?></th>
                        <td><?= $p['nama'] ?></td>
                        <td><?= $p['created_at'] ?></td>
                        <td><?= $p['email'] ?></td>
                        <td><?= $p['nomor_wa'] ?></td>
                        <td>
                            <?php if ($p['status'] === 'aktif'): ?>
                                <div class="bg-[#16C098] bg-opacity-30 border border-[#00B087] text-center text-[#008767] p-1 rounded-lg">Active</div>
                            <?php elseif ($p['status'] === 'tidak aktif'): ?>
                                <div class="bg-[#FFC5C5] border border-[#DF0404] text-center text-[#DF0404] p-1 rounded-lg">Inactive</div>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
        </div>
    </dialog>

    <dialog id="my_modal_4" class="modal">
        <div class="modal-box w-11/12 max-w-5xl">
            <h3 class="text-lg font-bold text-center">Tambah Data Daftar</h3>
            <form class="grid text-center gap-y-3 my-5 mx-8" action="<?= base_url('/dashboard/pengguna') ?>" method="post" >
                <?= csrf_field() ?>
                <input type="text" placeholder="Nama Lengkap" class="input input-bordered w-full" id="nama" name="nama"/>
                <input type="email" placeholder="Email" class="input input-bordered w-full" id="email" name="email" />
                <input type="text" placeholder="Nomor WA Aktif" class="input input-bordered w-full" id="nomor_wa" name="nomor_wa" />
                <select class="select select-bordered w-full" id="status" name="status">
                    <option disabled selected>Status</option>
                    <option value="aktif">Active</option>
                    <option value="tidak aktif">Inactive</option>
                </select>
                <button class="btn btn-warning" type="submit">Submit</button>
            </form>
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                </form>
        </div>
    </dialog>

    <?php foreach ($pengguna as $p): ?>
    <dialog id="edit_modal_<?= $p['id_pengguna'] ?>" class="modal">
        <div class="modal-box w-11/12 max-w-5xl">
            <h3 class="text-lg font-bold text-center">Edit Data Daftar</h3>
            <form class="grid text-center gap-y-3 my-5 mx-8" action="<?= base_url('/dashboard/pengguna/' . $p['id_pengguna']) ?>" method="post" >
                <?= csrf_field() ?>
                <input type="text" placeholder="Nama Lengkap" class="input input-bordered w-full" id="nama" name="nama" value="<?= $p['nama'] ?>"/>
                <input type="email" placeholder="Email" class="input input-bordered w-full" id="email" name="email" value="<?= $p['email'] ?>" />
                <input type="text" placeholder="Nomor WA Aktif" class="input input-bordered w-full" id="nomor_wa" name="nomor_wa" value="<?= $p['nomor_wa'] ?>" />
                <select class="select select-bordered w-full" id="status" name="status">
                    <option disabled selected>Status</option>
                    <option value="aktif" <?= $p['status'] === 'aktif' ? 'selected' : '' ?>>Active</option>
                    <option value="tidak aktif" <?= $p['status'] === 'tidak aktif' ? 'selected' : '' ?>>Inactive</option>
                </select>
                <button class="btn btn-warning" type="submit">Submit</button>
            </form>
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
        </div>
    </dialog>
    <?php endforeach; ?>

    <div class="grid grid-cols-3 gap-x-2 my-4 h-18">
        <div class="card card-side bg-gradient-to-l from-[#7730BD] to-[#7688E3] shadow-xl text-white">
            <div class="card-body">
                <h2 class="text-xl font-semibold">Jumlah Pelatihan</h2>
                <h2 class="card-title text-4xl"><?= $training < 10 ? '0' . $training : $training ?></h2>
            </div>
            <figure>
                <img
                        src="<?= base_url('assets/image/pelatihan.png') ?>" alt="images" class="me-3"/>
            </figure>
        </div>
        <div class="card card-side bg-gradient-to-l from-[#3071BD] to-[#76E3E3] shadow-xl text-white">
            <div class="card-body">
                <h2 class="text-xl font-semibold">Jumlah Jadwal</h2>
                <h2 class="card-title text-4xl"><?= $jadwal < 10 ? '0' . $jadwal : $jadwal ?></h2>
            </div>
            <figure>
                <img
                        src="<?= base_url('assets/image/calendar.png') ?>" alt="images" class="me-3"/>
            </figure>
        </div>
        <div class="card card-side bg-gradient-to-l from-[#BD3030] to-[#B976E3] shadow-xl text-white">
            <div class="card-body">
                <h2 class="text-xl font-semibold">Jumlah Pengguna</h2>
                <h2 class="card-title text-4xl"><?= $jumlah_pengguna < 10 ? '0' . $jumlah_pengguna : $training ?></h2>
            </div>
            <figure>
                <img
                        src="<?= base_url('assets/image/group.png') ?>" alt="images" class="me-3"/>
            </figure>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead class="bg-slate-200">
            <tr>
                <th>
                    <label>
                        <input type="checkbox" class="checkbox" />
                    </label>
                </th>
                <th>#</th>
                <th>NAMA LENGKAP</th>
                <th>DATE</th>
                <th>EMAIL</th>
                <th>NOMOR WA AKTIF</th>
                <th>STATUS</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach($pengguna as $p): ?>
            <tr>
                <th>
                    <label>
                        <input type="checkbox" class="checkbox" />
                    </label>
                </th>
                <th>

                    <?= $nomor++; ?>
                </th>
                <td>
                    <div><?= $p['nama'] ?></div>
                </td>
                <td>
                    <?= $p['created_at'] ?>
                </td>
                <td><?= $p['email'] ?></td>
                <td><?= $p['nomor_wa'] ?></td>
                <td>
                    <?php
                    if ($p['status'] === 'aktif') {
                        echo "Diterima";
                    } elseif ($p['status'] === 'tidak aktif') {
                        echo "Tidak Diterima";
                    }
                    ?>
                </td>
                <td>
                    <div class="flex">
                        <button onclick="edit_modal_<?= $p['id_pengguna'] ?>.showModal()">
                            <svg  xmlns="http://www.w3.org/2000/svg"
                                  width="24"
                                  height="24"
                                  viewBox="0 0 24 24"
                                  fill="none"
                                  stroke="currentColor"
                                  stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  class="text-green-400"><path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                <path d="M16 5l3 3" /></svg>
                        </button>
                        <button onclick="deletePengguna(<?= $p['id_pengguna'] ?>)">
                            <svg  xmlns="http://www.w3.org/2000/svg"
                                  width="24"
                                  height="24"
                                  viewBox="0 0 24 24"
                                  fill="none"
                                  stroke="currentColor"
                                  stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  class="text-red-600">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                <path d="M10 10l4 4m0 -4l-4 4" />
                            </svg>
                        </button>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?= $pager->links('group1','pagination') ?>
</div>

<script>
    function deletePengguna(id) {
        if (confirm('Yakin ingin menghapus pengguna ini?')) {
            fetch('/dashboard/pengguna/' + id, {
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
