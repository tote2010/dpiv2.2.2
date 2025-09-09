<?php 

namespace App\Services;

use App\Models\Precio;
use App\Models\PreciosCantidad;
use App\Models\Producto;
use App\Models\ValorDolar;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class PrecioService
{

    public function getAllPrecios()
    {
        $valorDolar = ValorDolar::orderBy('id', 'desc')->first()->valor;

        if (!$valorDolar) {
            throw new \Exception('El valor del dólar no está definido.');
        }

        // Realizar la consulta
        $preciosEnPesos = DB::table('precios')
            ->join('productos', 'precios.productos_id', '=', 'productos.id')
            ->join('precios_cantidad', 'precios.precios_cantidad_id', '=', 'precios_cantidad.id')
            ->select(
                'productos.nombre as producto',
                'precios_cantidad.rango as rango')

                //DB::raw('ROUND(precios.precio $valorDolar ?, 0) as precio_en_pesos', [$valorDolar])
            //)
            ->get();

        return $preciosEnPesos;
    }

    public function getPrecios()
    {
        //return Precio::with(['productos', 'precios_cantidad'])->get();

        // Obtener el valor del dólar actual
        $valorDolar = ValorDolar::orderBy('id', 'desc')->first(); //DB::table('valor_dolars')->value('valor');

        if (!$valorDolar) {
            throw new \Exception('El valor del dólar no está definido.');
        }

        // Realizar la consulta
        $preciosEnPesos = DB::table('precios')
            ->join('productos', 'precios.productos_id', '=', 'productos.id')
            ->join('precios_cantidad', 'precios.precios_cantidad_id', '=', 'precios_cantidad.id')
            ->select(
                'precios.*',
                'productos.nombre as producto',
                'precios_cantidad.rango as rango')

                //DB::raw('ROUND(precios.precio $valorDolar ?, 0) as precio_en_pesos', [$valorDolar])
            //)
            ->get();

        return $preciosEnPesos;
    }

    /**
     * Filtrar precios por producto específico.
     *
     * @param int $productoId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPreciosByProducto($productoId)
    {
        return Precio::with(['productos', 'precios_cantidad'])
            ->where('productos_id', $productoId)
            ->get();
    }

    public function agregarProductoConPrecios(array $productoData, array $preciosData)
    {
        try {
            // Iniciar una transacción para garantizar la consistencia de los datos
            return \Illuminate\Support\Facades\DB::transaction(function () use ($productoData, $preciosData) {
                // Crear el producto
                $producto = Producto::create($productoData);

                // Crear los precios asociados
                foreach ($preciosData as $precio) {
                    Precio::create([
                        'productos_id' => $producto->id,
                        'cantidad_id' => $precio['cantidad_id'],
                        'precio' => $precio['precio'],
                    ]);
                }

                return $producto->load('precios.cantidad'); // Retorna el producto con sus precios y cantidades asociadas
            });
        } catch (\Exception $e) {
            // Manejar errores, si es necesario
            throw new \Exception('Error al agregar el producto: ' . $e->getMessage());
        }
    }

    public function create(array $data)
    {
        //
    }

    public function update(Precio $precio, array $data)
    {
        $precio->update($data);
        //$user->syncRoles($data['roles'] ?? []);
        return $precio;
    }

    public function toggleActive(Precio $precio)
    {
        $precio->activo = !$precio->activo;
        $precio->save();
        return $precio;
    }





    /**
     * Obtener productos con precios convertidos a pesos
     * 
     * @param string $tipoDolar Tipo de dólar para la conversión
     * @param array $filtros Filtros adicionales
     * @return Collection
     */
    public function getProductosConPreciosPesos(
        string $tipoDolar = 'oficial', 
        array $filtros = []
    ): Collection {
        // Obtener el último valor del dólar
        $valorDolar = ValorDolar::orderBy('id', 'desc')->first(); //getUltimoValor($tipoDolar);

        if (!$valorDolar) {
            throw new \Exception("No se encontró valor de dólar para el tipo: {$tipoDolar}");
        }

        // Consulta base con joins y conversión de precios
        $query = Producto::select(
            'productos.id', 
            'productos.nombre', 
            'productos.categorias_id',
            DB::raw('precios.precio AS precio_usd'),
            DB::raw('ROUND(precios.precio * ' . $valorDolar->valor . ', 2) AS precio_usd')
        )
        ->join('precios', 'productos.id', '=', 'precios.producto_id')
        ->leftJoin('precios', 'precios.id', '=', 'precios.precios_cantidad_id');

        // Aplicar filtros adicionales
        $this->aplicarFiltros($query, $filtros);

        // Ordenar y agrupar
        $query->orderBy('productos.nombre')
              ->groupBy(
                  'productos.id', 
                  'productos.nombre', 
                  'productos.codigo',
                  'precios.precio',
                  'precios.precio_usd'
              );

        return $query->get();
        // return $query->get()->map(function ($producto) use ($valorDolar) {
        //     $producto->valor_dolar = [
        //         'tipo' => $valorDolar->tipo,
        //         'valor' => $valorDolar->valor
        //     ];
        //     return $producto;
        // });
    }

    /**
     * Aplicar filtros a la consulta
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param array $filtros
     */
    private function aplicarFiltros($query, array $filtros)
    {
        // Filtro por nombre
        if (!empty($filtros['nombre'])) {
            $query->where('productos.nombre', 'LIKE', '%' . $filtros['nombre'] . '%');
        }

        // Filtro por código
        if (!empty($filtros['codigo'])) {
            $query->where('productos.codigo', $filtros['codigo']);
        }

        // Filtro por tipo de precio
        if (!empty($filtros['tipo_precio'])) {
            $query->where('precios.tipo_precio', $filtros['tipo_precio']);
        }

        // Filtro por rango de precio en pesos
        if (!empty($filtros['precio_min'])) {
            $query->whereRaw('precios.precio_usd * ' . ValorDolar::getUltimoValor()->valor . ' >= ?', [$filtros['precio_min']]);
        }

        if (!empty($filtros['precio_max'])) {
            $query->whereRaw('precios.precio_usd * ' . ValorDolar::getUltimoValor()->valor . ' <= ?', [$filtros['precio_max']]);
        }
    }

    /**
     * Obtener resumen de precios
     * 
     * @return array
     */
    public function getResumenPrecios(): array
    {
        $valorDolar = ValorDolar::getUltimoValor();

        return [
            'total_productos' => Producto::count(),
            'precio_promedio_usd' => Precio::avg('precio_usd'),
            'precio_promedio_pesos' => DB::raw('ROUND(AVG(precios.precio_usd * ' . $valorDolar->valor . '), 2)'),
            'valor_dolar' => $valorDolar->valor
        ];
    }
}