<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin1; // Assuming Admin1 model is used for simplicity

class Admin5Controller extends Controller
{
    public function index()
    {
        $admin1Data = Admin1::all();
        return view('admin.users.adminlevel5.index', compact('admin1Data'));
    }

    public function approve($id)
    {
        $admin1 = Admin1::findOrFail($id);
        $admin1->update(['approved' => true]); // Assuming an 'approved' field exists

        return redirect()->route('admin.adminlevel5.index')
            ->with('success', 'Data Arahan RUPS berhasil disetujui.');
    }

    public function markComplete($id)
    {
        $admin1 = Admin1::findOrFail($id);
        $admin1->update(['status' => 'completed']); // Assuming a 'status' field exists

        // Notify admin level 1
        // You can implement your notification logic here

        return redirect()->route('admin.adminlevel5.index')
            ->with('success', 'Data Arahan RUPS berhasil diselesaikan dan admin level 1 telah diberi notifikasi.');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'Keterangan' => 'nullable|string',
        ]);

        $admin1 = Admin1::findOrFail($id);
        $admin1->update($validatedData);

        return redirect()->route('admin.adminlevel5.index')
            ->with('success', 'Data Arahan RUPS berhasil diperbarui.');
    }
}
