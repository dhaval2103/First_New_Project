<?php

namespace App\DataTables;

use App\Models\order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class orderdatatable extends DataTable
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

            ->addColumn('action', function ($data) {
                $id = $data->invoiceno;
                return '<a class="btn btn-light" href="' . route("admin.viewbilldetail", $id) . '"><i style="color:green" class="fa fa-eye"></i></a>';
            })
            ->addcolumn('name', function ($data) {
                return User::where('id', $data->user_id)->pluck('name')->first();
            })
            ->addcolumn('email', function ($data) {
                return User::where('id', $data->user_id)->pluck('email')->first();
            })
            ->rawColumns(['action', 'name', 'email'])
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\order $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(order $model)
    {
        $ids = $model->get()->unique('invoiceno')->pluck('id');
        return $model->whereIn('id', $ids);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('orderdatatable-table')
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
            Column::make('invoiceno')->width(100),
            Column::make('name')->title('CustomerName')->width(100),
            Column::make('email')->title('CustomerEmail')->width(100),
            // Column::make('totalprice')->title('Amount'),
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
        return 'order_' . date('YmdHis');
    }
}