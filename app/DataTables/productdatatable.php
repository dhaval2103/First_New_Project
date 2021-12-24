<?php

namespace App\DataTables;

use App\Models\image;
use App\Models\product;
use App\Models\watchbrand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class productdatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('image', function ($data) {
                $images = image::where('product_id', $data->id)->first();

                return "<img class='' src='" . $images['image'] . "' height='60px'>";
            })
            ->addColumn('action', function ($data) {
                $id = $data->id;
                return '<button type="button" class="btn btn-light" id="editdata"><a href="' . route("admin.productedit", $id) . '"><i class="fa fa-edit"></i></a></button>
                <button class="btn btn-light" id="deletedata" data-id="' . $data->id . '"><i style="color:red" class="fas fa-trash"></i></button>
                <button type="button" class="btn btn-light" id="viewdata"><a href="' . route("admin.productview", $id) . '"><i style="color:green" class="fa fa-eye"></i></a></button>';
            })
            ->addcolumn('name', function ($data) {
                return watchbrand::where('id', $data->watch_id)->pluck('name')->first();
            })
            ->rawColumns(['image', 'action', 'name'])
            ->addIndexColumn();
        // ->addColumn('action', 'productdatatable.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\product $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(product $model)
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
            ->setTableId('productdatatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bflrtip')
            ->orderBy(1)
            ->buttons(
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('no')->data('DT_RowIndex')->searchable(false)->orderable(false)->width(50),
            Column::make('name')->title('Brand'),
            Column::make('title'),
            Column::make('description'),
            Column::make('image'),
            Column::make('price'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'product_' . date('YmdHis');
    }
}
