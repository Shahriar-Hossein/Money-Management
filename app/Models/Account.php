<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\CssSelector\Node\FunctionNode;

class Account extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'account_name', 'account_type', 'balance'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
