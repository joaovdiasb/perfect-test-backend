<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\{StoreRequest, UpdateRequest};
use App\Models\Product;
use App\Traits\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Fluent;
use Illuminate\View\View;

class ProductController extends Controller
{
    use File;

    public function create(): View
    {
        return view('crud_products', [
            'route'   => route('product.store'),
            'product' => new Fluent()
        ]);
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $product = Product::create(
            $request->validated() +
            $this->upload($request)
        );

        return redirect()
            ->route('product.edit', $product);
    }

    public function edit(Product $product): View
    {
        return view('crud_products', [
            'route'   => route('product.update', $product),
            'product' => $product
        ]);
    }

    public function update(UpdateRequest $request, Product $product): RedirectResponse
    {
        $product->update(
            $request->validated() +
            $this->upload($request, $product)
        );

        return redirect()
            ->route('product.edit', $product);
    }
}
