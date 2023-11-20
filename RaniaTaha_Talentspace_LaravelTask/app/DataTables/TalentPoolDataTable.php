<?php

namespace App\DataTables;

use App\Models\Talent_Pool;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TalentPoolDataTable extends DataTable
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
        
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Talent_Pool $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Talent_Pool $model): QueryBuilder
    {
        return $model->newQuery()->with('candidate'); // Load the related Candidate model
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('talentpool-table')
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
            Column::make('candidate.first_name') 
            ->title('First Name') 
            ->searchable(true)
            ->orderable(true),
            Column::make('candidate.last_name') 
            ->title('Last Name') 
            ->searchable(true)
            ->orderable(true),
            Column::make('candidate.email') 
            ->title('Email') 
            ->searchable(true)
            ->orderable(true),
            Column::make('candidate.phone') 
            ->title('Phone') 
            ->searchable(true)
            ->orderable(true),
            Column::make('skills'),

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'TalentPool_' . date('YmdHis');
    }
}
