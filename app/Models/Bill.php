<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'due_date', 'bill_name', 'frequency', 'amount'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
