@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-success text-white">
        <h4>➕ Tambah Todo</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('todos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" name="judul" id="judul" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control">
            </div>

            <div class="mb-3">
                <label for="deadline" class="form-label">Deadline</label>
                <input type="date" name="deadline" id="deadline" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('todos.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
