@extends('layouts.frontend')
@section('title', 'Selamat Datang')
@section('content')
    <!-- HOME -->
    <section class="home-section section-hero overlay bg-image"
        style="background-image: url('{{ asset('frontend/images/hero_1.jpg') }}');" id="home-section">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class=" text-center">
                        <h1 class="text-white font-weight-bold">Pelayanan Publik DPRD Kota Tegal</h1>
                        <p>Terwujudnya pemerintah yang berdedikasi menuju kota tegal yang <b>bersih</b>, <b>demokratif</b>,
                            <b>disiplin</b>, dan <b>inovatif</b>.
                        </p>
                    </div>

                </div>
            </div>
        </div>

        <a href="#next" class="scroll-button smoothscroll">
            <span class=" icon-keyboard_arrow_down"></span>
        </a>

    </section>

    {{-- KONTAK --}}
    <section class="py-5 bg-image overlay-primary fixed overlay" id="next"
        style="background-image: url('{{ asset('frontend/images/hero_1.jpg') }}');">
        <div class="container" id="kontak">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2 text-white">Hubungi Kami</h2>
                    <p class="lead text-white">Informasi lebih lanjut hubungi kontak kami..</p>
                </div>
            </div>
            <div class="row align-items-center justify-content-center text-white">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-contact-info d-flex align-items-center">
                        <div class="contact-icon mr-30">
                            <img src="{{ asset('frontend/img/icons/alarm-clock.png') }}" alt="">
                        </div>
                        <div class="contact-meta">
                            <p>senin - jumaat 07:30 - 16:30 <br> sabtu & minggu - tutup</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-contact-info d-flex align-items-center">
                        <div class="contact-icon mr-30">
                            <img src="{{ asset('frontend/img/icons/envelope.png') }}" alt="">
                        </div>
                        <div class="contact-meta">
                            <p> (0283) 321505 <br> dprd@tegalkota.go.id</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-contact-info d-flex align-items-center">
                        <div class="contact-icon mr-30">
                            <img src="{{ asset('frontend/img/icons/map-pin.png') }}" alt="">
                        </div>
                        <div class="contact-meta">
                            <p> Jl. Pemuda No.4, Tegalsari, Kec. Tegal Bar., Kota Tegal, Jawa Tengah</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- KARIR --}}
    <section class="site-section" id="karir">
        <div class="container">

            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2">Informasi Karir </h2>
                    <p>Menyediakan informasi lowongan karir dan praktek kerja magang.</p>
                </div>
            </div>

            <ul class="job-listings mb-5">
                @foreach ($karir as $row)
                    <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                        <a href="{{ '/karir/' . $row->slug }}"></a>
                        <div class="job-listing-logo">
                            <img src="{{ asset('frontend/images/' . ($row->jenis == 'LOWONGAN' ? 'lowongan.jpg' : 'magang.jpg')) }}"
                                alt="" class="img-fluid">
                        </div>

                        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                <h2>{{ $row->judul }}</h2>
                                <strong>{{ $row->jenis }}</strong>
                            </div>
                            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                <i class="fa-solid fa-calendar-xmark text-danger mr-2"></i>
                                {{ \Carbon\Carbon::parse($row->tanggal_akhir)->locale('id')->translatedFormat('l, d F Y') }}
                            </div>
                            <div class="job-listing-meta">
                                <span class="badge badge-{{ $row->status == 'OPEN' ? 'success' : 'danger' }}">
                                    {{ $row->status }}
                                </span>
                            </div>
                        </div>

                    </li>
                @endforeach
            </ul>

            <div class="row pagination-wrap">
                <div class="col-md-6 text-center text-md-left mb-4 mb-md-0">
                    <span>
                        Showing {{ $karir->firstItem() }}-{{ $karir->lastItem() }} of {{ $karir->total() }} Jobs
                    </span>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="custom-pagination ml-auto">
                        @if ($karir->onFirstPage())
                            <span class="prev disabled">Prev</span>
                        @else
                            <a href="{{ $karir->previousPageUrl() }}" class="prev">Prev</a>
                        @endif

                        <div class="d-inline-block">
                            @foreach ($karir->getUrlRange(1, $karir->lastPage()) as $page => $url)
                                @if ($page == $karir->currentPage())
                                    <a href="#" class="active">{{ $page }}</a>
                                @else
                                    <a href="{{ $url }}">{{ $page }}</a>
                                @endif
                            @endforeach
                        </div>

                        @if ($karir->hasMorePages())
                            <a href="{{ $karir->nextPageUrl() }}" class="next">Next</a>
                        @else
                            <span class="next disabled">Next</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- VIAI MIAI --}}
    <section class="py-5" id="visi_misi">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                class="icon-align-left mr-3"></span>VISI KOTA TEGAL</h3>
                        <p>Terwujudnya Pemerintahan yang Berdedikasi Menuju Kota Tegal yang Bersih, Demokratis, Disiplin dan
                            Inovatif </p>
                    </div>
                    <div class="mb-5">
                        <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                class="icon-align-left mr-3"></span>MISI KOTA TEGAL</h3>
                        <ul class="list-unstyled m-0 p-0">
                            <li class="d-flex align-items-start mb-2"><span
                                    class="icon-check_circle mr-2 text-muted"></span><span> Mewujudkan Pemerintahan yang
                                    Bersih, Profesional, Akuntabel, Berwibawah dan Inovatif, Berbasis Teknologi
                                    Informasi</span></li>
                            <li class="d-flex align-items-start mb-2"><span
                                    class="icon-check_circle mr-2 text-muted"></span><span> Menciptakan atmosfir kehidupan
                                    Kota Tegal yang lebih agamis, aman, kreatif, berbudaya, demokrasi, Melindungi hak-hak
                                    anak dan perempuan untuk kesetaraan serta keadilan gender</span></li>
                            <li class="d-flex align-items-start mb-2"><span
                                    class="icon-check_circle mr-2 text-muted"></span><span> Meningkatkan pembangunan
                                    dibidang pendidikan, kesehatan, kesahteraan pekerja dan masyarakat tidak mampu</span>
                            </li>
                            <li class="d-flex align-items-start mb-2"><span
                                    class="icon-check_circle mr-2 text-muted"></span><span> Meningkatkan infrastruktur,
                                    transportasi publik, lingkungan hidup yang bersih dan sehat serta pembangunan
                                    berkelanjutan yang berorientasi pada energi terbarukan</span></li>
                            <li class="d-flex align-items-start mb-2"><span
                                    class="icon-check_circle mr-2 text-muted"></span><span> Meningkatkan Kepariwisataan,
                                    investasi dan daya saing daerah serta mengembangkan ekonomi kerakyatan dan Ekonomi
                                    Kreatif </span></li>
                            <li class="d-flex align-items-start mb-2"><span
                                    class="icon-check_circle mr-2 text-muted"></span><span> Mengoptimalkan peran pemuda,
                                    pembinaan olah raga dan seni buday </span></li>
                        </ul>
                    </div>


                </div>
                <div class="col-lg-4">
                    <div class="bg-light p-3 border rounded">
                        <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Media Sosial</h3>
                        <div class="px-3">
                            <a href="https://www.facebook.com/profile.php?id=100090255246539&mibextid=fToiWhWJ2YtxSTUw"
                                target="blank" class="pt-3 pb-3 pr-3 pl-0"><i class="fa-brands fa-facebook"></i></a>
                            <a href="https://www.instagram.com/dprdkotategal?igsh=bXA5ZmMzc2NpeWFl" target="blank"
                                class="pt-3 pb-3 pr-3 pl-0"><i class="fa-brands fa-instagram"></i></a>
                            <a href="https://www.tiktok.com/@dprdkotategal?_t=8sDRpIRLhou&_r=1"
                                class="pt-3 pb-3 pr-3 pl-0" target="blank"><i class="fa-brands fa-tiktok"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>

    {{-- SEKERTARIAT --}}
    <section class="site-section services-section bg-light block__62849" id="">
        <div class="container" id="sekertariat">

            <div class="row justify-content-center text-center mb-5">
                <div class="col-12">
                    <h2 class="section-title mb-2">- Sekretariat DPRD dan komisi komisi -</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-md-6 col-lg-4 mb-4 mb-lg-5">
                    <a class="block__16443 text-center d-block">
                        <span class="custom-icon mx-auto" style="display: flex; justify-content: center; align-items: center; ">
                            <i class="fa-solid text-black fa-brands fa-twitter"></i>
                        </span>
                        
                        <h3>Bagian Umum dan Kepegawaian</h3>
                        <p>Mengelola administrasi kepegawaian, sarana prasarana, dan urusan umum lainnya.</p>
                    </a>
                </div>
                <div class="col-6 col-md-6 col-lg-4 mb-4 mb-lg-5">
                    <a class="block__16443 text-center d-block">
                       <span class="custom-icon mx-auto" style="display: flex; justify-content: center; align-items: center; ">
                            <i class="fa-solid text-black fa-house"></i>
                        </span>
                        <h3>Bagian keuangan</h3>
                        <p>Mengelola anggaran, keuangan, dan pertanggungjawaban penggunaan dana DPRD.</p>
                    </a>
                </div>
                <div class="col-6 col-md-6 col-lg-4 mb-4 mb-lg-5">
                    <a class="block__16443 text-center d-block">
                       <span class="custom-icon mx-auto" style="display: flex; justify-content: center; align-items: center; ">
                            <i class="fa-solid text-black fa-house"></i>
                        </span>
                        <h3>Bagian Persidangan dan Perundang-undangan</h3>
                        <p>Mendukung kegiatan sidang, pembuatan peraturan, serta dokumentasi hukum.</p>
                    </a>
                </div>
                <div class="col-6 col-md-6 col-lg-4 mb-4 mb-lg-5">
                    <a class="block__16443 text-center d-block">
                       <span class="custom-icon mx-auto" style="display: flex; justify-content: center; align-items: center; ">
                            <i class="fa-solid text-black fa-house"></i>
                        </span>
                        <h3>Komisi I</h3>
                        <p>Bidang Pemerintahan.</p>
                    </a>
                </div>
                <div class="col-6 col-md-6 col-lg-4 mb-4 mb-lg-5">
                    <a class="block__16443 text-center d-block">
                       <span class="custom-icon mx-auto" style="display: flex; justify-content: center; align-items: center; ">
                            <i class="fa-solid text-black fa-house"></i>
                        </span>
                        <h3>Komisi II</h3>
                        <p>Bidang Perekonomian dan Keuangan.</p>
                    </a>
                </div>
                <div class="col-6 col-md-6 col-lg-4 mb-4 mb-lg-5">
                    <a class="block__16443 text-center d-block">
                       <span class="custom-icon mx-auto" style="display: flex; justify-content: center; align-items: center; ">
                            <i class="fa-solid text-black fa-house"></i>
                        </span>
                        <h3>Komisi III</h3>
                        <p>Bidang Pembangunan dan Bidang Kesejahteraan Rakyat.</p>
                    </a>
                </div>

            </div>
        </div>
    </section>


    {{-- BERITA --}}
    <section class="site-section" id="berita">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-12">
                    <h2 class="section-title mb-2">- Berita Terkini -</h2>
                </div>
            </div>
            <div class="row mb-5">
                @foreach ($berita as $row)
                    <div class="col-md-6 col-lg-4 mb-5">
                        <a href="/post/{{ $row->slug }}"><img src="{{ asset('storage/' . $row->gambar) }}"
                                alt="Image" class="img-fluid rounded mb-4"></a>
                        <h3><a href="/post/{{ $row->slug }}" class="text-black">{{ $row->judul }}</a></h3>
                        <div> {{ \Carbon\Carbon::parse($row->created_at)->locale('id')->translatedFormat('l, d F Y') }}
                            <span class="mx-2">|</span> <a>{{ $row->user->name }}</a>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="row pagination-wrap">
                <div class="col-md-6 text-center text-md-left mb-4 mb-md-0">
                    <span>
                        Showing {{ $berita->firstItem() }}-{{ $berita->lastItem() }} of {{ $berita->total() }} Jobs
                    </span>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="custom-pagination ml-auto">
                        @if ($berita->onFirstPage())
                            <span class="prev disabled">Prev</span>
                        @else
                            <a href="{{ $berita->previousPageUrl() }}" class="prev">Prev</a>
                        @endif

                        <div class="d-inline-block">
                            @foreach ($berita->getUrlRange(1, $berita->lastPage()) as $page => $url)
                                @if ($page == $berita->currentPage())
                                    <a href="#" class="active">{{ $page }}</a>
                                @else
                                    <a href="{{ $url }}">{{ $page }}</a>
                                @endif
                            @endforeach
                        </div>

                        @if ($berita->hasMorePages())
                            <a href="{{ $berita->nextPageUrl() }}" class="next">Next</a>
                        @else
                            <span class="next disabled">Next</span>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- STRUKTUT --}}
    <section class="site-section" id="struktur">
        <div class="container">
            <div class="row">
                @foreach ($struktur as $row)
                    <div class="col-12 item">
                        <a href="{{ asset('storage/' . $row->gambar_struktur) }}" class="item-wrap fancybox"
                            data-fancybox="gallery2">
                            <span class="icon-search2"></span>
                            <img class="img-fluid" src="{{ asset('storage/' . $row->gambar_struktur) }}">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
