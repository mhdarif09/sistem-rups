<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin1; // Assuming you're using the Admin1 model

class UserLevel1Controller extends Controller
{
    public function index()
    {
        $admin1Data = Admin1::all();
        return view('user.userlevel1.index', compact('admin1Data'));
    }

    public function edit($id)
    {
        $admin1 = Admin1::findOrFail($id);
        return view('user.userlevel1.edit', compact('admin1'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'Hasil_tindak_lanjut' => 'nullable|string',
            'Status' => 'required|string|in:Belum ditindak lanjut,Sudah ditindak lanjut',
            'Keterangan' => 'nullable|string',
            'Bukti' => 'nullable|string',
        ]);

        $admin1 = Admin1::findOrFail($id);
        $admin1->update($validatedData);

        return redirect()->route('user.userlevel1.index')
            ->with('success', 'Data Arahan RUPS berhasil diperbarui.');
    }
}
