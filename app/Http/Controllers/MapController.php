<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BiteCase;

class MapController extends Controller
{
   public function index()
{
    $biteCases = BiteCase::with(['district', 'subDis', 'village'])->get();

    // Contoh variabel tambahan untuk peta
    $cases = $biteCases->groupBy(fn($case) => $case->subDis?->id ?? 0)
                       ->map(fn($group) => $group->count());

    $geojson = file_exists(public_path('geojson/manado_subdis.geojson')) 
               ? file_get_contents(public_path('geojson/manado_subdis.geojson')) 
               : null;

    return view('bite_cases.index', compact('biteCases', 'cases', 'geojson'));
}

}
