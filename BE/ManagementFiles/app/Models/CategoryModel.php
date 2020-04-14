<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'mf_category';
    public $timestamps = true;
    const CREATE_AT = 'create_at';
    const UPDATED_AT = 'update_at';
}