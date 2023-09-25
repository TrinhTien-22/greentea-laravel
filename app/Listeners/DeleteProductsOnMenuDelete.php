<?php

namespace App\Listeners;

use App\Events\MenuDeleted;
use App\Models\products;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\File;

class DeleteProductsOnMenuDelete
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(MenuDeleted $event): void
    {
        $menuId = $event->menuId;
        $products = products::where('menu_id', $menuId)->get();

        foreach ($products as $product) {
            if (File::exists(public_path('imageproduct/' . $product->image))) {
                File::delete(public_path('imageproduct/' . $product->image));
            }

            // Xóa sản phẩm
            $product->delete();
        }
    }
}
