@extends('layouts.app')

@section('title', 'Struktur Anggota')

@push('style')
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Struktur Anggota</h1>
            </div>
            <div class="col-12">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
            </div>
            <div class="card">
                <div class="p-4">
                    <a href="{{ route('struktur.create') }}"
                        class="btn btn-primary {{ $struktur->count() == 1 ? 'disabled' : '' }}">Tambah Struktur Anggota</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table-striped table-md table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Struktur</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($struktur as $struktur)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset('storage/' . $struktur->gambar_struktur) }}" width="100"
                                                class="rounded"></td>
                                        <td>
                                            <a href="{{ route('struktur.edit', $struktur) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
