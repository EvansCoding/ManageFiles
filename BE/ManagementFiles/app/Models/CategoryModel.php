<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'mf_category';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = true;
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';
}