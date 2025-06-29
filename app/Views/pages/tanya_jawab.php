<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="container mx-auto my-16">
    <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
        <div class="col-span-1 md:col-span-3 border-yellow-300 border-2 p-4 rounded-xl">
            <h1 class="font-bold text-2xl mb-4">FAQs</h1>
            <?php if (!empty($tanya_jawab)): ?>
                <?php foreach ($tanya_jawab as $item): ?>
                    <div class="collapse collapse-arrow bg-base-200 mb-3">
                        <input type="radio" name="my-accordion-<?= $item['id'] ?>" />
                        <div class="collapse-title text-xl font-medium bg-yellow-400">
                            <?= esc($item['pertanyaan']) ?>
                        </div>
                        <div class="collapse-content bg-yellow-200">
                            <p><?= esc($item['jawaban'] ?? 'Belum ada jawaban.') ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Tidak ada pertanyaan umum yang tersedia saat ini.</p>
            <?php endif; ?>
        </div>
        <div class="col-span-1 md:col-span-2 border-yellow-300 border-2 p-4 rounded-xl">
            <h1 class="font-bold text-2xl mb-4">Sampaikan Pertanyaan Anda Disini</h1>
            <form id="pertanyaanForm" class="bg-white">
                <?= csrf_field() ?>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_lengkap">
                        Nama Lengkap
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nama_lengkap" name="nama_lengkap" type="text" placeholder="Nama Lengkap">
                    <p class="text-red-500 text-xs italic hidden" id="error_nama_lengkap"></p>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="subjek_pertanyaan">
                        Subjek Pertanyaan
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="subjek_pertanyaan" name="subjek_pertanyaan" type="text" placeholder="Subjek Pertanyaan">
                    <p class="text-red-500 text-xs italic hidden" id="error_subjek_pertanyaan"></p>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Alamat Email
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="Alamat Email">
                    <p class="text-red-500 text-xs italic hidden" id="error_email"></p>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="pertanyaan">
                        Pertanyaan Anda
                    </label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="pertanyaan" name="pertanyaan" placeholder="Ketikan Pertanyaan Anda Disini"></textarea>
                    <p class="text-red-500 text-xs italic hidden" id="error_pertanyaan"></p>
                </div>
                <div class="grid gap-2">
                    <button class="bg-yellow-400 w-full hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Kirim Pertanyaan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

document.getElementById('pertanyaanForm').addEventListener('submit', function(event) {
    event.preventDefault(); 

    const form = event.target;
    const formData = new FormData(form);

    
    document.querySelectorAll('.text-red-500').forEach(el => el.classList.add('hidden'));

    fetch('<?= base_url('/tanya-jawab/submit') ?>', {
        method: 'POST',
        
        headers: {
            'X-Requested-With': 'XMLHttpRequest' 
        },
        
        body: formData
    })
    .then(response => response.json()) // Parsing respons sebagai JSON
    .then(data => {
        if (data.status === 'fail') {
            // Tampilkan pesan error validasi dari server
            for (const field in data.messages) {
                const errorElement = document.getElementById(`error_${field}`);
                if (errorElement) {
                    errorElement.textContent = data.messages[field];
                    errorElement.classList.remove('hidden');
                }
            }
            alert('Gagal mengirim pertanyaan. Mohon periksa kembali input Anda.');
        } else if (data.status === 'created') {
            alert(data.message); // Tampilkan pesan sukses
            form.reset(); // Reset form setelah berhasil
            
        } else {
            alert('Terjadi kesalahan yang tidak diketahui.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat berkomunikasi dengan server.');
    });
});
</script>

<?= $this->endSection() ?>