<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SaleInvoice;
class DriverLog extends Model
{
    public function driver()
    {
        return $this->belongsTo('App\Driver');
    }
    public function customer()
    {
		return $this->belongsTo('App\Customer', 'customer_id', 'ext_id');
	}
	public function vehicle()
	{
		return $this->belongsTo('App\Vehicle');
	}
	public function salesperson()
	{
		return $this->belongsTo('App\Salesperson','salesperson_id','sales_person_id');
	}

    public function order_lines()
    {
        return $this->hasMany('App\SaleInvoice','ext_id','saleinvoice_id');
    }
    public function salesorder()
    {
        return $this->hasOne('App\SalesOrder','sales_order','sales_order_id');
    }
}
