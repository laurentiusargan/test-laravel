<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Apointment extends Model
{
    protected $table = 'apointments';

    public static function validate(array $data)
    {
        return validator($data, [
            'id' => 'required|integer',
            'user_id' => 'required|integer',
            'patient_id' => 'required|integer',
            'event_type_id' => 'required|integer',
            'room_id' => 'required|integer',
            'room' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'canceled_at' => 'nullable|date',
            'rescheduled_at' => 'nullable|date',
            'checkin_at' => 'nullable|date',
            'start_at' => 'required|nullable|date',
            'end_at' => 'required|nullable|date',
            'checkout_at' => 'nullable|date',
            'missed_at' => 'nullable|date',
        ]);
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
