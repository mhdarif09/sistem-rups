<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin1;

class Admin2Controller extends Controller
{
    public function index()
    {
        $admin1Data = Admin1::all();
        return view('admin.users.adminlevel2.index', compact('admin1Data'));
    }

    public function approve($id)
    {
        $admin1 = Admin1::findOrFail($id);
        $admin1->update(['approve' => true]);

        return redirect()->route('admin.adminlevel2.index')
            ->with('success', 'Data Arahan RUPS berhasil disetujui.');
    }

    public function edit($id)
    {
        $admin1 = Admin1::findOrFail($id);
        return view('admin.users.adminlevel2.edit', compact('admin1'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'Status' => 'required|string|in:Belum ditindak lanjut,Sudah ditindak lanjut',
            'Keterangan' => 'nullable|string',
            'Bukti' => 'nullable|string',
        ]);

        $admin1 = Admin1::findOrFail($id);
        $admin1->update($validatedData);

        return redirect()->route('admin.adminlevel2.index')
            ->with('success', 'Data Arahan RUPS berhasil diperbarui.');
    }
}
