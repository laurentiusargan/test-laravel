<?php
return [
    'expected_headers' => [
        'appointments' => ["id","user_id","patient_id","event_type_id","room_id","room","title","status","canceled_at","rescheduled_at","checkin_at","start_at","end_at","checkout_at","missed_at"],
        'patients' => ["id","user_id","type","first_name","last_name","preferred_name","address","city","country","birthday","email","phone","gender","incident_type","incident_date"],
        'users' => ["id","first_name","last_name","email","npi","phone","timezone","address","city","country"],
    ],
];