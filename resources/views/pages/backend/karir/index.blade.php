@extends('layouts.app')

@section('title', 'Karir')

@push('style')
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Karir</h1>
            </div>
            <div class="col-12">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
            </div>
            <div class="card">
                <div class="p-4">
                    <a href="{{ route('karir.create') }}" class="btn btn-primary">Tambah Karir</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table-striped table-md table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Judul</th>
                                    <th>Tanggal Akhir</th>
                                    <th>Jenis</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($karirs as $karir)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $karir->judul }}</td>
                                        <td>{{ \Carbon\Carbon::parse($karir->tanggal_akhir)->locale('id')->translatedFormat('l, d F Y') }}</td>
                                        <td>{{ $karir->jenis }}</td>
                                        <td>{{ $karir->status }}</td>
                                        <td>
                                            <a href="{{ route('karir.edit', $karir) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('karir.destroy', $karir) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <nav class="d-inline-block">
                        {{ $karirs->links() }}
                    </nav>
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
