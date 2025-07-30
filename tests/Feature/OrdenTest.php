<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Orden;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrdenTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function se_puede_crear_una_orden()
    {
        $orden = Orden::factory()->create();

        $this->assertDatabaseHas('ordenes', [
            'id_orden' => $orden->id_orden,
            'estado_orden' => $orden->estado_orden,
        ]);
    }

    /** @test */
    public function una_orden_tiene_relaciones_correctas()
    {
        $orden = Orden::factory()->create();

        $this->assertNotNull($orden->cliente);
        $this->assertNotNull($orden->mesa);
        $this->assertNotNull($orden->producto);
        $this->assertNotNull($orden->tipoPago);
    }
}
