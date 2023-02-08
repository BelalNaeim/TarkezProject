<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Main extends Model {
    use HasFactory;

    use HasFactory;
    protected $guarded;
    protected $casts = [
        'title' => 'array',
        'description'=>'array'
    ];
    protected $fillable = [
        'title',
        'description',
        'cover',
        'user_id'
    ];
    protected function asJson( $value ) {
        return json_encode( $value, JSON_UNESCAPED_UNICODE );
    }
}
