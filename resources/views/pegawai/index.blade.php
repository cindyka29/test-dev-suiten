@extends('layouts.app')

@section('title', 'Daftar Pegawai')
@section('page-title', 'Master Data')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Daftar Pegawai</h5>
    <div class="dropdown">
        <button class="btn btn-light border dropdown-toggle" type="button" data-bs-toggle="dropdown">
            Filter by:
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Semua</a></li>
            <li><a class="dropdown-item" href="#">Bagian</a></li>
            <li><a class="dropdown-item" href="#">Shift</a></li>
            <li><a class="dropdown-item" href="#">Bank</a></li>
        </ul>
    </div>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Bagian</th>
                    <th>Nomor Telepon</th>
                    <th>Nama Rekening</th>
                    <th>Bank</th>
                    <th>Shift</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pegawais as $p)
                    <tr>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->bagian }}</td>
                        <td>{{ $p->nomor_telepon }}</td>
                        <td>{{ $p->nama_rekening }}</td>
                        <td>{{ $p->bank }}</td>
                        <td>{{ $p->shift }}</td>
                        <td>
                            <a href="{{ route('pegawai.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <!-- Tombol Hapus Modal -->
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $p->id }}">
                                Hapus
                            </button>

                            <!-- Modal Konfirmasi Hapus -->
                            <div class="modal fade" id="deleteModal{{ $p->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $p->id }}" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel{{ $p->id }}">Konfirmasi Hapus</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    Yakin untuk menghapus data <strong>{{ $p->nama }}</strong>?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                    <form action="{{ route('pegawai.destroy', $p->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Iya</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="table-empty">
                            <i class="bi bi-file-earmark-x"></i>
                            <div>Data belum tersedia.</div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end px-3">
        {{ $pegawais->links() }}
    </div>
</div>
@endsection
