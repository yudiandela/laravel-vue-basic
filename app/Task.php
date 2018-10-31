<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * Field yg diperbolehkan untuk di isi
     *
     * @var array
     */
    protected $fillable = ['name', 'prior', 'user_id'];
}
