<?php

namespace App\Http\Controllers\Backend;

use App;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Provinsi\ManageProvinsiRequest;
use App\Http\Requests\Backend\Provinsi\ManageUpdateProvinsiRequest;
use App\Http\Requests\Backend\ManageBackendRequest;
use App\Models\Provinsi;
use App\Repositories\Backend\ProvinsiRepository;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    protected $kecamatanRepo;

    public function __construct()
    {
        $this->kecamatanRepo = App::make(ProvinsiRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManageBackendRequest $request)
    {
        $result = $this->kecamatanRepo->get();
        if ($result) 
        return view('backend.provinsi.index', ['data' => $result]);
    }

    public function indexJson(ManageBackendRequest $request)
    {
        $kecamatan = $this->kecamatanRepo->orderBy('updated_at', 'desc')->get();
        $first = $kecamatan->first();
        $result['summary'] = [
            'odr_total' => $kecamatan->reduce(function($i, $k) {
                    return $i + $k->odr;
            }, 0),
            'odp_total' => $kecamatan->reduce(function($i, $k) {
                    return $i + $k->odp;
            }, 0),
            'pdp_total' => $kecamatan->reduce(function($i, $k) {
                    return $i + $k->pdp;
            }, 0),
            'probable_total' => $kecamatan->reduce(function($i, $k) {
                    return $i + $k->probable;
            }, 0),
            'positif_total' => $kecamatan->reduce(function($i, $k) {
                return $i + $k->positif;
            }, 0),
            'meninggal_total' => $kecamatan->reduce(function($i, $k) {
                return $i + $k->meninggal;
            }, 0),
            'sembuh_total' => $kecamatan->reduce(function($i, $k) {
                return $i + $k->sembuh;
            }, 0),
            'last_update_at' => $first->updated_at->format('Y-m-d H:i:s')
        ];
        if ($result) 
        return response()->json($result, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ManageBackendRequest $request)
    {
        return view('backend.provinsi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManageBackendRequest $request)
    {
        $data = $request->only([
            'odp',
            'odr',
            'pdp',
            'probable',
            'positif',
            'meninggal',
            'sembuh',
        ]);

        $result = $this->kecamatanRepo->create($data);
        if ($result) 
        return response()->json($result, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Provinsi $kecamatan)
    {
        if ($kecamatan)
        return view('backend.provinsi.show', ['kecamatan' => $kecamatan]);
    }

    public function showJson(ManageBackendRequest $request, Provinsi $kecamatan)
    {
        if ($kecamatan)
        return response()->json($kecamatan, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit(ManageBackendRequest $request, Provinsi $kecamatan)
    {
        if ($kecamatan)
        return view('backend.provinsi.edit', ['kecamatan' => $kecamatan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(ManageUpdateProvinsiRequest $request, Provinsi $kecamatan)
    {
        $data = $request->only([
           
            'odp',
            'odr',
            'pdp',
            'probable',
            'positif',
            'meninggal',
            'sembuh',
        ]);

        $result = $this->kecamatanRepo->updateById($kecamatan->id, $data);
        if ($result) 
        return redirect(route('admin.provinsi.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provinsi $kecamatan)
    {
        $this->kecamatanRepo->deleteById($kecamatan->id);
        return redirect(route('admin.provinsi.index'));
    }
}
