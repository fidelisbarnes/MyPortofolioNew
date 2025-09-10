<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::orderBy('created_at', 'desc')->get();
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'tanggal_mulai' => 'nullable|date',
            'deadline' => 'nullable|date',
        ]);

        Todo::create([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'deadline' => $request->deadline,
        ]);

        return redirect()->route('todos.index')->with('success', 'Todo berhasil ditambahkan');
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'tanggal_mulai' => 'nullable|date',
            'deadline' => 'nullable|date',
        ]);

        $todo->update([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'deadline' => $request->deadline,
        ]);

        return redirect()->route('todos.index')->with('success', 'Todo berhasil diperbarui');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('todos.index')->with('success', 'ToDo berhasil dihapus');
    }
    public function toggle(Todo $todo)
    {
        $todo->selesai = !$todo->selesai; // toggle true/false
        if ($todo->selesai) {
            $todo->tanggal_selesai = now(); // otomatis isi tanggal selesai
        } else {
            $todo->tanggal_selesai = null; // reset kalau dibatalkan
        }
        $todo->save();

        return redirect()->route('todos.index')->with('success', 'Status todo diperbarui!');
    }



}
