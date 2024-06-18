<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoicesDetail extends Model
{
    use HasFactory;
    public $fillable =[
'invoice_number',
'invoice_id',
'product',
'section_id',
'status',
'value_Status',
'payment_Date',
'note',
'user',
    ];
}
