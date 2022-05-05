<?php

namespace App\DataTables\Admin;

use App\Models\Admin\Producto;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class ProductoDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'admin.productos.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Producto $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Producto $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
               /*  'dom'       => 'Bfrtip', */
                'stateSave' => true,
                'order'     => [[0, 'desc']],
               /*  'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ], */
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'name'=> new \Yajra\DataTables\Html\Column(['title' => 'Nombre', 'data' => 'name', 'name' => 'name']),
            'descripcion'=> new \Yajra\DataTables\Html\Column(['title' => 'Descripción', 'data' => 'descripcion', 'name' => 'descripcion']),
            'codigo'=> new \Yajra\DataTables\Html\Column(['title' => 'Codigo', 'data' => 'codigo', 'name' => 'codigo']),
            'costo'=> new \Yajra\DataTables\Html\Column(['title' => 'Costo de compra', 'data' => 'costo', 'name' => 'costo']),
            'precio'=> new \Yajra\DataTables\Html\Column(['title' => 'Precio venta', 'data' => 'precio', 'name' => 'precio']),
            'id_categoria'=> new \Yajra\DataTables\Html\Column(['title' => 'ID de categoria', 'data' => 'id_categoria', 'name' => 'id_categoria']),
            'stock'=> new \Yajra\DataTables\Html\Column(['title' => 'Stock', 'data' => 'stock', 'name' => 'stock'])
            
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'productos_datatable_' . time();
    }
}
