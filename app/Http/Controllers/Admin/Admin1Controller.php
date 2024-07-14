<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; // Import the base Controller class
use Illuminate\Http\Request;
use App\Models\Admin1; // Make sure you use the correct namespace for the Admin1 model

class Admin1Controller extends Controller
{
    public function index()
    {
        $admin1Data = Admin1::all();
        return view('admin.users.adminlevel1.index', compact('admin1Data'));
    }

    public function create()
    {
        return view('admin.users.adminlevel1.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Arahan' => 'required|string',
            'PIC' => 'required|string',
            'Hasil_tindak_lanjut' => 'nullable|string',
            'Status' => 'required|string|in:Belum ditindak lanjut,Sudah ditindak lanjut',
            'Keterangan' => 'nullable|string',
            'Bukti' => 'nullable|string',
        ]);

        Admin1::create($validatedData);

        return redirect()->route('admin.adminlevel1.index')
            ->with('success', 'Data Arahan RUPS berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $admin1 = Admin1::findOrFail($id);
        return view('admin.users.adminlevel1.edit', compact('admin1'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'Arahan' => 'required|string',
            'PIC' => 'required|string',
            'Hasil_tindak_lanjut' => 'nullable|string',
            'Status' => 'required|string|in:Belum ditindak lanjut,Sudah ditindak lanjut',
            'Keterangan' => 'nullable|string',
            'Bukti' => 'nullable|string',
        ]);

        $admin1 = Admin1::findOrFail($id);
        $admin1->update($validatedData);

        return redirect()->route('admin.adminlevel1.index')
            ->with('success', 'Data Arahan RUPS berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $admin1 = Admin1::findOrFail($id);
        $admin1->delete();

        return redirect()->route('admin.adminlevel1.index')
            ->with('success', 'Data Arahan RUPS berhasil dihapus.');
    }
}
