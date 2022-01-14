<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailOrder;
use App\Models\User;
use App\Models\Agent;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'id';
    
    protected $casts = [
        'delivery_date' => 'datetime',
    ];

    public function detailOrder(){
        return $this->hasOne(DetailOrder::class, 'order_id', 'id');
    }

    public function customer(){
        return $this->hasOne(User::class, 'id', 'customer_id');
    }

    public function agent(){
        return $this->hasOne(Agent::class, 'id', 'agent_id');
    }
}
