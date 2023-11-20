<?php

namespace App\DataTables;

use App\Models\Job_Post;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Str;


class Job_PostDataTable extends DataTable
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
            $editBtn = "<a style='margin-right: 5px;' href='" . route('job_posts.edit', $query->id) . "' class='btn btn-primary'>Edit</a>";

            $deleteBtn = "<a href='" . route('destroyJob', $query->id) . "' class='btn btn-danger'>Delete</a>";
            return $editBtn . $deleteBtn;
        }) 
        ->addColumn('responsibility', function ($query) {
            return Str::words($query->responsibility, 1, '...');
        })
        ->addColumn('qualifications', function ($query) {
            return Str::words($query->qualifications, 1, '...');
        })
        ->addColumn('job_description', function ($query) {
            return Str::words($query->job_description, 1, '...');
        })
        ->addColumn('created_at', function ($query) {
            return $query->created_at->format('Y-m-d');
        })
        ->setRowId('id');
}


    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Job_Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Job_Post $model): QueryBuilder
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
                    ->setTableId('job_post-table')
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
            Column::make('title'),
            Column::make('location'),
            Column::make('job_type'),
            Column::make('deadline'),
            Column::make('responsibility'),
            Column::make('qualifications'),
            Column::make('job_description'),
            Column::make('created_at'),
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
        return 'Job_Post_' . date('YmdHis');
    }
}
