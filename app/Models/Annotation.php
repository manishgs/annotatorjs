<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Annotation extends Model {

    var $table = 'annotations';

    var $fillable = ['page_id', 'text', 'quote', 'ranges'];
    
    var $casts = [
        'ranges' => 'json'
    ];
}