<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Books extends Model
{
    use HasFactory,Notifiable, HasRoles;

    protected $table = 'books';

    protected $fillable = [
        'id',
        'nameBook',
        'author',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }
}
