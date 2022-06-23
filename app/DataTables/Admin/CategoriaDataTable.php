<?php

namespace App\DataTables\Admin;

use App\Models\Admin\Categoria;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class CategoriaDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'admin.categorias.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Categoria $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Categoria $model)
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
                'stateSave' => false,
                'order'     => [[0, 'desc']],              
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
           /*  'id' => new \Yajra\DataTables\Html\Column(['title' => 'ID', 'data' => 'id', 'name' => 'id']), */
            'name' => new \Yajra\DataTables\Html\Column(['title' => 'Nombre', 'data' => 'name', 'name' => 'name']),
            'descripcion' => new \Yajra\DataTables\Html\Column(['title' => 'Descripcion', 'data' => 'descripcion', 'name' => 'descripcion'])

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'categorias_datatable_' . time();
    }
}
