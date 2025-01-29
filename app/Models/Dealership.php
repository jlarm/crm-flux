<?php

namespace App\Models;

use App\Enum\DevStatus;
use App\Enum\Rating;
use App\Enum\Status;
use App\Enum\Type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Dealership extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'city',
        'state',
        'zip_code',
        'phone',
        'email',
        'current_solution_name',
        'current_solution_use',
        'notes',
        'status',
        'rating',
        'type',
        'in_development',
        'dev_status',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'name' => 'string',
        'address' => 'string',
        'city' => 'string',
        'state' => 'string',
        'zip_code' => 'string',
        'phone' => 'string',
        'email' => 'string',
        'current_solution_name' => 'string',
        'current_solution_use' => 'string',
        'notes' => 'string',
        'status' => Status::class,
        'rating' => Rating::class,
        'type' => Type::class,
        'in_development' => 'boolean',
        'dev_status' => DevStatus::class,
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
