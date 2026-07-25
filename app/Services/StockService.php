<?php
namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Exception;

class StockService
{
    /**
     * Adjust stock for a single item safely.
     */
   public function adjustStock(Product $product, string $type, int $quantity, ?string $reference = null): Product
    {
        return DB::transaction(function () use ($product, $type, $quantity, $reference) {
            
            // Log transaction entry
            $product->transactions()->create([
                'type' => $type,
                'quantity' => $quantity,
                'reference' => $reference,
            ]);

            // Adjust overall product count depending on operation type
            if ($type === 'in') {
                $product->increment('stock_quantity', $quantity);
            } elseif ($type === 'out') {
                $product->decrement('stock_quantity', $quantity);
            } elseif ($type === 'adjustment') {
                $product->update(['stock_quantity' => $quantity]);
            }

            return $product->refresh();
        });
    }
}
