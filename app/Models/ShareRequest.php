<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShareRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'type',
        'have_currency', 'can_buy',
    ];
}
