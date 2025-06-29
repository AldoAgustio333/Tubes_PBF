<?= $this->extend('layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<div class="m-4 gap-2">
    <h2 class="text-3xl font-bold mb-6 text-center">Kelola Pertanyaan Pengguna</h2>

    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead>
                <tr class="bg-slate-200">
                    <th>#</th>
                    <th>Nama Pengirim</th>
                    <th>Email</th>
                    <th>Subjek</th>
                    <th>Pertanyaan</th>
                    <th>Status Jawaban</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php if (!empty($pertanyaan)): ?>
                    <?php foreach ($pertanyaan as $item): ?>
                        <tr>
                            <th><?= $no++ ?></th>
                            <td><?= esc($item['nama_lengkap']) ?></td>
                            <td><?= esc($item['email']) ?></td>
                            <td><?= esc($item['subjek_pertanyaan']) ?></td>
                            <td><?= esc($item['pertanyaan']) ?></td>
                            <td>
                                <?php if (!empty($item['jawaban'])): ?>
                                    <span class="badge badge-success">Sudah Dijawab</span>
                                <?php else: ?>
                                    <span class="badge badge-warning">Menunggu Jawaban</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="flex gap-4 justify-end">
                                    <button onclick="showAnswerModal(<?= $item['id'] ?>, '<?= esc($item['pertanyaan'], 'js') ?>', '<?= esc($item['jawaban'] ?? '', 'js') ?>')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-500 hover:text-green-700">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                            <path d="M16 5l3 3" />
                                        </svg>
                                    </button>
                                    <button onclick="deletePertanyaan(<?= $item['id'] ?>)">
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
                        <td colspan="7" class="text-center">Tidak ada pertanyaan yang masuk.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <dialog id="answer_modal" class="modal">
        <div class="modal-box w-11/12 max-w-2xl">
            <h3 class="font-bold text-lg mb-4 text-center">Jawab Pertanyaan</h3>
            
            <p class="block text-gray-700 text-sm font-bold mb-2">Pertanyaan:</p>
            <p id="question_text" class="mb-4 p-3 bg-gray-100 rounded-lg text-sm"></p>
            
            <form id="answerForm" class="grid gap-y-3" method="post">
                <?= csrf_field() ?>
                <input type="hidden" id="pertanyaan_id" name="id">
                
                <div>
                    <label for="answer_textarea" class="block text-gray-700 text-sm font-bold mb-2">Jawaban Anda:</label>
                    <textarea id="answer_textarea" name="jawaban" class="textarea textarea-bordered w-full h-32" placeholder="Tulis jawaban di sini..." style="border: 1px solid #D1D5DB;"></textarea>
                    <p class="text-red-500 text-xs italic hidden" id="error_jawaban"></p>
                </div>

                <button type="submit" class="btn btn-warning mt-4 text-black">Simpan Jawaban</button>
            </form>
            
            <form method="dialog" class="mt-2">
                 <button class="btn w-full">Batal</button>
            </form>

            <form method="dialog" class="absolute right-2 top-2">
                 <button class="btn btn-sm btn-circle btn-ghost">✕</button>
            </form>
        </div>
    </dialog>
</div>

<script>
    let currentPertanyaanId = null;

    function showAnswerModal(id, question, answer) {
        currentPertanyaanId = id;
        document.getElementById('pertanyaan_id').value = id;
        document.getElementById('question_text').textContent = question;
        document.getElementById('answer_textarea').value = answer;
        document.getElementById('error_jawaban').classList.add('hidden');
        document.getElementById('answer_modal').showModal();
    }

    document.getElementById('answerForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const form = event.target;
        const formData = new FormData(form);
        const errorElement = document.getElementById('error_jawaban');
        const submitButton = form.querySelector('button[type="submit"]');

        errorElement.classList.add('hidden');
        submitButton.disabled = true;
        submitButton.innerHTML = `<span class="loading loading-spinner"></span> Menyimpan...`;

        // Mengambil token CSRF dari dalam form
        const csrfTokenName = '<?= csrf_token() ?>'; 
        const csrfTokenValue = form.querySelector(`input[name="${csrfTokenName}"]`).value;

        // Mendefinisikan headers yang akan dikirim
        const headers = {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': csrfTokenValue
        };

        console.log("Mengirim request dengan headers:", headers);
        
        fetch(`<?= base_url('/dashboard/pertanyaan/jawab/') ?>${currentPertanyaanId}`, {
            method: 'POST',
            headers: headers, 
            body: formData
        })
        .then(async (response) => {
            const data = await response.json().catch(() => ({ message: 'Respons server tidak valid.' }));
            if (!response.ok) {
                
                return Promise.reject(data);
            }
            return data;
        })
        .then(data => {
            if (data.status === 'updated') {
                alert(data.message);
                document.getElementById('answer_modal').close();
                location.reload(); 
            } else {
                throw new Error(data.message || 'Terjadi kesalahan yang tidak diketahui.');
            }
        })
        .catch(error => {
            console.error('Error saat submit:', error); 
            
            if (error.messages && error.messages.jawaban) {
                errorElement.textContent = error.messages.jawaban;
                errorElement.classList.remove('hidden');
            } else {
                
                alert(error.message || 'Gagal menyimpan. Terjadi kesalahan pada server.');
            }
        })
        .finally(() => {
            
            submitButton.disabled = false;
            submitButton.innerHTML = 'Simpan Jawaban';
        });
    });

    function deletePertanyaan(id) {
        if (confirm('Yakin ingin menghapus pertanyaan ini?')) {
            const csrfTokenName = '<?= csrf_token() ?>';
            const csrfTokenValue = document.querySelector(`#answerForm input[name="${csrfTokenName}"]`).value;

            fetch(`<?= base_url('/dashboard/pertanyaan/delete/') ?>${id}`, {
                method: 'DELETE',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': csrfTokenValue
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'deleted') {
                    alert(data.message);
                    location.reload();
                } else {
                    alert('Gagal menghapus pertanyaan: ' + (data.message || 'Terjadi kesalahan.'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menghapus pertanyaan.');
            });
        }
    }
</script>

<?= $this->endSection() ?>