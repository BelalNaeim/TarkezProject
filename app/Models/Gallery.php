<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model {
    use HasFactory;
    protected $guarded;
    protected $casts = [
        'title' => 'array',
        'description'=>'array'
    ];
    protected $fillable = [
        'title',
        'description',
        'photo',
        'user_id'
    ];
    protected function asJson( $value ) {
        return json_encode( $value, JSON_UNESCAPED_UNICODE );
    }
}
