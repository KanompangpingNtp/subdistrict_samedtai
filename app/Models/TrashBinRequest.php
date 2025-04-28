<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrashBinRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'status',
        'admin_name_verifier',
        'written_at',
        'date_written',
        'salutation',
        'full_name',
        'address',
        'village',
        'nearby_places',
        'contact_number',
        'canon_options',
        'option1_amount',
        'option1_month',
        'option2_amount',
        'option2_month',
        'option3_amount',
        'option3_month',
        'option4_detail',
        'document_options',
        'document_options1_detail',
        'document_options3_detail',
        'last_name',
        'age',
        'position'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function files()
    {
        return $this->hasMany(TrashBinRequestFiles::class, 'trash_bin_id');
    }

    public function replies()
    {
        return $this->hasMany(TrashBinRequestReply::class, 'trash_bin_id');
    }
}
