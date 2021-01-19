<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        // Get all products form database
        $data['products'] = Product::all();

        return view('pages.homepage', $data);
    }

    public function checkout(Request $request)
    {
        $data['orders'] = $request->input('quantity');
        $data['products'] = [];
        $data['total'] = 0;

        foreach ($data['orders'] as $id => $quantity)
        {
            $product = Product::find($id);
            $product->quantity = $quantity;
            $product->total = $product->quantity * $product->price;
            $data['products'][] = $product;
            $data['total'] += $product->total;
        }

        return view('pages.checkout', $data);
    }

    public function payment(Request $request)
    {
        foreach (json_decode($request->input('orders')) as $id => $quantity)
        {
            $order = new Order();
            $order->client_name = $request->input('name');
            $order->client_number = $request->input('number');
            $order->client_address = $request->input('address');
            $order->product_id = $id;
            $order->quantity = $quantity;
            $order->save();
        }
        echo "Sifariş qəbul olundu <a href='".route('homepage')."' > Ana səhifəyə geri dön</a>";
    }

    public function manager()
    {
        return view('pages.manager')->with('login', true);
    }

    public function orderList(Request $request)
    {
        $manager_pass = '12345';

        if ($request->input('password') == $manager_pass)
        {
            $data['getDate'] = Order::orderBy('created_at')
                ->get()
                ->groupBy(function ($val) {
                    return Carbon::parse($val->created_at)->format('Y-m-d H-i-s');
                });

            return view('pages.orders', $data);
        }

        else return redirect('/manager')->with('login', false);
    }
}
