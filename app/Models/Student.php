<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
#[Fillable(['name', 'institution_id', 'nis', 'email', 'photo' ])]
class Student extends Model
{
    use HasFactory;
    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class);
    }
}
