<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin1; // Assuming Admin1 model is used for simplicity

class UserLevel3Controller extends Controller
{
    public function index()
    {
        $admin1Data = Admin1::all();
        return view('user.userlevel3.index', compact('admin1Data'));
    }

    public function edit($id)
    {
        $admin1 = Admin1::findOrFail($id);
        return view('user.userlevel3.edit', compact('admin1'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'Hasil_tindak_lanjut' => 'nullable|string',
            'Bukti' => 'nullable|string',
        ]);

        $admin1 = Admin1::findOrFail($id);
        $admin1->update($validatedData);

        return redirect()->route('user.userlevel3.index')
            ->with('success', 'Data Arahan RUPS berhasil diperbarui.');
    }

    public function approve($id)
    {
        $admin1 = Admin1::findOrFail($id);
        $admin1->update(['approved_by_user3' => true]); // Assuming an 'approved_by_user3' field exists

        return redirect()->route('user.userlevel3.index')
            ->with('success', 'Data Arahan RUPS berhasil disetujui.');
    }
}
