<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = ['Titulo', 'Descrição', 'status'];

    protected $Titulo;
    protected $Descrição;
    protected $status;
}