<?php

namespace App\Http\Controllers;

use App\Models\{Staff, Job};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    /**
     * Tampilkan daftar staff
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        // Superadmin bisa lihat semua, admin hanya data yang dia input
        if ($user->isSuperAdmin()) {
            $query = Staff::query();
        } else {
            $query = Staff::where('user', $user->name);
        }

        // Search filter
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Ambil data dengan pagination
        $staff = $query->latest()->paginate(10);

        return view('staff_vac.index', compact('staff'));
    }

    /**
     * Form tambah staff
     */
    public function create()
    {
        $jobs = Job::all();
        return view('staff_vac.create', compact('jobs'));
    }

    /**
     * Simpan data baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:100',
            'nip'       => 'required|string|max:50',
            'id_num'    => 'required|string|max:100',
            'address'   => 'required|string',
            'faskes'    => 'required|string|max:150',
            'jobs'      => 'required|string|max:100',
            'var_dos12' => 'nullable|date',
            'var_dos3'  => 'nullable|date',
            'var_dos4'  => 'nullable|date',
        ]);

        $validated['user'] = Auth::user()->name ?? 'Unknown';

        Staff::create($validated);

        return redirect()->route('staff_vac.index')
                         ->with('success', 'Data staff berhasil disimpan!');
    }

    /**
     * Detail staff
     */
    public function show(Staff $staff_vac)
    {
        return view('staff_vac.show', ['staff' => $staff_vac]);
    }

    /**
     * Form edit staff
     */
    public function edit(Staff $staff_vac)
    {
        $jobs = Job::all();
        return view('staff_vac.edit', [
            'staff' => $staff_vac,
            'jobs'  => $jobs
        ]);
    }

    /**
     * Update data staff
     */
    public function update(Request $request, Staff $staff_vac)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:100',
            'nip'       => 'required|string|max:50',
            'id_num'    => 'required|string|max:100',
            'address'   => 'required|string',
            'faskes'    => 'required|string|max:150',
            'jobs'      => 'required|string|max:100',
            'var_dos12' => 'nullable|date',
            'var_dos3'  => 'nullable|date',
            'var_dos4'  => 'nullable|date',
        ]);

        $staff_vac->update($validated);

        return redirect()->route('staff_vac.index')
                         ->with('success', 'Data staff berhasil diupdate!');
    }

    /**
     * Hapus data staff
     */
    public function destroy(Staff $staff_vac)
    {
        $staff_vac->delete();
        return redirect()->route('staff_vac.index')
                         ->with('success', 'Data staff berhasil dihapus!');
    }
}
