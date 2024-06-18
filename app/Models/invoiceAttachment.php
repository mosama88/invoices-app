<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoiceAttachment extends Model
{
    use HasFactory;
    public $fillable =[
'file_name',
'invoice_number',
'created_by',
'invoice_id',
    ];
}
