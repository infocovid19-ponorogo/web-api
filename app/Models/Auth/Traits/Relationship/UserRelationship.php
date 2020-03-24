<?php

namespace App\Models\Auth\Traits\Relationship;

use App\Models\Auth\SocialAccount;
use App\Models\Auth\PasswordHistory;
use App\Models\Auth\User;
use App\Models\Bimbingan;

/**
 * Class UserRelationship.
 */
trait UserRelationship
{
    /**
     * @return mixed
     */
    public function providers()
    {
        return $this->hasMany(SocialAccount::class);
    }

    /**
     * @return mixed
     */
    public function passwordHistories()
    {
        return $this->hasMany(PasswordHistory::class);
    }

    public function bimbingan()
    {
        return $this->hasMany(Bimbingan::class);
    }

    public function pembimbing()
    {
        return $this->hasOne(User::class, 'id', 'pembimbing_id');
    }

    public function mahasiswa()
    {
        return $this->hasMany(User::class, 'pembimbing_id', 'id');
    }
}
