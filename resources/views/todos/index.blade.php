@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
            <h4 class="mb-0">📝 Daftar Todo</h4>
            <a href="{{ route('todos.create') }}" class="btn btn-light btn-sm">
                <i class="bi bi-plus-circle"></i> Tambah Todo
            </a>
        </div>

        <div class="card-body p-0">
            <table class="table table-hover table-striped mb-0">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Judul</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Tanggal Ditambahkan</th>
                        <th>Tanggal Mulai</th>
                        <th>Deadline</th>
                        <th>Tanggal Selesai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center align-middle">
                    @forelse ($todos as $todo)
                    <tr>
                        <td>{{ $todo->judul }}</td>
                        <td>{{ $todo->keterangan }}</td>
                        <td>
                            <form action="{{ route('todos.toggle', $todo->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm {{ $todo->selesai ? 'btn-success' : 'btn-warning' }}">
                                    @if($todo->selesai)
                                        ✅ Selesai
                                    @else
                                        ⬜ Belum
                                    @endif
                                </button>
                            </form>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($todo->created_at)->format('d M Y') }}</td>
                        <td>{{ $todo->tanggal_mulai ?? '-' }}</td>
                        <td>{{ $todo->deadline ?? '-' }}</td>
                        <td>{{ $todo->tanggal_selesai ?? '-' }}</td>
                        <td>
                            <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus todo ini?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-muted">Belum ada todo</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
