<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleInvoice extends Model
{
    protected $table = 'saleinvoices';

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id', 'ext_id');
    }
    public function driverlog()
    {
        return $this->belongsTo('App\DriverLog', 'sale_order_id','ext_id');
    }

    public function unit()
    {
        return $this->belongsTo('App\Unit', 'ext_id_unit', 'ext_id');
    }
    public function products()
    {
        return $this->hasMany('App\Product', 'ext_id_unit', 'ext_id');
    }
    public function contact()
    {
        return $this->hasManyThrough(
            'App\Contact',
            'App\Customer',
            'null', // Foreign key on users table...
            'customer_id', // Foreign key on posts table...
            'ext_id', // Local key on countries table...
            'ext_id' // Local key on users table...
        );
    }
}
