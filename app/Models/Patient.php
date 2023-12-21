<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Validator;

class Patient extends Model
{
    protected $table = 'patients';

    public static function validate(array $data)
    {
        return validator($data, [
            'id' => 'required|integer',
            'user_id' => 'required|integer',
            'type' => 'required|string|max:100',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'preferred_name' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:50',
            'incident_type' => 'nullable|string|max:100',
            'incident_date' => 'nullable|date',
        ]);
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
