<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'id_customer',
        'id_category',
        'id_employees',
        'employees_name',
        'type_laundry',
        'order_date',
        'out_date',
        'amount_weight',
        'status',
        'total_price'
    ];

    public function customer()
    {
        return $this->belongsTo(Customers::class);
    }

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function employees()
    {
        return $this->belongsTo(Employees::class);
    }
}
