<x-livewire-tables::bs5.table.cell>
    <div class="d-flex align-items-center">
        <a href="{{ route('projects.show', $row->id) }}">
            <div class="image image-circle image-mini me-3">
                <img src="{{ $row->image ?? asset('default-image.png') }}" alt="project" class="user-img">
            </div>
        </a>
        <div class="d-flex flex-column">
            <a href="{{ route('projects.show', $row->id) }}" class="mb-1 text-decoration-none fs-6">
                {!! Str::limit($row->title, 50) !!}
            </a>
            <span class="fs-6">{{ $row->category->name ?? 'Uncategorized' }}</span>
        </div>
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div class="text-center">
        {{ $row->short_description ? Str::limit($row->short_description, 100) : 'No description available' }}
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div class="badge bg-{{ $row->status == 1 ? 'success' : ($row->status == 2 ? 'warning' : 'danger') }}">
        {{ $row->status == 1 ? 'Active' : ($row->status == 2 ? 'Completed' : 'Inactive') }}
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <span>
        {{ \Carbon\Carbon::parse($row->start_date)->isoFormat('Do MMM, YYYY') ?? 'N/A' }}
    </span>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <span>
        {{ \Carbon\Carbon::parse($row->deadline)->isoFormat('Do MMM, YYYY') ?? 'N/A' }}
    </span>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div class="d-flex align-items-center justify-content-center">
        <a data-bs-toggle="tooltip"
           title="{{ __('messages.common.view') }}"
           href="{{ route('projects.show', $row->id) }}" class="btn px-1 text-info fs-3"
           data-id="{{ $row->id }}">
            <i class="fa-solid fa-eye"></i>
        </a>
        <a data-bs-toggle="tooltip"
           title="{{ __('messages.common.edit') }}"
           href="{{ route('projects.edit', $row->id) }}"
           class="btn px-1 text-primary fs-3 project-edit-btn" data-id="{{ $row->id }}">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
        <a data-bs-toggle="tooltip"
           title="{{ __('messages.common.delete') }}"
           href="javascript:void(0)" data-id="{{ $row->id }}"
           class="btn px-1 text-danger fs-3 project-delete-btn">
            <i class="fa-solid fa-trash"></i>
        </a>
    </div>
</x-livewire-tables::bs5.table.cell>
