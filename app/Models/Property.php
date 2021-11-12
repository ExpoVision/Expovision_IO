<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $casts = [
        'photos' => 'array',
        'coordinates' => 'array',
    ];

    protected $fillable = [
        'title', 'price', 'rooms', 'bathrooms',
        'address', 'scene', 'deadline', 'description',
        'building_type', 'district', 'coordinates',
        'developer',
    ];

    const TYPE_REQUEST = 'REQUEST';
    const TYPE_CONTACT = 'CONTACT';

    public static $types = [
        self::TYPE_REQUEST => 'Share request',
        self::TYPE_CONTACT => 'Contact request',
    ];
}
