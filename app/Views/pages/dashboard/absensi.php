<?= $this->extend('layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Formulir Absensi</h2>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success mb-4 shadow-sm">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('errors')) : ?>
        <div role="alert" class="alert alert-error mb-4 shadow-sm">
            <ul class="list-disc list-inside">
                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('/dashboard/absensi/simpan') ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-6">
            <label for="id_kelas" class="block text-gray-700 text-sm font-bold mb-2">Pilih Kelas</label>
            <select id="id_kelas" name="id_kelas" class="select select-bordered w-full">
                <option value="">Pilih Kelas</option>
                <?php if (!empty($daftar_kelas)) : ?>
                    <?php foreach ($daftar_kelas as $kelas) : ?>
                        <option value="<?= $kelas['id_kelas'] ?>" <?= old('id_kelas') == $kelas['id_kelas'] ? 'selected' : '' ?>>
                            <?= esc($kelas['nama_kelas']) ?> (<?= date('d M Y, H:i', strtotime($kelas['jadwal_kelas'])) ?>)
                        </option>
                    <?php endforeach; ?>
                <?php else : ?>
                    <option value="" disabled>Tidak ada kelas tersedia</option>
                <?php endif; ?>
            </select>
        </div>

        <div class="mb-6" id="participants-section" style="display: <?= old('id_kelas') ? 'block' : 'none'; ?>;">
            <label class="block text-gray-700 text-sm font-bold mb-2">Daftar Peserta dan Status Absensi:</label>
            <div id="participants-list" class="mt-2 border rounded-lg bg-gray-50">
                </div>
            <?php if (session()->getFlashdata('errors') && isset(session()->getFlashdata('errors')['id_pengguna'])) : ?>
                <p class="text-red-500 text-xs italic mt-2"><?= esc(session()->getFlashdata('errors')['id_pengguna']) ?></p>
            <?php endif; ?>
        </div>

        <div class="mb-6">
            <label for="tanggal" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Absensi</label>
            <input type="date" id="tanggal" name="tanggal" class="input input-bordered w-full" value="<?= old('tanggal', date('Y-m-d')) ?>">
        </div>

        <div class="mb-6">
            <label for="keterangan" class="block text-gray-700 text-sm font-bold mb-2">Keterangan (Opsional)</label>
            <textarea id="keterangan" name="keterangan" class="textarea textarea-bordered w-full" rows="3" style="border: 1px solid #D1D5DB;"><?= old('keterangan') ?></textarea>
        </div>

        <button type="submit" class="btn btn-warning w-full md:w-auto text-black">Simpan Absensi</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const classSelect = document.getElementById('id_kelas');
        const participantsSection = document.getElementById('participants-section');
        const participantsList = document.getElementById('participants-list');

        async function loadParticipants(classId) {
            participantsList.innerHTML = '<p class="p-4 text-center text-gray-500">Memuat peserta...</p>';
            if (classId) {
                try {
                    const response = await fetch(`<?= base_url('/dashboard/absensi/getParticipantsByClass/') ?>${classId}`);
                    
                    if (!response.ok) {
                        const errorText = await response.text();
                        console.error('HTTP Error:', response.status, response.statusText, errorText);
                        throw new Error(`Server merespon dengan status ${response.status}`);
                    }

                    const participants = await response.json();
                    participantsList.innerHTML = ''; 

                    if (participants.length > 0) {
                        participantsSection.style.display = 'block';
                        
                        const oldInputIds = <?= json_encode(old('id_pengguna') ?? []) ?>;
                        const oldInputStatuses = <?= json_encode(old('status') ?? []) ?>;

                        participants.forEach(participant => {
                            const participantRow = document.createElement('div');
                            participantRow.classList.add('flex', 'items-center', 'justify-between', 'p-4', 'border-b', 'last:border-b-0');

                            const userInfoDiv = document.createElement('div');
                            
                            const participantName = document.createElement('p');
                            participantName.classList.add('font-semibold', 'text-gray-800');
                            participantName.textContent = participant.nama;
                            userInfoDiv.appendChild(participantName);

                            const participantEmail = document.createElement('small');
                            participantEmail.classList.add('text-gray-500');
                            participantEmail.textContent = participant.email;
                            userInfoDiv.appendChild(participantEmail);

                            const statusSelect = document.createElement('select');
                            statusSelect.name = `status[]`;
                            statusSelect.classList.add('select', 'select-bordered', 'select-sm');
                            statusSelect.innerHTML = `
                                <option value="">Pilih Status</option>
                                <option value="hadir">Hadir</option>
                                <option value="izin">Izin</option>
                                <option value="sakit">Sakit</option>
                                <option value="alpa">Alpa</option>
                            `;

                            const hiddenIdInput = document.createElement('input');
                            hiddenIdInput.type = 'hidden';
                            hiddenIdInput.name = `id_pengguna[]`;
                            hiddenIdInput.value = participant.id_pengguna;

                            participantRow.appendChild(userInfoDiv);
                            participantRow.appendChild(statusSelect);
                            participantRow.appendChild(hiddenIdInput); 
                            
                            participantsList.appendChild(participantRow);

                            const oldIndex = oldInputIds.indexOf(participant.id_pengguna.toString());
                            if (oldIndex !== -1) {
                                statusSelect.value = oldInputStatuses[oldIndex];
                            }
                        });
                    } else {
                        participantsList.innerHTML = '<p class="p-4 text-center text-gray-600">Tidak ada peserta untuk kelas ini.</p>';
                        participantsSection.style.display = 'block';
                    }
                } catch (error) {
                    console.error('Gagal memuat peserta:', error);
                    participantsList.innerHTML = '<p class="p-4 text-center text-red-500">Gagal memuat peserta. Silakan coba lagi.</p>';
                    participantsSection.style.display = 'block';
                }
            } else {
                participantsSection.style.display = 'none';
                participantsList.innerHTML = '';
            }
        }

        classSelect.addEventListener('change', function() {
            loadParticipants(this.value);
        });

        const initialClassId = classSelect.value;
        if (initialClassId) {
            loadParticipants(initialClassId);
        }
    });
</script>

<?= $this->endSection() ?>