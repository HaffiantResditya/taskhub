<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi via mass assignment (Project::create([...]))
    protected $fillable = ['user_id', 'name', 'description', 'color'];

    // ── Relasi Eloquent ──────────────────────────────────────────────

    // Project dimiliki SATU User (belongsTo = anak → parent)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Project punya BANYAK Task (hasMany = parent → banyak anak)
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
