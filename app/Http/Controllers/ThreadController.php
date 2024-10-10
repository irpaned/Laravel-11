<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    function tampil()
    {
        $data = Thread::get();
        //      nama folder.file
        return view('threads.tampil', compact('data'));
    }

    function tambah()
    {
        return view('threads.tambah');
    }

    function submit(Request $request)
    {
        $thread = new Thread();
        $thread->name = $request->name;
        $thread->quote = $request->quote;
        if ($request->hasFile('image')) {
            // Simpan file dan ambil path-nya
            $path = $request->file('image')->store('uploads', 'public');
            $thread->image = $path; // Simpan path di database
        }
        $thread->save();
        return redirect()->route('threads.tampil');
    }

    function edit($id)
    {
        $data = Thread::find($id);
        return view('threads.edit', compact('data'));
    }

    function update(Request $request, $id)
    {
        $thread = Thread::find($id);
        $thread->name = $request->name;
        $thread->quote = $request->quote;
        $thread->update();
        return redirect()->route('threads.tampil');
    }

    function delete($id)
    {
        $thread = Thread::find($id);
        $thread->delete();
        return redirect()->route('threads.tampil');
    }
}
