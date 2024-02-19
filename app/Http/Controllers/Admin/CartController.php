<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CartService;
use App\Models\Customer;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index()
    {
        return view('admin.carts.customer',[
            'title' => 'Danh Sách Đơn Đặt Hàng',
            'customers' => $this->cartService->getCustomer()
        ]);
    }

    public function show(Customer $customer)
    {
        $carts = $this->cartService->getProductForCart($customer);

        return view('admin.carts.detail', [
            'title' => 'Chi Tiết Đơn Hàng: ' . $customer->name,
            'customer' => $customer,
            'carts' => $carts
        ]);
    }
}
