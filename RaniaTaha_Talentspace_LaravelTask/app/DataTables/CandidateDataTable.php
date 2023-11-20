<?php

namespace App\DataTables;

use App\Models\Candidate;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CandidateDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
{
    return (new EloquentDataTable($query))
        ->addColumn('action', function ($query) {
            $addBtn = "<a href='" . route('addToTalentPool', $query->id) . "' class='btn btn-primary'>Add to Talent Pool</a>";
            $deleteBtn = "<a href='" . route('destroyCandidate', $query->id) . "' class='btn btn-danger'>Delete</a>";
            return $deleteBtn . $addBtn ;
        }) 
        ->addColumn('linkedin_profile', function ($query) {
            return "<a href='" . $query->linkedin_profile . "'>Linkedin</a>";
        })  
        ->addColumn('resume', function ($query) {
            return "<a href='" . asset($query->resume) . "' download>Download Pdf</a>";
        })
        ->addColumn('cover_letter', function ($query) {
            return "<a href='" . asset($query->cover_letter) . "' download>Download Pdf</a>";
        }) 
        ->rawColumns(['action', 'linkedin_profile', 'cover_letter', 'resume'])
        ->setRowId('id');
}


    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Candidate $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Candidate $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('candidate-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            // Other columns...
            Column::make('first_name'),
            Column::make('last_name'),
            Column::make('email'),
            Column::make('phone'),
            Column::make('resume'),
            Column::make('cover_letter'),

            Column::make('linkedin_profile'),
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
    protected function filename(): string
    {
        return 'Candidate_' . date('YmdHis');
    }
}
