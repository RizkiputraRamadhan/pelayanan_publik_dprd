@extends('layouts.app')

@section('title', 'Struktur Anggota')


@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/codemirror/lib/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('library/codemirror/theme/duotone-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Struktur Anggota</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Struktur Anggota</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('struktur.update', $struktur->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Gambar -->
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="file" name="gambar"
                                            class="form-control @error('gambar') is-invalid @enderror" id="gambar-input">
                                        @error('gambar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <!-- Tempat untuk pratinjau gambar -->
                                        <img id="gambar-preview" src="{{ asset('storage/' . $struktur->gambar_struktur) }}" alt="Preview Gambar"
                                            class="img-fluid mt-3 rounded" style="max-height: 150px;">
                                    </div>
                                </div>


                                <!-- Tombol Publish -->
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button type="submit" class="btn btn-primary">Publish</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/codemirror/lib/codemirror.js') }}"></script>
    <script src="{{ asset('library/codemirror/mode/javascript/javascript.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <script>
        document.getElementById('gambar-input').addEventListener('change', function(event) {
            const input = event.target;
            const preview = document.getElementById('gambar-preview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('d-none'); // Tampilkan gambar
                };
                reader.readAsDataURL(input.files[0]); // Membaca file sebagai DataURL
            } else {
                preview.src = '#';
                preview.classList.add('d-none'); // Sembunyikan gambar jika tidak ada file
            }
        });
    </script>
@endpush
