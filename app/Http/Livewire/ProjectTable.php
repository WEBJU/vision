<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ProjectTable extends LivewireTableComponent
{
    /**
     * The name of the page for pagination.
     * 
     * @var string
     */
    protected string $pageName = 'projects'; // Removed "string" type declaration

    /**
     * The pagination theme to use.
     * 
     * @var string
     */
    public  $paginationTheme = 'bootstrap-5'; // Removed "string" type declaration

    /**
     * Filter for status.
     * 
     * @var int|null
     */
    public $statusFilter = null;

    protected $listeners = ['refresh' => '$refresh', 'changeFilter', 'resetFilters', 'resetPageTable'];

    /**
     * Primary key name.
     * 
     * @var string
     */
    public string $primaryKey = 'id'; // Removed "string" type declaration

    /**
     * Default column for sorting.
     * 
     * @var string
     */
    public string $defaultSortColumn = 'created_at'; // Removed "string" type declaration

    /**
     * Default sorting direction.
     * 
     * @var string
     */
    public string $defaultSortDirection = 'desc'; // Removed "string" type declaration

    public function columns(): array
    {
        return [
            Column::make(__('Title'), 'title')
                ->sortable()->searchable()->addClass('250px'),
            Column::make(__('Short Description'), 'short_description')
                ->searchable()->addClass('text-wrap'),
            Column::make(__('Status'), 'status')
                ->sortable()->searchable(),
            Column::make(__('Start Date'), 'start_date')
                ->sortable(),
            Column::make(__('Deadline'), 'deadline')
                ->sortable(),
            Column::make(__('Actions'))->addClass('text-center'),
        ];
    }

    public function query(): Builder
    {
        return Project::query()
            ->when($this->statusFilter !== null, function ($query) {
                return $query->where('status', $this->statusFilter);
            });
    }

    public function changeFilter($param, $value): void
    {
        if ($param === 'status') {
            $this->statusFilter = $value;
        }
        $this->customResetPage('project-table');
    }

    public function resetFilters(): void
    {
        $this->reset('statusFilter'); // Reset the status filter to default (null)
        $this->customResetPage('project-table');
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.project_table';
    }

    public function render()
    {
        $statuses = [
            0 => 'Inactive',
            1 => 'Active',
            2 => 'Completed',
        ];

        return view('livewire-tables::' . config('livewire-tables.theme') . '.datatable')
            ->with([
                'columns' => $this->columns(),
                'rowView' => $this->rowView(),
                'filtersView' => $this->filtersView(),
                'customFilters' => $this->filters(),
                'rows' => $this->rows,
                'modalsView' => $this->modalsView(),
                'bulkActions' => $this->bulkActions,
                'componentName' => 'admin.projects.add-button',
                'statusComponent' => 'admin.projects.status-filter',
                'statuses' => $statuses,
            ]);
    }

    public function resetPageTable($pageName = 'project-table'): void
    {
        $this->customResetPage($pageName);
    }
}
