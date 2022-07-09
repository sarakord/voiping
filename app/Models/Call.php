<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    use HasFactory;

    protected $fillable = ['dst_user_number', 'src_contact_number'];

    public function user()
    {
        return $this->belongsTo(User::class, 'dst_user_number', 'id');
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'src_contact_number', 'id');
    }

    public function getCallDateAttribute()
    {
        return jdate($this->created_at)->format('Y/m/d');
    }
}
