<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class skill extends Model
{
    use HasFactory;
    protected $guarded =[];
    /**
     * Get the employee that owns the skill
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
{
    return $this->belongsTo(Employee::class);
}
}
