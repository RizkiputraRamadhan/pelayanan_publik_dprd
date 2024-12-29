@extends('layouts.frontend')
@section('title', 'Selamat Datang')
@section('content')
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image"
        style="background-image: url('{{ asset('frontend/images/hero_1.jpg') }}');" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="custom-breadcrumbs mb-0">
                        <span class="slash">Posted by</span> <span
                            class="text-white">{{ $postDetail->user->name }}</span></a>
                        <span class="mx-2 slash">&bullet;</span>
                        <span
                            class="text-white"><strong>{{ \Carbon\Carbon::parse($postDetail->created_at)->locale('id')->translatedFormat('l, d F Y') }}</strong></span>
                    </div>
                    <h1 class="text-white">{{ $postDetail->judul }}</h1>


                </div>
            </div>
        </div>
    </section>

    <section class="site-section" id="next-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 blog-content">
                    <p><img src="{{ asset('storage/' . $postDetail->gambar) }}" alt="Image" class="img-fluid rounded">
                    </p>
                    <p>{!! $postDetail->konten !!}</p>
                </div>
                <div class="col-lg-4 sidebar pl-lg-">
                    @foreach ($berita as $row)
                        <div class="sidebar-box">
                            <img src="{{ asset('storage/' . $row->gambar) }}" alt="Image placeholder"
                                class="img-fluid mb-4 w-100">
                            <h3>{{ $row->judul }}</h3>
                            <p><a href="/post/{{ $row->slug }}" class="btn btn-primary btn-sm">Lihat Selengkapnya</a></p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
