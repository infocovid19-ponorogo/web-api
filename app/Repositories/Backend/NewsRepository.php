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
use App\Models\Kecamatan;
use App\Models\News;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;

/**
 * Class NewsRepository.
 */
class NewsRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return News::class;
    }

}
