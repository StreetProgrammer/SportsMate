<?php

namespace App\DataTables;

use App\Model\Country;
use Yajra\DataTables\Services\DataTable;

class CountriesDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('checkbox', 'admin.countries.btns.checkbox')
            ->addColumn('edit', 'admin.countries.btns.edit')
            ->addColumn('delete', 'admin.countries.btns.delete')
            ->addColumn('flag', 'admin.countries.btns.flag')
            ->rawColumns([
                'checkbox',
                'edit',
                'delete',
                'flag'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\country $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Country $model)
    {
        return $model->newQuery()->select('id', 'c_en_name', 'c_ar_name', 'c_mob', 'c_code', 'c_logo', 'created_at');
    }

    public static function lang()
    {
        $langJson = [
                "sProcessing"           => trans('admin.sProcessing') ,
                "sLengthMenu"           => trans('admin.sLengthMenu')  ,
                "sZeroRecords"          => trans('admin.sZeroRecords') ,
                "sEmptyTable"           => trans('admin.sEmptyTable') ,
                "sInfo"                 => trans('admin.sInfo') ,
                "sInfoEmpty"            => trans('admin.sInfoEmpty') ,
                "sInfoFiltered"         => trans('admin.sInfoFiltered') ,
                "sInfoPostFix"          => trans('admin.sInfoPostFix') ,
                "sSearch"               => trans('admin.sSearch'),
                "sUrl"                  => trans('admin.sUrl') ,
                "sInfoThousands"        => trans('admin.sInfoThousands') ,
                "sLoadingRecords"       => trans('admin.sLoadingRecords') ,
                "oPaginate"             => [
                    "sFirst"        => trans('admin.sFirst') ,
                    "sLast"         => trans('admin.sLast') ,
                    "sNext"         => trans('admin.sNext') ,
                    "sPrevious"     => trans('admin.sPrevious') ,
                ],
                "oAria"                 => [
                "sSortAscending"    => trans('admin.sSortAscending') ,
                "sSortDescending"   => trans('admin.sSortDescending')
                ]
            ];

            return $langJson ;
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
                    //->addAction(['width' => '80px'])
                    //->parameters($this->getBuilderParameters());
                    ->parameters([
                        'dom'           => 'Blfrtip',
                        'lengthMenu'    => [[10, 25, 50, -1], [10, 25, 50, 'All Record']],
                        'buttons'       => [
                            [
                                'className' => 'btn btn-flat margin bg-orange', 
                                'text' => '<i class="fa fa-plus"></i> Add New', 
                                'action' => "function(){
                                    window.location.href = '" . \URL::current() . "/create'
                                }"
                            ],
                            [
                                'extend' => 'print', 
                                'className' => 'btn btn-flat margin btn-info', 
                                'text' => '<i class="fa fa-print"></i> ' . trans("admin.ex_print")
                            ],
                            [
                                'extend' => 'csv', 
                                'className' => 'btn btn-flat margin btn-info', 
                                'text' => '<i class="fa fa-file"></i>  ' . trans("admin.ex_csv")
                            ],
                            [
                                'extend' => 'excel', 
                                'className' => 'btn btn-flat margin btn-info', 
                                'text' => '<i class="fa fa-file"></i>  ' . trans("admin.ex_excel")
                            ],
                            [
                                'extend' => 'reload', 
                                'className' => 'btn btn-flat margin btn-default', 
                                'text' => '<i class="fa fa-refresh"></i>'
                            ],
                            [
                                'className' => 'btn btn-flat margin btn-danger delBtn', 
                                'text' => '<i class="fa fa-trash"></i>'
                            ],
                        ],
                        'initComplete' => 'function () {
                                this.api().columns([2,3,4,5]).every(function () {
                                    var column = this;
                                    var input = document.createElement("input");
                                    $(input).appendTo($(column.footer()).empty())
                                    .on("change", function () {
                                        column.search($(this).val(), false, false, true).draw();
                                    });
                                });
                            }',
                            'language' => self::lang()
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
            [
                'name'          => 'checkbox',
                'data'          => 'checkbox',
                'title'         => '<input type="checkbox" class="checkAll" onclick="check_all()" />',
                'exportable'    => false,
                'printable'     => false,
                'orderable'     => false,
            ],
            [
                'name'  => 'id',
                'data'  => 'id',
                'title' => 'ID',
            ],
            [
                'name'      => 'c_en_name',
                'data'      => 'c_en_name',
                'title'     => trans('admin.country_name_en'),
            ],
            [
                'name'      => 'c_ar_name',
                'data'      => 'c_ar_name',
                'title'     => trans('admin.country_name_ar'),
            ],
             [
                'name'      => 'c_mob',
                'data'      => 'c_mob',
                'title'     => trans('admin.countryMob'),
            ],
            [
                'name'      => 'c_code',
                'data'      => 'c_code',
                'title'     => trans('admin.countryCode'),
            ],
             [
                'name'          => 'flag',
                'data'          => 'flag',
                'title'         => trans('admin.countryLogo'),
                'exportable'    => false,
                'printable'     => false,
                'orderable'     => false,
            ],
            [
                'name'      => 'created_at',
                'data'      => 'created_at',
                'title'     => trans('admin.C_created_at'),
            ],
            [
                'name'          => 'edit',
                'data'          => 'edit',
                'title'         => trans('admin.C_edit'),
                'exportable'    => false,
                'printable'     => false,
                'orderable'     => false,
            ],
            [
                'name'          => 'delete',
                'data'          => 'delete',
                'title'         => trans('admin.C_delete'),
                'exportable'    => false,
                'printable'     => false,
                'orderable'     => false,
            ],

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'countries_' . date('YmdHis');
    }
}
