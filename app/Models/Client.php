<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'account_type',
        'cpf_cnpj'
    ];

    public function address()
    {
        return $this->hasMany(Address::class);
    }
}
