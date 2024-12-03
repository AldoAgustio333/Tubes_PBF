<div class="grid grid-cols-3 mt-10 gap-4">
        <?php foreach ($kegiatan as $g) : ?>
            <div class="max-w-2xl bg-white border border-gray-200 rounded-lg shadow">
            <a href="<?php echo base_url('berita/' . $g['id_galeri']) ?>">
                <img class="rounded-t-lg" src="<?php echo base_url('assets/image/berita/' . $g['image']) ?>" alt="Placeholder">
            </a>
            <div class="p-5">
            <a href="<?php echo base_url('berita/' . $g['id_galeri']) ?>">
                    <h5 class="mb-2 text-2xl tracking-tight text-gray-900"><?= $g['nama_kegiatan'] ?></h5>
                </a>
                <?php if ($g['tanggal_mulai'] == $g['tanggal_selesai']): ?>
                    <p class="mb-3 font-normal text-gray-700"><?= $g['tanggal_mulai'] ?></p>
                <?php else: ?>
                    <p class="mb-3 font-normal text-gray-700"><?= $g['tanggal_mulai'].' - '.$g['tanggal_selesai'] ?></p>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
</div>