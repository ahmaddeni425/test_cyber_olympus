<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

class AgentController extends Controller
{
    public function index(){
        $no = 0;
        $map_agents = User::where('account_role', '=', 'agent')->get();
        foreach($map_agents as $map_agent => $key){
            $key->jumlah_customer = Order::where('agent_id', $key->id)->count();
        }
        $agents = $map_agents->sortByDesc('jumlah_customer');
        return view('frontend.agent.index', compact('agents', 'no'));
    }
}
