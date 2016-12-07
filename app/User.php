<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'members';

    protected $primaryKey = 'memberID';

    protected $hidden = [
        'password', 'resetToken'
    ];

    public static $rules = array();

    public $timestamps = false; 

    protected $fillable = [
        'companyName', 'companyType', 'companyAddress', 'contactPerson', 'contactDesignation', 'mobile', 'email', 'bankAccountTitle', 'bankAccountNumber', 'bankName', 'branch', 'password', 
    ];

    public function getAuthIdentifier()
    {
        return $this->memberID;
    }

    public function getRememberToken()
    {
        return $this->resetToken;
    }

    public function setRememberToken($value)
    {
        $this->resetToken = $value;
    }

    public function getRememberTokenName()
    {
        return 'resetToken';
    }
}
