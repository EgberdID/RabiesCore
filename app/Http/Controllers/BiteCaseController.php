<?php

namespace App\Http\Controllers;

use App\Models\{BiteCase, District, SubDis, Village, Job};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\AlertEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class BiteCaseController extends Controller
{
    // 📌 Tampilkan semua kasus
    public function index(Request $request)
    {
        $user = Auth::user();

        // Base query
        if ($user->isSuperAdmin()) {
            // Superadmin bisa lihat semua kasus
            $query = BiteCase::with(['district', 'subDis', 'village']);
        } else {
            // Admin biasa hanya bisa lihat kasus yang dia input sendiri
            $query = BiteCase::with(['district', 'subDis', 'village'])
                        ->where('user', $user->name);
        }

        // // Filter status jika ada
        // if ($request->filled('status_filter')) {
        //     $query->where('status', $request->status_filter);
        // }
         // Search nama saja
        if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }
        $biteCases = $query->paginate(10)->appends($request->query());
        //$biteCases = $query->get();

        return view('bite_cases.index', compact('biteCases'));
    }


    // 📌 Form create
    public function create()
    {
        $districts = District::all();
        $jobs = Job::all();
        return view('bite_cases.create', compact('districts', 'jobs'));
    }

    // 📌 Simpan data baru
//     public function store(Request $request)
// {//dd($request->all());
//     //dd(Auth::user());
//     if ($request->has('same_as_patient')) {
//         $request->merge([
//             'district_id' => $request->pas_dis_id,
//             'sub_dis_id'  => $request->pas_subdis_id,
//         ]);
//     }

//     $validated = $request->validate([
//         'name'        => 'required|string|max:100',
//         'id_num'      => 'required|string|max:50|unique:bite_cases,id_num',
//         'medrec_no'   => 'required|string|max:50',
//         'address'     => 'required|string',
//         'pas_dis_id'  => 'required|exists:district,id',
//         'pas_subdis_id' => 'required|exists:sub_dis,id',
//         'job'         => 'required|string|max:100',
//         'age'         => 'required|integer|min:0|max:120',
//         'phone'       => 'required|string|max:30',

//         'case_day'    => 'required|date',
//         'case_time'   => 'required|date_format:H:i',

//         'district_id' => 'required|exists:district,id',
//         'sub_dis_id'  => 'required|exists:sub_dis,id',
//         'village_id'  => 'nullable|exists:villages,id',

//         'animal_type' => 'required|string|max:30',
//         'animal_stat' => 'required|string|max:30',
//         'animal_con'  => 'required|string|max:30',

//         'bite_mark'   => 'nullable|array',
//         'bite_coun'   => 'required|string|max:30',
//         'wound_ide'   => 'required|string|max:30',
//         'exp_cat'     => 'required|string|max:150',

//         'inj_wash'    => 'nullable|string|max:30',
//         'var_dos12'   => 'nullable|date',
//         'var_dos3'    => 'nullable|date',
//         'var_dos4'    => 'nullable|date',

//         'req'         => 'nullable|string|max:30',
//         'inj_loc'     => 'nullable|string|max:100',

//         'his_vac'     => 'nullable|string|max:30',
//         'y_va'        => 'nullable|date',
//         'treatment'    => 'nullable|string|max:50',
//         'notes'        => 'nullable|string',
//         'user'        => 'nullable|string',
//         'status'        => 'nullable|string',
//     ]);

//     if (isset($validated['bite_mark'])) {
//     $validated['bite_mark'] = implode(', ', $validated['bite_mark']);
// }
// if ($validated->fails()) {
//     dd($validated->errors());
// }

// BiteCase::create($validated);

// // Redirect setelah sukses
// return redirect()->route('bite_cases.index')
//                  ->with('success', 'Kasus gigitan berhasil disimpan!');
// }
public function store(Request $request)
{
    if ($request->has('same_as_patient')) {
        $request->merge([
            'district_id' => $request->input('pas_dis_id'),
            'sub_dis_id'  => $request->input('pas_subdis_id'),
        ]);
    }

    // Normalisasi village_id kosong → null
    if ($request->input('village_id') === '') {
        $request->merge(['village_id' => null]);
    }

    $validated = $request->validate([
        'name'          => 'required|string|max:100',
        'id_num'        => 'required|string|max:50|unique:bite_cases,id_num',
        'address'       => 'required|string',
        'pas_dis_id'    => 'required|exists:district,id',
        'pas_subdis_id' => 'required|exists:sub_dis,id',
        'job'           => 'required|string|max:100',
        'age'           => 'required|integer|min:0|max:120',
        'phone'         => 'required|string|max:30',

        'case_day'    => 'required|date',
        'case_time'   => 'required|date_format:H:i',

        'district_id' => 'required|exists:district,id',
        'sub_dis_id'  => 'required|exists:sub_dis,id',
        'village_id'  => 'sometimes|nullable|exists:villages,id',

        'animal_type' => 'required|string|max:30',
        'animal_stat' => 'required|string|max:30',
        'animal_con'  => 'required|string|max:30',

        'bite_mark'   => 'nullable|array',
        'bite_coun'   => 'required|string|max:30',
        'wound_ide'   => 'required|string|max:30',
        'exp_cat'     => 'required|string|max:150',

        'inj_wash'    => 'nullable|string|max:30',
        'var_dos12'   => 'nullable|date',
        'var_dos3'    => 'nullable|date',
        'var_dos4'    => 'nullable|date',

        'req'         => 'nullable|string|max:30',
        'inj_loc'     => 'nullable|string|max:100',

        'his_vac'     => 'nullable|string|max:30',
        'y_va'        => 'nullable|date',
        'treatment'   => 'nullable|string|max:50',
        'notes'       => 'nullable|string',

        'user'   => 'nullable|string',
        'status' => 'nullable|string',
    ]);

    if (isset($validated['bite_mark'])) {
        $validated['bite_mark'] = implode(', ', $validated['bite_mark']);
    }

    $validated['user'] = Auth::user()->name ?? 'Unknown';

    BiteCase::create($validated);

    return redirect()->route('bite_cases.index')
                     ->with('success', 'Kasus gigitan berhasil disimpan!');
}





    // 📌 Tampilkan detail
    public function show(BiteCase $biteCase)
    {
        return view('bite_cases.show', compact('biteCase'));
    }

    // 📌 Form edit
    public function edit(BiteCase $biteCase)
    {
        $districts = District::all();
        $jobs = Job::all();
         $subdis = SubDis::where('district_id', $biteCase->pas_dis_id)->get();
         $subdis = SubDis::where('district_id', $biteCase->pas_dis_id)->get();
         $villages = Village::where('subdis_id', $biteCase->sub_dis_id)->get();
        return view('bite_cases.edit', compact('biteCase', 'districts', 'jobs', 'subdis', 'villages'));
    }

    // 📌 Update data
   public function update(Request $request, BiteCase $biteCase)
    { 
    $validated = $request->validate([
        'name'        => 'nullable|string|max:100',
        'id_num'      => 'nullable|string|max:50|unique:bite_cases,id_num,' . $biteCase->id,
        'address'     => 'nullable|string',
        'pas_dis_id'    => 'required_unless:same_as_patient,on|exists:district,id',
        'pas_subdis_id' => 'required_unless:same_as_patient,on|exists:sub_dis,id',
        'job'         => 'nullable|string|max:100',
        'age'         => 'nullable|integer|min:0|max:120',
        'phone'       => 'nullable|string|max:30',

        'case_day'    => 'nullable|date',
        'case_time'   => 'nullable|date_format:H:i',

        'district_id' => 'nullable|exists:district,id',
        'sub_dis_id'  => 'nullable|exists:sub_dis,id',
        'village_id'  => 'nullable|exists:villages,id',

        'animal_type' => 'required|string|max:30',
        'animal_stat' => 'required|string|max:30',
        'animal_con'  => 'required|string|max:30',

        'bite_mark'   => 'nullable|array',
        'bite_coun'   => 'nullable|string|max:30',
        'wound_ide'   => 'nullable|string|max:30',
        'exp_cat'     => 'nullable|string|max:150',

        'inj_wash'    => 'nullable|string|max:30',
        'var_dos12'   => 'nullable|date',
        'var_dos3'    => 'nullable|date',
        'var_dos4'    => 'nullable|date',

        'req'         => 'nullable|string|max:30',
        'inj_loc'     => 'nullable|string|max:100',

        'his_vac'     => 'nullable|string|max:30',
        'y_va'        => 'nullable|date',
        'treatment'   => 'nullable|string|max:50',
        'notes'       => 'nullable|string',
        'user'       => 'nullable|string',
        'status'       => 'nullable|string',
    ]);

    // Checkbox bite_mark
    if ($request->has('bite_mark')) {
        $validated['bite_mark'] = implode(', ', $request->bite_mark);
    } else {
        $validated['bite_mark'] = null;
    }

    $biteCase->update($validated);

    return redirect()->route('bite_cases.index')
                     ->with('success', 'Kasus gigitan berhasil diupdate!');
}


    // 📌 Hapus
    public function destroy(BiteCase $biteCase)
    {
        $biteCase->delete();
        return redirect()->route('bite_cases.index')
                         ->with('success', 'Kasus gigitan berhasil dihapus!');
    }

    // 📌 Ambil kelurahan berdasarkan kecamatan (AJAX)
    public function getSubdis($district_id)
    {
        $subdis = SubDis::where('district_id', $district_id)->get();
        return response()->json($subdis);
    }

    // 📌 Ambil lingkungan berdasarkan kelurahan (AJAX)
    public function getVillages($subdis_id)
    {
        $villages = Village::where('subdis_id', $subdis_id)->get();
        return response()->json($villages);
    }

    // 📌 Chart jumlah kasus per kelurahan
    public function subDisChart()
    {
        $cases = BiteCase::join('sub_dis', 'bite_cases.sub_dis_id', '=', 'sub_dis.id')
            ->select('sub_dis.name', DB::raw('count(*) as total'))
            ->groupBy('sub_dis.name')
            ->orderByDesc('total')
            ->get();

        $labels = $cases->pluck('name');
        $data = $cases->pluck('total');

        return view('bite_cases.chart_subdis', compact('labels', 'data'));
    }

   // 📌 Kirim email peringatan bulanan
    public function sendAlertEmail()
    {
        $cases = BiteCase::join('sub_dis', 'bite_cases.sub_dis_id', '=', 'sub_dis.id')
            ->select('sub_dis.name', DB::raw('COUNT(*) as total'))
            ->whereMonth('bite_cases.created_at', now()->month)
            ->whereYear('bite_cases.created_at', now()->year)
            ->groupBy('sub_dis.name')
            ->having('total', '>=', 5)
            ->get();

        // kirim email hanya kalau ada data
        if ($cases->isNotEmpty()) {
            Mail::to('sertifikasiegberd@gmail.com')->send(new AlertEmail($cases));
        }

        return redirect()->back()->with('success', 'Email peringatan berhasil dikirim!');
    }


    // 📌 Peta kasus per subdis
    public function map()
    {
        $subdis = SubDis::all()->map(function ($s) {
            return [
                'id' => $s->id,
                'name' => $s->name,
                'lat' => (float) $s->lat,
                'lng' => (float) $s->lng
            ];
        });

        $cases = BiteCase::select('sub_dis_id', DB::raw('count(*) as total'))
            ->groupBy('sub_dis_id')
            ->pluck('total', 'sub_dis_id');

        return view('bite_cases.map', compact('subdis', 'cases'));
    }

    // 📌 Cek NIK unik
    public function checkNik(Request $request)
    {
        $exists = BiteCase::where('id_num', $request->id_num)->exists();
        return response()->json(['exists' => $exists]);
    }

    // Halaman id_check
public function idCheckPage()
{
    return view('bite_cases.id_check');
}

// Hasil search NIK (AJAX)
public function idCheckResult(Request $request)
{
    $nik = $request->id_num;

    $biteCases = BiteCase::with(['district', 'subDis', 'village'])
                    ->where('id_num', 'like', "%{$nik}%")
                    ->get();

    // Jika tidak ada data
    if ($biteCases->isEmpty()) {
        return '<p>Tidak ditemukan data untuk NIK ini.</p>';
    }

    $html = '<table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>No Rekam Medis</th>
                        <th>Umur</th>
                        <th>Tanggal Kasus</th>
                        <th>Waktu Kasus</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Lingkungan</th>
                        <th>Kondisi Hewan</th>
                        <th>Tanda Gigitan</th>
                        <th>Kategori Ekspose</th>
                    </tr>
                </thead>
                <tbody>';

    $counter = 1; // ← counter manual
    foreach ($biteCases as $case) {
        $html .= '<tr>
                    <td>'.$counter.'</td>
                    <td>'.$case->name.'</td>
                    <td>'.$case->id_num.'</td>
                    <td>'.$case->medrec_no.'</td>
                    <td>'.$case->age.'</td>
                    <td>'.$case->case_day.'</td>
                    <td>'.$case->case_time.'</td>
                    <td>'.$case->district?->name.'</td>
                    <td>'.$case->subDis?->name.'</td>
                    <td>'.$case->village?->name.'</td>
                    <td>'.$case->animal_con.'</td>
                    <td>'.$case->bite_mark.'</td>
                    <td>'.$case->exp_cat.'</td>
                  </tr>';
        $counter++; // ← increment counter setiap baris
    }

    $html .= '</tbody></table>';

    return $html;
}

    //tarik data
    public function export(Request $request)
{
    $user = Auth::user();

    // Base query sesuai role
    $query = BiteCase::with(['district','subDis','village']);

    if (!$user->isSuperAdmin()) {
        // Admin biasa hanya lihat data yang dia input
        $query->where('user', $user->name);
    }

    // Filter bulan jika ada
    if ($request->bulan) {
        $year = substr($request->bulan, 0, 4);
        $month = substr($request->bulan, 5, 2);
        $query->whereYear('case_day', $year)
              ->whereMonth('case_day', $month);
    }

    // Filter district / sub_dis / village
    if ($request->district) {
        $query->where('district_id', $request->district);
    }
    if ($request->sub_dis) {
        $query->where('sub_dis_id', $request->sub_dis);
    }
    if ($request->village) {
        $query->where('village_id', $request->village);
    }

    $data = $query->get();

    // Data dropdown untuk filter
    $districts = District::all();
    $subDis = SubDis::all();
    $villages = Village::all();

    return view('bite_cases.export', compact('data','districts','subDis','villages'));
}

public function exportCsv(Request $request)
{
    $user = Auth::user();

    $query = BiteCase::with(['district','subDis','village']);

    // Jika bukan superadmin, batasi data sesuai user
    if (!$user->isSuperAdmin()) {
        $query->where('user', $user->name);
    }

    // Filter bulan
    if ($request->bulan) {
        $year = substr($request->bulan, 0, 4);
        $month = substr($request->bulan, 5, 2);
        $query->whereYear('case_day', $year)
              ->whereMonth('case_day', $month);
    }

    // Filter district / sub_dis / village
    if ($request->district) {
        $query->where('district_id', $request->district);
    }
    if ($request->sub_dis) {
        $query->where('sub_dis_id', $request->sub_dis);
    }
    if ($request->village) {
        $query->where('village_id', $request->village);
    }

    $cases = $query->get();

    $filename = "kasus_gigitan_" . now()->format('Ymd_His') . ".csv";
    $handle = fopen('php://output', 'w');

    $columns = [
        'Nama','NIK','Umur','Tanggal Kasus','Waktu Kasus','Kecamatan',
        'Kelurahan','Lingkungan','Kondisi Hewan','Tanda Gigitan',
        'Kategori Ekspose','User Input'
    ];
    fputcsv($handle, $columns);

    foreach ($cases as $case) {
        $caseDay = $case->case_day ? Carbon::parse($case->case_day)->format('d-m-Y') : '';
        fputcsv($handle, [
            $case->name,
            "'" . $case->id_num,
            $case->age,
            $caseDay,
            $case->case_time,
            $case->district?->name,
            $case->subDis?->name,
            $case->village?->name,
            $case->animal_con,
            $case->bite_mark,
            $case->exp_cat,
            $case->user,
        ]);
    }

    return response()->streamDownload(function() use ($handle) {
        fclose($handle);
    }, $filename, [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="'.$filename.'"',
    ]); 
}




}
