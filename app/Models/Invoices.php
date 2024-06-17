<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'invoice_date',
        'due_date',
        'product',
        'section',
        'discount',
        'rate_vat',
        'value_vate',
        'total',
        'status',
        'value_status',
        'note',
        'user',
    ];



    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
