<?php

namespace App\Repositories\Backend;

use Illuminate\Http\UploadedFile;
use App\Models\Auth\SocialAccount;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Events\Frontend\Auth\UserConfirmed;
use App\Events\Frontend\Auth\UserProviderRegistered;
use App\Models\Provinsi;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;

/**
 * Class KecamatanRepository.
 */
class ProvinsiRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Provinsi::class;
    }

    /**
     * @param array $data
     *
     * @throws \Exception
     * @throws \Throwable
     * @return \Illuminate\Database\Eloquent\Model|mixed
     */
    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            $kecamatan = parent::create($data);

            return $kecamatan;
        });
    }

    /**
     * @param       $id
     * @param array $data
     * @throws GeneralException
     * @return array|bool
     */
    public function update($id, array $data)
    {
        $kecamatan = $this->getById($id);
        $kecamatan->odp = $data['odp'];
        $kecamatan->odr = $data['odr'];
        $kecamatan->pdp = $data['pdp'];
        $kecamatan->probable = $data['probable'];
        $kecamatan->positif = $data['positif'];
        $kecamatan->meninggal = $data['meninggal'];
        $kecamatan->sembuh = $data['sembuh'];
        return $kecamatan->save();
    }

}
