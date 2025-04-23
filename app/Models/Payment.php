<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Payment extends Model
{
    protected $fillable =[
        'payment_id',
        'payer_email',
        'amount',
        'currency',
        'payment_status',
        'created_at',
        'updated_at',
    ];

    public function payment(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
