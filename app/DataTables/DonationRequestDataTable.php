<?php

namespace App\DataTables;

use App\Models\DonationRequest;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;


class DonationRequestDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return datatables()
        ->eloquent($query)
        ->editColumn('patient_name', function ($raw){
            return $raw->patient_name;
        })
        ->addColumn('actions', function (DonationRequest $donation){
            return view('Admin.pages.Donation_Request.datatables.action', compact('donation'));
        })
        ->rawColumns([
            'actions'
        ]);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(DonationRequest $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('donationrequest-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->parameters([
                        'responsive'   => true,
                        'autoWidth'    => false,
                        'lengthMenu'   => [[10, 25, 50, -1], [10, 25, 50, 'All records']],
                        'buttons'      => [
                            ['extend' => 'print', 'className' => 'btn btn-primary m-2', 'text' => '<i class="fa fa-print"></i>'.trans('actions.print')],
                            ['extend' => 'excel', 'className' => 'btn btn-success', 'text' => '<i class="fa fa-file"></i>'.trans('actions.export')],

                        ],
                        'order' => [
                            0, 'desc'
                        ]
                    ]);
                }
    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
          
      ['name' => 'id', 'data' => 'id', 'title' => 'ID'],
      ['name' => 'patient_name', 'data' => 'patient_name', 'title' => 'Patient Name'],
      ['name' => 'patient_phone', 'data' => 'patient_phone', 'title' => 'Patient Phone'],
      ['name' => 'hospital_name', 'data' => 'hospital_name', 'title' => 'Hospital Name'],
      ['name' => 'patient_age', 'data' => 'patient_age', 'title' => 'Patient Age'],
      ['name' => 'bags_num', 'data' => 'bags_num', 'title' => 'Bags Num'],
      ['name' => 'hospital_address', 'data' => 'hospital_address', 'title' => 'Hospital Address'],
      ['name' => 'details', 'data' => 'details', 'title' => 'Details'],
     
      ['name' => 'actions', 'data' => 'actions', 'title' => 'Actions', 'exportable' => false, 'printable' => false, 'orderable' => false, 'searchable' => false],
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'DonationRequest_' . date('YmdHis');
    }
}
