<!DOCTYPE html>
<?php
include 'sistem/koneksi.php';

$dtotal_dpt = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih");
$total_dpt = mysqli_num_rows($dtotal_dpt);
$ddpt_sudah_memilih = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE status='Sudah memilih'");
$dpt_sudah_memilih = mysqli_num_rows($ddpt_sudah_memilih);
$persen_suara = round(($dpt_sudah_memilih * 100)  / $total_dpt);

$dcalon_bph_mpm = mysqli_query($koneksi, "SELECT * FROM calon_bph_mpm");
$tcalon_bph_mpm = mysqli_num_rows($dcalon_bph_mpm);
$dcalon_anggota_mpm = mysqli_query($koneksi, "SELECT * FROM calon_anggota_mpm");
$tcalon_anggota_mpm = mysqli_num_rows($dcalon_anggota_mpm);
$dcalon_bem = mysqli_query($koneksi, "SELECT * FROM calon_bem");
$tcalon_bem = mysqli_num_rows($dcalon_bem);
$dcalon_hima = mysqli_query($koneksi, "SELECT * FROM calon_hima");
$tcalon_hima = mysqli_num_rows($dcalon_hima);
$total_peserta = round($tcalon_bph_mpm + $tcalon_anggota_mpm + $tcalon_bem + $tcalon_hima);
?>

<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/tailwind.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/aos.css" rel="stylesheet" />
    <script type="text/javascript" src="dist/js/function.js"></script>
    <script type="text/javascript" src="dist/js/aos.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- ... -->
</head>

<body>
    <!-- BOT TO TOP -->
    <button class="hidden" onclick="window.scrollTo(0,0)" id="tombolup" title="Go to top">
        <div class="w-14 sm:w-24 bottom-14 right-8 z-50 cursor-pointer fixed hover:w-32">
            <img src="dist/assets/img/gamepad.png">
        </div>
    </button>
    <!-- Nav -->
    <header>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <div class="w-full text-white bg-red-1000 z-50 font1">
            <div x-data="{ open: false }"
                class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                <div class="p-4 flex flex-row items-center justify-between">
                    <a href="#"
                        class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">
                        <img class="w-auto h-11" src="dist/assets/img/logo.webp" alt="" /></a>
                    <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                            <path x-show="!open" fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                            <path x-show="open" fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <nav :class="{'flex': open, 'hidden': !open}"
                    class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row ">
                    <a class="px-4 py-2 mt-2 text-sm font-semibold md:mt-0 hover:text-yellow-1000 focus:text-red-1000  focus:outline-none focus:shadow-outline"
                        href="index.php">BERANDA</a>
                    <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent md:mt-0 md:ml-4 hover:text-yellow-1000 focus:text-red-1000  focus:outline-none focus:shadow-outline"
                        href="#pm">PEMIRA</a>
                    <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent md:mt-0 md:ml-4  hover:text-yellow-1000 focus:text-red-1000  focus:outline-none focus:shadow-outline"
                        href="#vm">VISI & MISI</a>
                    <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent md:mt-0 md:ml-4  hover:text-yellow-1000 focus:text-red-1000  focus:outline-none focus:shadow-outline"
                        href="#tm">TIMELINE</a>
                    <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent md:mt-0 md:ml-4  hover:text-yellow-1000 focus:text-red-1000  focus:outline-none focus:shadow-outline"
                        href="#kt">KONTAK</a>
                </nav>
            </div>
        </div>
    </header>
    <!-- Content -->
    <section class="pattern relative">
        <div class="flex flex-col mx-auto sm:py-12 lg:py-24 lg:flex-row justify-between relative">
            <img src="dist/assets/img/hpt.png" alt=""
                class="object-cover xl:max-w-screen-md lg:max-w-md sm:max-w-screen-sm" />
            <div
                class="flex flex-col justify-center xl:mr-60 lg:mr-32 text-center rounded-sm lg:max-w-xl xl:max-w-2xl lg:text-left flex-1 lg:mb-24 text-white px-8">
                <h1 class="lg:text-6xl font-bold leading-none sm:text-6xl mb-4">
                    Selamat Datang di
                    <div class="block">E-Voting</div>
                </h1>
                <!-- <h2 class="lg:text-4xl font-bold leading-none sm:text-6xl mb-2"></h2> -->
                <h2 class="lg:text-4xl font-bold leading-none sm:text-6xl">Mahasiswa Raya Polimedia 2021</h2>

                <p class="mt-6 mb-8 text-lg sm:mb-12">
                    Pemilihan dengan bersih dan adil, karena kami yakin majunya Polimedia Jakarta berawal dari
                    kebersihan hati
                    <br class="hidden md:inline lg:hidden" />
                    untuk senantiasa adil pada segenap Civitas Akademik Politeknik Negeri Media Kreatif Jakarta
                </p>
                <div
                    class="flex flex-col space-y-4 sm:items-center sm:justify-center sm:flex-row sm:space-y-0 sm:space-x-4 lg:justify-start text-white pb-20">
                    <a href="sistem/login.php"
                        class="px-12 py-3 font-semibold rounded-full bg-yellow-1000 hover:bg-yellow-300 duration-200 text-xl">
                        Login </a>
                </div>
            </div>
        </div>
        <span
            class="animate__infinite infinite animate__animated animated bounce animate__bounce absolute w-full xl:bottom-48 lg:bottom-24 md:bottom-12 flex items-center justify-center">
            <a href="#Profil">
                <img src="dist/assets/img/arrow.png" alt="" class="h-5">
            </a>
        </span>
    </section>

    <!-- PEMIRA -->
    <section class="bg-yellow-1000 flex justify-between flex-row relative h-he xl:h-he2 lg:h-he3 md:h-full z-10"
        id="pm">
        <img src="dist/assets/img/Cardl.webp" alt=""
            class="h-full max-w-xs object-cover object-right hidden md:inline" />

        <div class="flex flex-col items-center justify-center text-center absolute mx-auto w-full">
            <div class="mb-8">
                <img src="dist/assets/img/pemiraa.png" alt="" class="md:w-128" />
            </div>

            <h1 class="mb-12 text-2xl xl:text-2xl lg:text-xl md:text-lg text-white max-w-2xl" data-aos="zoom-out">
                Pemira Polimedia Jakarta merupakan kegiatan pemilihan Raya yang di ikuti oleh seluruh Civitas Akademika
                Polimedia Jakarta, untuk mendapatkan pemimpin ideal yang dicintai seluruh
                Civitas Akademik Politeknik Negeri Media Kreatif Jakarta
            </h1>
        </div>

        <img src="dist/assets/img/Cardr.webp" alt=""
            class="h-full max-w-xs object-cover object-left hidden md:inline" />

        <svg class="w-full object-cover absolute -bottom-1 left-0" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 1440 320">
            <path fill="#810D24" fill-opacity="1"
                d="M0,96L80,85.3C160,75,320,53,480,80C640,107,800,181,960,186.7C1120,192,1280,128,1360,96L1440,64L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
            </path>
        </svg>
    </section>

    <!-- CALON -->

    <div class="bg-red-1000" id="vm">
        <div class="flex items-center justify-center">
            <h1 class="font-bold text-4xl z-20 text-white mb-8">VISI & MISI CALON</h1>
        </div>
        <div class="item-center flex-wrap justify-center flex items-center gap-4 font-bold text-white md:mt-6"
            id="danung">
            <div class="px-5 py-1 border-b-2 hover:border-yellow-500 active btns" onclick="filterSelection('all')">ALL
            </div>
            <div class="px-5 py-1 border-b-2 hover:border-yellow-500 btns" onclick="filterSelection('mpm')">MPM</div>
            <div class="px-5 py-1 border-b-2 hover:border-yellow-500 btns" onclick="filterSelection('bem')">BEM</div>
            <div class="px-5 py-1 border-b-2 hover:border-yellow-500 btns" onclick="filterSelection('tgk48')">TGK</div>
            <div class="px-5 py-1 border-b-2 hover:border-yellow-500 btns" onclick="filterSelection('mm')">MM</div>
            <div class="px-5 py-1 border-b-2 hover:border-yellow-500 btns" onclick="filterSelection('dg')">DG</div>
            <div class="px-5 py-1 border-b-2 hover:border-yellow-500 btns" onclick="filterSelection('desm')">DM</div>
            <div class="px-5 py-1 border-b-2 hover:border-yellow-500 btns" onclick="filterSelection('gtk')">GTK</div>
            <div class="px-5 py-1 border-b-2 hover:border-yellow-500 btns" onclick="filterSelection('anm')">ANM</div>
            <div class="px-5 py-1 border-b-2 hover:border-yellow-500 btns" onclick="filterSelection('pnb')">PNB</div>
            <div class="px-5 py-1 border-b-2 hover:border-yellow-500 btns" onclick="filterSelection('bc')">BC</div>
            <div class="px-5 py-1 border-b-2 hover:border-yellow-500 btns" onclick="filterSelection('ftg')">FTG</div>
            <div class="px-5 py-1 border-b-2 hover:border-yellow-500 btns" onclick="filterSelection('pkl')">PKL</div>
            <div class="px-5 py-1 border-b-2 hover:border-yellow-500 btns" onclick="filterSelection('htl')">PPH</div>
            <div class="px-5 py-1 border-b-2 hover:border-yellow-500 btns" onclick="filterSelection('skl')">SKL</div>
            <div class="px-5 py-1 border-b-2 hover:border-yellow-500 btns" onclick="filterSelection('ftv')">FTV</div>
        </div>

        <section class="text-white body-font pb-36 z-10">
            <div class="container px-5 py-24 mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 -m-4">
                    <div class="p-4 column mpm">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/BPHMPM/1-01.jpg" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">MAJELIS
                                    PERMUSYAWARATAN MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">Muhamad Akbar</h1>
                                <p class="leading-relaxed text-yellow-500">Badan Pengurus Harian</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 column mpm">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/BPHMPM/2-01.jpg" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">MAJELIS
                                    PERMUSYAWARATAN MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">Mayu Aulia Fadhilah</h1>
                                <p class="leading-relaxed text-yellow-500">Badan Pengurus Harian</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 column mpm">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/BPHMPM/3-01.jpg" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">MAJELIS
                                    PERMUSYAWARATAN MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">Andi Zafaf Bayu Aji</h1>
                                <p class="leading-relaxed text-yellow-500">Badan Pengurus Harian</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 column mpm">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/BPHMPM/4-01.jpg" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">MAJELIS
                                    PERMUSYAWARATAN MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">Muhammad Rafif Saputro</h1>
                                <p class="leading-relaxed text-yellow-500">Badan Pengurus Harian</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 column mpm">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/BPHMPM/5-01.jpg" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">MAJELIS
                                    PERMUSYAWARATAN MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">Jihan Zakyyah</h1>
                                <p class="leading-relaxed text-yellow-500">Badan Pengurus Harian</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 column mpm">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/BPHMPM/6-01.jpg" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">MAJELIS
                                    PERMUSYAWARATAN MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">Annisa Rima Amalia</h1>
                                <p class="leading-relaxed text-yellow-500">Badan Pengurus Harian</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 column mpm">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/BPHMPM/7-01.jpg" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">MAJELIS
                                    PERMUSYAWARATAN MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">Muhammad Rifqi Saputra</h1>
                                <p class="leading-relaxed text-yellow-500">Badan Pengurus Harian</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 column mpm">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/BPHMPM/8-01.jpg" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">MAJELIS
                                    PERMUSYAWARATAN MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">laila Salsabila</h1>
                                <p class="leading-relaxed text-yellow-500">Badan Pengurus Harian</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 column mpm">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/BPHMPM/9-01.jpg" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">MAJELIS
                                    PERMUSYAWARATAN MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">Annisa Salsabilla Putri
                                </h1>
                                <p class="leading-relaxed text-yellow-500">Badan Pengurus Harian</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 column mpm">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/BPHMPM/11-01.jpg" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">MAJELIS
                                    PERMUSYAWARATAN MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">Prima Andhareza</h1>
                                <p class="leading-relaxed text-yellow-500">Badan Pengurus Harian</p>
                            </div>
                        </div>
                    </div>

                    <!-- KABEM -->

                    <div class="p-4 column bem">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/BEM/BEM PASLON 1-01.jpg" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">BADAN
                                    EKSEKUTIF<BR> MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">Nur Amru Sabil & Agriphina
                                    Cepti</h1>
                                <p class="leading-relaxed text-yellow-500">Calon KaBEM & WaKaBem</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 column bem">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/BEM/BEM PASLON 2-01.jpg" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">BADAN
                                    EKSEKUTIF<BR> MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">Agistra Arifin & Fitra
                                    Amalia</h1>
                                <p class="leading-relaxed text-yellow-500">Calon KaBEM & WaKaBem</p>
                            </div>
                        </div>
                    </div>

                    <!-- HIMA -->
                    <!-- TGK -->
                    <div class="p-4 column tgk48">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/HIMAA/Teknik Grafika Kemasan_1-01.webp" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                    HIMPUNAN<BR>
                                    MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">Nurul A'lam & Haekal
                                    Permana </h1>
                                <p class="leading-relaxed text-yellow-500">Calon KaHim & WaKaHim</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 column tgk48">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/HIMAA/Teknik Grafika Kemasan_2-01.webp" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                    HIMPUNAN<BR>
                                    MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">Anggoro Sujanto & Kharis
                                    Rivaldi</h1>
                                <p class="leading-relaxed text-yellow-500">Calon KaHim & WaKaHim</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 column tgk48">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/HIMAA/Teknik Grafika Kemasan_3-01.webp" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                    HIMPUNAN<BR>
                                    MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">Aldi Fadillah & M.
                                    Raihand Ruslan</h1>
                                <p class="leading-relaxed text-yellow-500">Calon KaHim & WaKaHim</p>
                            </div>
                        </div>
                    </div>

                    <!-- DESMODIAN -->
                    <div class="p-4 column desm">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/HIMAA/Desain Mode_1-01.webp" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                    HIMPUNAN<BR>
                                    MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">Jasmine &
                                    Sofiah As Sunnah</h1>
                                <p class="leading-relaxed text-yellow-500">Calon KaHim & WaKaHim</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 column desm">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/HIMAA/Desain Mode_2-01.webp" />
                            <div class=" px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0
                                hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                    HIMPUNAN<BR>
                                    MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">Mouly Salsania &
                                    Rifda Fajrina</h1>
                                <p class="leading-relaxed text-yellow-500">Calon KaHim & WaKaHim</p>
                            </div>
                        </div>
                    </div>

                    <!-- PNB -->
                    <div class="p-4 column pnb">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/HIMAA/Penerbitan_1-01.webp" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                    HIMPUNAN<BR>
                                    MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">Erlangga.W &
                                    Rafael Al Maraghy</h1>
                                <p class="leading-relaxed text-yellow-500">Calon KaHim & WaKaHim</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 column pnb">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/HIMAA/Penerbitan_2-01.webp" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                    HIMPUNAN<BR>
                                    MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">Malik Fikri &
                                    Aliya Putri A</h1>
                                <p class="leading-relaxed text-yellow-500">Calon KaHim & WaKaHim</p>
                            </div>
                        </div>
                    </div>

                    <!-- BC -->
                    <div class="p-4 column bc">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/HIMAA/Broadcast_1-01.webp" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                    HIMPUNAN<BR>
                                    MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">Abdul Azis &
                                    Raeyi Rahmansyah </h1>
                                <p class="leading-relaxed text-yellow-500">Calon KaHim & WaKaHim</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 column bc">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/HIMAA/Broadcast_2-01.webp" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                    HIMPUNAN<BR>
                                    MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">Syarif Ramadhan &
                                    Hasyim Wahid</h1>
                                <p class="leading-relaxed text-yellow-500">Calon KaHim & WaKaHim</p>
                            </div>
                        </div>
                    </div>

                    <!-- GTK -->
                    <div class="p-4 column gtk">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/HIMAA/Game Tech_1-01.webp" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                    HIMPUNAN<BR>
                                    MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">Ainnun Nabil &
                                    M. Walid Zaki </h1>
                                <p class="leading-relaxed text-yellow-500">Calon KaHim & WaKaHim</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 column gtk">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/HIMAA/Gam Tech_2-01.webp" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                    HIMPUNAN<BR>
                                    MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">Bagus Hendrawan &
                                    Steven Julian </h1>
                                <p class="leading-relaxed text-yellow-500">Calon KaHim & WaKaHim</p>
                            </div>
                        </div>
                    </div>
                    <!-- Senkul -->
                    <div class="p-4 column skl">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/HIMAA/Seni Kuliner_1-01.webp" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                    HIMPUNAN<BR>
                                    MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">Muhamad Fadilah &
                                    Reza Aida A</h1>
                                <p class="leading-relaxed text-yellow-500">Calon KaHim & WaKaHim</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 column skl">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/HIMAA/Seni Kuliner_2-01.webp" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                    HIMPUNAN<BR>
                                    MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">Dava Nugrafitra &
                                    M Farhan Arya</h1>
                                <p class="leading-relaxed text-yellow-500">Calon KaHim & WaKaHim</p>
                            </div>
                        </div>
                    </div>

                    <!-- FTG -->
                    <div class="p-4 column ftg">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/HIMAA/Fotografi_1-01.webp" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                    HIMPUNAN<BR>
                                    MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">G Ghudzamir &
                                    Labib Shafa</h1>
                                <p class="leading-relaxed text-yellow-500">Calon KaHim & WaKaHim</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 column ftg">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/HIMAA/Fotografi_2-01.webp" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                    HIMPUNAN<BR>
                                    MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">M Akbar &
                                    Ganesha Arya</h1>
                                <p class="leading-relaxed text-yellow-500">Calon KaHim & WaKaHim</p>
                            </div>
                        </div>
                    </div>

                    <!-- HTL -->
                    <div class="p-4 column htl">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/HIMAA/Perhotelan_1-01.webp" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                    HIMPUNAN<BR>
                                    MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">Muhammad Bani &
                                    Citra Hasti</h1>
                                <p class="leading-relaxed text-yellow-500">Calon KaHim & WaKaHim</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 column htl">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/HIMAA/Perhotelan_2-01.webp" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                    HIMPUNAN<BR>
                                    MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">Muhamad Ridho &
                                    Hadi Zahrah</h1>
                                <p class="leading-relaxed text-yellow-500">Calon KaHim & WaKaHim</p>
                            </div>
                        </div>
                    </div>
                    <!-- ANM -->
                    <div class="p-4 column anm">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/HIMAA/anm1.png" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                    HIMPUNAN<BR>
                                    MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">Abiyyu Sya'ban &
                                    Maya Almira</h1>
                                <p class="leading-relaxed text-yellow-500">Calon KaHim & WaKaHim</p>
                            </div>
                        </div>
                    </div>

                    <!-- DG -->
                    <div class="p-4 column dg">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/HIMAA/Desain Grafis_1-01.webp" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                    HIMPUNAN<BR>
                                    MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3"> Hilmy Hermawan &
                                    Raden Sakti </h1>
                                <p class="leading-relaxed text-yellow-500">Calon KaHim & WaKaHim</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 column dg">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/HIMAA/Desain Grafis_2-01.webp" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                    HIMPUNAN<BR>
                                    MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3"> Abi Gusti &
                                    Ahmad Dwi </h1>
                                <p class="leading-relaxed text-yellow-500">Calon KaHim & WaKaHim</p>
                            </div>
                        </div>
                    </div>

                    <!-- mm -->
                    <div class="p-4 column mm">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/HIMAA/Multimedia_1-01.webp" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                    HIMPUNAN<BR>
                                    MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3"> Muhammad Dimas &
                                    Mevida Ayu </h1>
                                <p class="leading-relaxed text-yellow-500">Calon KaHim & WaKaHim</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 column mm">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/HIMAA/Multimedia_2-01.webp" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                    HIMPUNAN<BR>
                                    MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">Farraz Susanto &
                                    Andi Tri</h1>
                                <p class="leading-relaxed text-yellow-500">Calon KaHim & WaKaHim</p>
                            </div>
                        </div>
                    </div>

                    <!-- pkl -->
                    <div class="p-4 column pkl">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/HIMAA/Periklanan_1-01.webp" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                    HIMPUNAN<BR>
                                    MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3"> Rizky &
                                    Feby &
                                    Amanda </h1>
                                <p class="leading-relaxed text-yellow-500">Calon KaHim & WaKaHim</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 column pkl">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/HIMAA/Periklanan_2-01.webp" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                    HIMPUNAN<BR>
                                    MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">Rahmad &
                                    Rifka &
                                    Karen</h1>
                                <p class="leading-relaxed text-yellow-500">Calon KaHim & WaKaHim</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 column pkl">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="dist/assets/img/paslon/HIMAA/Periklanan_3-01.webp" />
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">
                                    HIMPUNAN<BR>
                                    MAHASISWA</h2>
                                <h1 class="title-font text-lg font-medium text-red-900 mb-3">Fauzan
                                    Maura &
                                    Ahmad </h1>
                                <p class="leading-relaxed text-yellow-500">Calon KaHim & WaKaHim</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <svg class="flex w-full -mt-60 z-10 relative" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#E6B635" fill-opacity="1"
            d="M0,96L80,85.3C160,75,320,53,480,80C640,107,800,181,960,186.7C1120,192,1280,128,1360,96L1440,64L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
        </path>
    </svg>

    <section class="bg-yellow-1000 z-10" id="tm">
        <div class="flex items-center justify-center">
            <h1 class="font-bold text-4xl z-10 text-red-900">TIMELINE</h1>
        </div>
        <div class="mx-auto flex items-center px-4 py-16 text-center md:py-32 md:px-10 lg:px-32 z-20 relative">
            <img src="dist/assets/img/TIMELINE.png" alt="" class="object-cover w-full" />
        </div>
    </section>

    <!-- FOOTER -->
    <div class="bg-red-1000" id="kt">
        <div class="px-4 pt-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
            <div class="grid gap-10 row-gap-6 mb-8 sm:grid-cols-2 lg:grid-cols-4">
                <div class="sm:col-span-2">
                    <a href="/" aria-label="Go home" title="Company" class="inline-flex items-center">
                        <img src="dist/assets/img/logo.webp" alt="Logo" class="h-14 mr-2" />
                        <!-- <span class="ml-2 text-xl font-bold tracking-wide text-white uppercase">PEMIRA <br>
                            POLIMEDIA</span> -->
                    </a>
                    <div class="mt-6 lg:max-w-sm">
                        <p class="text-sm text-white">Jl. Srengseng Sawah Raya No.17, RT.8/RW.3, Srengseng Sawah, Kec.
                            Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12630.</p>
                    </div>
                </div>
                <div class="space-y-2 text-sm">
                    <p class="text-base font-bold tracking-wide text-white">Kontak</p>
                    <div class="flex">
                        <p class="mr-1 text-white">Telepon:</p>
                        <a href="tel:850-123-5021" aria-label="Our phone" title="Our phone"
                            class="transition-colors duration-300 hover:text-yellow-500 text-white">+62
                            896-6954-4044<br>(Febristi Medharsae)
                        </a>
                    </div>
                    <div class="flex">
                        <p class="mr-1 text-white">Email:</p>
                        <a href="mailto:support@pemirapolimedia.com" aria-label="Our email" title="Our email"
                            class="transition-colors duration-300 hover:text-yellow-500 text-white">support@pemirapolimedia.com</a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col-reverse justify-between pt-5 pb-10 border-t lg:flex-row">
                <p class="text-sm text-white">© Copyright 2021 PEMIRA POLIMEDIA. All rights reserved.</p>
                <ul class="flex flex-col mb-3 space-y-2 lg:mb-0 sm:space-y-0 sm:space-x-5 sm:flex-row">
                    <p class="text-white text-sm">Design By
                        Andika Pratama S.H & Haikal D.T</p>
                    <!-- <li>
                        <a href="/"
                            class="text-sm text-white transition-colors duration-300 hover:text-yellow-500">F.A.Q</a>
                    </li>
                    <li>
                        <a href="/"
                            class="text-sm text-white transition-colors duration-300 hover:text-yellow-500">Privacy
                            Policy</a>
                    </li>
                    <li>
                        <a href="/"
                            class="text-sm text-white transition-colors duration-300 hover:text-yellow-500">Terms &amp;
                            Conditions</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener("scroll", () => {
            if (window.pageYOffset > 300) {
                document.getElementById("tombolup")?.classList.remove('hidden');
            } else {
                document.getElementById("tombolup")?.classList.add('hidden');
            }
        });
    </script>
    <script>
        AOS.init();
    </script>
</body>

</html>