<?php

namespace App\DataTables;

use App\Model\Event;
use Yajra\DataTables\Services\DataTable;
use DB ;

class EventsDatatable extends DataTable
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
            ->addColumn('checkbox', 'admin.Events.btns.checkbox')
            ->addColumn('view', 'admin.Events.btns.view')
            ->addColumn('delete', 'admin.Events.btns.delete')
            ->addColumn('creatorName', 'admin.Events.btns.creatorName')
            ->addColumn('candidateName', 'admin.Events.btns.candidateName')
            ->addColumn('playgroundName', 'admin.Events.btns.playgroundName')
            ->rawColumns([
                'checkbox',
                'view',
                'delete'
            ]); 
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Event $model)
    {
        return DB::table('events')
            ->leftJoin('users AS Creator', 'events.E_creator_id', '=', 'Creator.id')
            ->leftJoin('users AS Candidate', 'events.E_candidate_id', '=', 'Candidate.id')
            ->leftJoin('sports AS Sport', 'events.E_sport_id', '=', 'Sport.id')
            ->leftJoin('days AS Day', 'events.E_day', '=', 'Day.day_id')
            ->leftJoin('hours AS From', 'events.E_from', '=', 'From.hour_id')
            ->leftJoin('hours AS To', 'events.E_to', '=', 'To.hour_id')
            ->leftJoin('playgrounds AS Playground', 'events.E_playground_id', '=', 'Playground.id')
            ->leftJoin('reservations AS Reservation', 'events.E_Reservation', '=', 'Reservation.id')
            
            ->select(['events.*', 
                        'Creator.name as Creator', 
                        'Candidate.name as Candidate', 
                        'Sport.ar_sport_name as ar_Sport',
                        'Sport.en_sport_name as en_Sport',
                        'Day.day_format as Day',
                        'From.hour_format as From',
                        'To.hour_format as To',
                        'Playground.c_b_p_name as Playground',
                        'Reservation.id as Reservation',

            ])
            ->get();
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
                           
                        ],
                        'initComplete' => 'function () {
                                this.api().columns([1,2,3,4,5,6,7,8,9,10]).every(function () {
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
/*            [
                'name'          => 'checkbox',
                'data'          => 'checkbox',
                'title'         => '<input type="checkbox" class="checkAll" onclick="check_all()" />',
                'exportable'    => false,
                'printable'     => false,
                'orderable'     => false,
            ],*/
            [
                'name'  => 'id',
                'data'  => 'id',
                'title' => 'ID',
            ],
            [
                'name'      => 'Creator',
                'data'      => 'Creator',
                'title'     => trans('admin.eventCreator'),
            ],
            [
                'name'      => 'Candidate',
                'data'      => 'Candidate',
                'title'     => trans('admin.eventCandidate'),
            ],
            [
                'name'      => (session('lang') == 'ar') ? 'ar_Sport' : 'en_Sport' ,
                'data'      => (session('lang') == 'ar') ? 'ar_Sport' : 'en_Sport' ,
                'title'     => trans('admin.eventSport'),
            ],
            [
                'name'      => 'Playground',
                'data'      => 'Playground',
                'title'     => trans('admin.eventPlayground'),
            ],
            [
                'name'      => 'Reservation',
                'data'      => 'Reservation',
                'title'     => trans('admin.eventReservation'),
            ],
            [
                'name'      => 'created_at',
                'data'      => 'created_at',
                'title'     => trans('admin.C_created_at'),
            ],
            [
                'name'      => 'E_date',
                'data'      => 'E_date',
                'title'     => trans('admin.eventDate'),
            ],
            [
                'name'      => 'Day',
                'data'      => 'Day',
                'title'     => trans('admin.eventDay'),
            ],
            [
                'name'      => 'From',
                'data'      => 'From',
                'title'     => trans('admin.eventFrom'),
            ],
            [
                'name'      => 'To',
                'data'      => 'To',
                'title'     => trans('admin.eventTo'),
            ],
            [
                'name'          => 'view',
                'data'          => 'view',
                'title'         => trans('admin.view'),
                'exportable'    => false,
                'printable'     => false,
                'orderable'     => false,
            ],
            /*[
                'name'          => 'delete',
                'data'          => 'delete',
                'title'         => trans('admin.C_delete'),
                'exportable'    => false,
                'printable'     => false,
                'orderable'     => false,
            ],
*/
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Events_' . date('YmdHis');
    }
}
