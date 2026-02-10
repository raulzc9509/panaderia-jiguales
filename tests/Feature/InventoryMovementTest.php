<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InventoryMovementTest extends TestCase
{
    use RefreshDatabase;

    private function adminUser(): User
    {
        return User::factory()->create(['role' => 'ADMIN']);
    }

    public function test_in_movement_increases_stock(): void
    {
        $user = $this->adminUser();
        $product = Product::factory()->create(['stock' => 10]);

        $this->actingAs($user)->post(route('inventario.store'), [
            'product_id' => $product->id,
            'type' => 'IN',
            'quantity' => 5,
        ])->assertRedirect(route('inventario.index'));

        $this->assertEquals(15, $product->fresh()->stock);
        $this->assertDatabaseHas('inventory_movements', [
            'product_id' => $product->id,
            'type' => 'IN',
            'quantity' => 5,
        ]);
    }

    public function test_out_movement_decreases_stock(): void
    {
        $user = $this->adminUser();
        $product = Product::factory()->create(['stock' => 10]);

        $this->actingAs($user)->post(route('inventario.store'), [
            'product_id' => $product->id,
            'type' => 'OUT',
            'quantity' => 4,
        ])->assertRedirect(route('inventario.index'));

        $this->assertEquals(6, $product->fresh()->stock);
    }

    public function test_out_movement_cannot_exceed_stock(): void
    {
        $user = $this->adminUser();
        $product = Product::factory()->create(['stock' => 2]);

        $this->actingAs($user)->post(route('inventario.store'), [
            'product_id' => $product->id,
            'type' => 'OUT',
            'quantity' => 5,
        ])->assertStatus(302); // redirige con errores

        $this->assertEquals(2, $product->fresh()->stock);
    }
}
