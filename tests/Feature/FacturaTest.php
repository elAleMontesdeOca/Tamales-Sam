<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Factura;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FacturaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function se_puede_crear_una_factura()
    {
        $factura = Factura::factory()->create();

        $this->assertDatabaseHas('facturas', [
            'id_factura' => $factura->id_factura,
            'total' => $factura->total,
        ]);
    }

    /** @test */
    public function una_factura_tiene_relaciones_correctas()
    {
        $factura = Factura::factory()->create();

        $this->assertNotNull($factura->orden);
        $this->assertNotNull($factura->cliente);
        $this->assertNotNull($factura->tipoPago);
    }
}
