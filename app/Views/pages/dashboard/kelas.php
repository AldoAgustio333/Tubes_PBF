<?= $this->extend('layout/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="m-4 gap-2">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl font-bold">Kelola Kelas</h2>
        <button class="btn btn-warning rounded-full" onclick="my_modal_tambah_kelas.showModal()">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                <path d="M9 12h6" />
                <path d="M12 9v6" />
            </svg>
            Tambah Data Kelas
        </button>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div role="alert" class="alert alert-success mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span><?= session()->getFlashdata('success') ?></span>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div role="alert" class="alert alert-error mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span><?= session()->getFlashdata('error') ?></span>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('errors')): ?>
        <div role="alert" class="alert alert-error mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <ul class="list-disc list-inside">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead class="bg-slate-200">
                <tr>
                    <th>#</th>
                    <th>Nama Kelas</th>
                    <th>Deskripsi</th>
                    <th>Jadwal Kelas</th>
                    <th>Jumlah Anggota</th>
                    <th></th> </tr>
            </thead>
            <tbody>
                <?php $nomorTabel = $nomor; ?>

                <?php if (!empty($kelas)): ?>
                    <?php foreach ($kelas as $k): ?>
                        <tr>
                            <th><?= $nomorTabel++; ?></th>
                            <td><?= esc($k['nama_kelas']) ?></td>
                            <td><?= esc($k['deskripsi'] ? substr($k['deskripsi'], 0, 50) . (strlen($k['deskripsi']) > 50 ? '...' : '') : '-') ?></td>
                            <td><?= date('d M Y, H:i', strtotime($k['jadwal_kelas'])) ?></td>
                            <td><?= $k['jumlah_anggota'] ?? 0 ?></td>
                            <td>
                                <div class="flex gap-4 justify-end">
                                    <button onclick="showEditModal(<?= $k['id_kelas'] ?>)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-500 hover:text-green-700">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                            <path d="M16 5l3 3" />
                                        </svg>
                                    </button>
                                    <button onclick="deleteKelas(<?= $k['id_kelas'] ?>)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-red-500 hover:text-red-700">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                            <path d="M10 10l4 4m0 -4l-4 4" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data kelas.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <?php if ($pager->getPageCount() > 1) : ?>
            <?= $pager->links() ?>
        <?php endif; ?>
    </div>

    <dialog id="my_modal_tambah_kelas" class="modal">
        <div class="modal-box w-11/12 max-w-2xl">
            <h3 class="text-lg font-bold text-center mb-4">Tambah Data Kelas Baru</h3>
            <form class="grid gap-y-3" action="<?= base_url('/dashboard/kelas/create') ?>" method="post">
                <?= csrf_field() ?>
                <input type="text" placeholder="Nama Kelas" class="input input-bordered w-full" id="nama_kelas_tambah" name="nama_kelas" value="<?= old('nama_kelas') ?>" />
                <textarea placeholder="Deskripsi Kelas (Opsional)" class="textarea textarea-bordered w-full" id="deskripsi_tambah" name="deskripsi"><?= old('deskripsi') ?></textarea>

                <label class="block text-gray-700 text-sm font-bold mt-2">Jadwal Kelas:</label>
                <input type="datetime-local" class="input input-bordered w-full" id="jadwal_kelas_tambah" name="jadwal_kelas" value="<?= old('jadwal_kelas') ?>" />

                <label class="block text-gray-700 text-sm font-bold mt-2">Pilih Anggota Kelas (Opsional):</label>
                <select name="selected_users[]" id="selected_users_tambah" class="select select-bordered w-full" multiple size="5">
                    <?php if (!empty($daftar_pengguna)): ?>
                        <?php foreach ($daftar_pengguna as $pengguna): ?>
                            <option value="<?= $pengguna['id_pengguna'] ?>"
                                <?= in_array($pengguna['id_pengguna'], old('selected_users', [])) ? 'selected' : '' ?>>
                                <?= esc($pengguna['nama']) ?> (<?= esc($pengguna['email']) ?>)
                            </option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option disabled>Tidak ada pengguna aktif tersedia.</option>
                    <?php endif; ?>
                </select>
                <small class="text-gray-500">Tahan Ctrl/Cmd untuk memilih beberapa pengguna.</small>

                <button class="btn btn-warning mt-4" type="submit">Tambah Kelas</button>
            </form>
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
        </div>
    </dialog>

    <dialog id="my_modal_edit_kelas" class="modal">
    <div class="modal-box w-11/12 max-w-2xl">
        <h3 class="text-lg font-bold text-center mb-4">Edit Data Kelas</h3>
        <form class="grid gap-y-3" action="" method="post" id="form_edit_kelas">
            <?= csrf_field() ?>
            <input type="hidden" id="edit_id_kelas" name="id_kelas"/>
            
            <div>
                <label for="edit_nama_kelas" class="block text-gray-700 text-sm font-bold mb-2">Nama Kelas</label>
                <input type="text" placeholder="Nama Kelas" class="input input-bordered w-full" id="edit_nama_kelas" name="nama_kelas"/>
            </div>

            <div>
                <label for="edit_deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Kelas (Opsional)</label>
                <textarea placeholder="Deskripsi Kelas (Opsional)" class="textarea textarea-bordered w-full" id="edit_deskripsi" name="deskripsi" style="border: 1px solid #D1D5DB;"></textarea>
            </div>
            
            <div>
                <label for="edit_jadwal_kelas" class="block text-gray-700 text-sm font-bold mb-2">Jadwal Kelas</label>
                <input type="datetime-local" class="input input-bordered w-full" id="edit_jadwal_kelas" name="jadwal_kelas"/>
            </div>
            
            <div>
                <label for="edit_selected_users" class="block text-gray-700 text-sm font-bold mb-2">Pilih Anggota Kelas (Opsional)</label>
                <select name="selected_users[]" id="edit_selected_users" class="select select-bordered w-full" multiple size="5">
                    <?php if (!empty($daftar_pengguna)): ?>
                        <?php foreach ($daftar_pengguna as $pengguna): ?>
                            <option value="<?= $pengguna['id_pengguna'] ?>">
                                <?= esc($pengguna['nama']) ?> (<?= esc($pengguna['email']) ?>)
                            </option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option disabled>Tidak ada pengguna aktif tersedia.</option>
                    <?php endif; ?>
                </select>
                <small class="text-gray-700">Tahan Ctrl/Cmd untuk memilih beberapa pengguna.</small>
            </div>

            <button class="btn btn-warning mt-4 text-black" type="submit">Update Kelas</button>
        </form>
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
    </div>
</dialog>
</div>

<script>
    async function showEditModal(id_kelas) {
        const formEdit = document.getElementById('form_edit_kelas');
        formEdit.reset();
        document.querySelectorAll('.input-bordered.input-error').forEach(el => el.classList.remove('input-error'));

        const response = await fetch(`<?= base_url('/dashboard/kelas/getKelasWithUsers/') ?>${id_kelas}`);
        const data = await response.json();

        if (response.ok) {
            document.getElementById('edit_id_kelas').value = data.id_kelas;
            document.getElementById('edit_nama_kelas').value = data.nama_kelas;
            document.getElementById('edit_deskripsi').value = data.deskripsi || '';

            document.getElementById('edit_jadwal_kelas').value = data.jadwal_kelas_formatted || ''; // Menggunakan format baru

            formEdit.action = `<?= base_url('/dashboard/kelas/update/') ?>${id_kelas}`;

            const selectUsers = document.getElementById('edit_selected_users');
            Array.from(selectUsers.options).forEach(option => option.selected = false);
            if (data.selected_users_ids && data.selected_users_ids.length > 0) {
                Array.from(selectUsers.options).forEach(option => {
                    
                    if (data.selected_users_ids.map(String).includes(option.value)) {
                        option.selected = true;
                    }
                });
            }

            my_modal_edit_kelas.showModal();
        } else {
            alert('Gagal mengambil data kelas: ' + (data.error || 'Unknown error'));
        }
    }

    function deleteKelas(id_kelas) {
        if (confirm('Yakin ingin menghapus kelas ini?')) {
            fetch(`<?= base_url('/dashboard/kelas/delete/') ?>${id_kelas}`, {
                method: 'DELETE',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
                }
            }).then(response => {
                if (response.ok) {
                    location.reload();
                } else {
                    response.json().then(data => alert('Gagal menghapus kelas: ' + data.message));
                }
            }).catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menghapus kelas.');
            });
        }
    }
</script>

<?= $this->endSection() ?>