<nav class="bg-white border-gray-200 w-full border sticky top-0 z-10">
  <div class="flex flex-wrap items-center justify-between mx-auto p-2">
    <a href="/" class="flex items-center p-4">
      <img src="<?= base_url('assets/image/logo.png') ?>" class="h-10" alt="Logo" />
      <img src="<?= base_url('assets/image/logo_text.png') ?>" class="h-10" alt="Logo" />
    </a>
    <div class="flex-none" id="navbar-default">
      <ul class="font-medium flex p-4 flex-row menu menu-horizontal">
        <li>
          <a href="/" class="block py-2 px-3 text-gray-900">Beranda</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900">Berita</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900">Profiler</a>
        </li>
        <li>
          <a href="/administrasi" class="block py-2 px-3 text-gray-900">Administrasi</a>
        </li>
        <li>
        <details>
          <summary>Layanan</summary>
          <ul class="bg-yellow-300 rounded-t-none rounded-b-lg">
            <li class="px-2"><a href="/tentang-kami">Tentang Kami</a></li>
            <li class="px-2"><a href="/visi-misi">Visi dan Misi</a></li>
            <li class="px-2"><a href="/asesmen">SOP Pelayanan Asesmen</a></li>
            <li class="px-2"><a href="/sop-layanan">SOP Layanan Interversi Terpadu</a></li>
          </ul>
        </details>
        </li>
        <li>
        <details>
          <summary>Parenting</summary>
          <ul class="bg-yellow-300 rounded-t-none rounded-b-lg">
            <li class="px-2"><a href="<?= base_url('login')?>">Pendaftaran Siswa</a></li>
            <li class="px-2"><a href="/syarat-daftar">Syarat Pendaftaran</a></li>
            <li class="px-2"><a href="/tim">TIM</a></li>
            <li class="px-2"><a>Hubungi Kami</a></li>
            <li class="px-2"><a>Kritik dan Saran</a></li>
          </ul>
        </details>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900">Informasi</a>
        </li>
        <li>
        <details>
          <summary>Sosial Media</summary>
          <ul class="bg-yellow-300 rounded-t-none rounded-b-lg">
            <li class="px-2"><a href="/kelas-transisi">Kelas Transisi</a></li>
            <li class="px-2"><a href="/remedial-teaching">Layanan Remedial Teaching</a></li>
            <li class="px-2"><a>Layanan Bina Wicara</a></li>
            <li class="px-2"><a href="/interverensi-okupasi">Layanan Intervensi Okupasi</a></li>
          </ul>
        </details>
        </li>
      </ul>
    </div>
  </div>
</nav>