<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Disabilitas dan Pendidikan Inklusif Kota Padang</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/font/index.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/font/outlined.css') ?>">
</head>
<body>

<div class="drawer drawer-open">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content flex flex-col items-center justify-center bg-yellow-300">
        <!-- Page content here -->
        <div class="bg-white w-11/12 h-full m-4 rounded-2xl">
            <?= $this->renderSection('content') ?>
        </div>
    </div>
    <div class="drawer-side">

        <div class="grid bg-yellow-300 min-h-full w-64 p-16 content-between">
                <div class="mx-auto text-center">
                    <img src="<?= base_url('assets/image/person.jpg') ?>" class="w-20 h-20 rounded-2xl">
                    <h1 class="text-2xl font-bold">
                        <?= session()->get('nama') ?>
                    </h1>
                </div>

                <div>
                    <ul class="menu text-xl font-semibold">
                        <li>
                            <a href="/dashboard">
                                <svg  xmlns="http://www.w3.org/2000/svg"
                                      width="24"
                                      height="24"
                                      viewBox="0 0 24 24"
                                      fill="none"
                                      stroke="currentColor"
                                      stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                >
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 13m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                    <path d="M13.45 11.55l2.05 -2.05" /><path d="M6.4 20a9 9 0 1 1 11.2 0z" /></svg>
                                Dashboard
                            </a></li>
                        <li><a href="/dashboard/training">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     height="24px"
                                     viewBox="0 -960 960 960"
                                     width="24px"
                                     fill="#000"
                                ><path d="M480-120 200-272v-240L40-600l440-240 440
                                240v320h-80v-276l-80 44v240L480-120Zm0-332
                                274-148-274-148-274 148 274 148Zm0 241
                                200-108v-151L480-360 280-470v151l200 108Zm0-241Zm0 90Zm0 0Z"/>
                                </svg>
                                Training</a></li>
                        <li><a href="/dashboard/workshop">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     width="24"
                                     height="24"
                                     viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor"
                                     stroke-width="1"
                                     stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <path d="M2,4H10C10,3.45 10.45,3 11,3H12C12.55,3 13,3.45 13,4H21V5H20V16H14.27L15.88,22H14.84L13.23,16H9.77L8.16,22H7.12L8.73,16H3V5H2V4M19,15V5H4V15H19Z" />
                                </svg>
                                Workshops</a></li>
                        <li><a href="/dashboard/timetable">
                                <svg  xmlns="http://www.w3.org/2000/svg"
                                      width="24"
                                      height="24"
                                      viewBox="0 0 24 24"
                                      fill="none"
                                      stroke="currentColor"
                                      stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      class="icon icon-tabler icons-tabler-outline icon-tabler-clock-hour-3">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                    <path d="M12 12h3.5" /><path d="M12 7v5" /></svg>
                                Timetable</a></li>
                    </ul>
                </div>

                <div >
                    <ul class="menu text-xl font-semibold text-red-600">
                        <li><a href="<?= base_url('/dashboard/logout') ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <g fill="none">
                                        <path fill="currentColor" d="M3 3V2H2v1zm9.293 10.707a1 1 0 0 0 1.414-1.414zM4 11V3H2v8zM3 4h8V2H3zm-.707-.293l10 10l1.414-1.414l-10-10z" />
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M4 15v0c0 1.87 0 2.804.402 3.5A3 3 0 0 0 5.5 19.598C6.196 20 7.13 20 9 20h5c2.828 0 4.243 0 5.121-.879C20 18.243 20 16.828 20 14V9c0-1.87 0-2.804-.402-3.5A3 3 0 0 0 18.5 4.402C17.804 4 16.87 4 15 4v0" />
                                    </g>
                                </svg>
                                Logout</a>
                        </li>
                    </ul>

                </div>
        </div>
    </div>
</div>

</body>
</html>