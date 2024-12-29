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


    <section class="site-section">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="d-flex align-items-center">
                        <div class="border p-2 d-inline-block mr-3 rounded">
                            <img src="{{ asset('frontend/images/' . ($postDetail->jenis == 'LOWONGAN' ? 'lowongan.jpg' : 'magang.jpg')) }}"
                                alt="Image" width="50">
                        </div>
                        <div>
                            <h2>{{ $postDetail->judul }}</h2>
                            <div>
                                <span class="ml-0 mr-2 mb-2"><span
                                        class="icon-briefcase mr-2"></span>{{ $postDetail->jenis }}</span>
                                <span class="m-2"><span class="icon-clock-o mr-2"></span><span class="text-primary">
                                        {{ \Carbon\Carbon::parse($postDetail->tanggal_akhir)->locale('id')->translatedFormat('l, d F Y') }}</span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-6">
                            <a href="#"
                                class="btn btn-block text-white btn-{{ $postDetail->status == 'OPEN' ? 'success' : 'danger' }} btn-md">{{ $postDetail->status }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                class="icon-align-left mr-3"></span>Description</h3>
                        <p>{!! $postDetail->deskripsi !!}</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="bg-light p-3 border rounded mb-4">
                        <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Informasi Lanjutan</h3>
                        <ul class="list-unstyled pl-3 mb-0">
                            <li class="mb-2"><strong class="text-black">Status : </strong> {{ $postDetail->status }}</li>
                            <li class="mb-2"><strong class="text-black">Jenis : </strong> {{ $postDetail->jenis }}</li>
                            <li class="mb-2"><strong class="text-black">Dibuat : </strong>
                                {{ \Carbon\Carbon::parse($postDetail->tanggal_akhir)->locale('id')->translatedFormat('l, d F Y') }}
                            </li>
                            <li class="mb-2"><strong class="text-black">Diperbarui : </strong>
                                {{ \Carbon\Carbon::parse($postDetail->updated_at)->locale('id')->translatedFormat('l, d F Y') }}
                            </li>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="site-section">
        <div class="container">
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

@endsection
