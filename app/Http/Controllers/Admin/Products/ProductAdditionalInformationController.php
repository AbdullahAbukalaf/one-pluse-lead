<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\Products\Product;
use App\Models\Products\ProductAdditionalInformation;
use Illuminate\Http\Request;

class ProductAdditionalInformationController extends Controller
{
    public function index(Product $product)
    {
        $items = $product->additionalInfos()->orderBy('sort_order')->paginate(30);

        return view('admin.products_additional_information.index', compact('product', 'items'));
    }

    public function create(Product $product)
    {
        return view('admin.products_additional_information.create', compact('product'));
    }

    public function store(Request $request, Product $product)
    {
        $data = $this->validateRow($request);

        $data['product_id'] = $product->id;
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);

        ProductAdditionalInformation::create($data);

        return redirect()
            ->route('admin.products.additional_information.index', $product->id)
            ->with('success', 'Additional information created.');
    }

    public function edit(Product $product, ProductAdditionalInformation $information)
    {
        $this->assertProductMatch($product, $information);

        return view('admin.products_additional_information.edit', [
            'product' => $product,
            'item' => $information,
        ]);
    }

    public function update(Request $request, Product $product, ProductAdditionalInformation $information)
    {
        $this->assertProductMatch($product, $information);

        $data = $this->validateRow($request);
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);

        $information->update($data);

        return redirect()
            ->route('admin.products.additional_information.index', $product->id)
            ->with('success', 'Additional information updated.');
    }

    public function destroy(Product $product, ProductAdditionalInformation $information)
    {
        $this->assertProductMatch($product, $information);

        $information->delete();

        return redirect()
            ->route('admin.products.additional_information.index', $product->id)
            ->with('success', 'Additional information deleted.');
    }

    private function validateRow(Request $request): array
    {
        return $request->validate([
            'label_en' => ['required', 'string', 'max:255'],
            'label_ar' => ['required', 'string', 'max:255'],
            'value_en' => ['nullable', 'string'],
            'value_ar' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);
    }

    private function assertProductMatch(Product $product, ProductAdditionalInformation $information): void
    {
        if ($information->product_id !== $product->id) {
            abort(404);
        }
    }
}
