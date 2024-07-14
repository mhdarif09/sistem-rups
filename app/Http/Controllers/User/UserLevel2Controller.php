<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin1;

class UserLevel2Controller extends Controller
{
    public function index()
    {
        $admin1Data = Admin1::where('approved_by_user2', false)->get();
        return view('user.userlevel2.index', compact('admin1Data'));
    }

    public function approve($id)
    {
        $admin1 = Admin1::findOrFail($id);
        $admin1->update(['approved_by_user2' => true]);

        return redirect()->route('user.userlevel2.index')
            ->with('success', 'Data Arahan RUPS berhasil disetujui.');
    }

    public function edit($id)
    {
        $admin1 = Admin1::findOrFail($id);
        return view('user.userlevel2.edit', compact('admin1'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'Status' => 'required|string',
            'Keterangan' => 'nullable|string',
        ]);

        $admin1 = Admin1::findOrFail($id);
        $admin1->update($validatedData);

        return redirect()->route('user.userlevel2.index')
            ->with('success', 'Data Arahan RUPS berhasil diperbarui.');
    }
}
