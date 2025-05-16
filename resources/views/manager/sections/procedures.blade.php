<div id="procedures-content" class="manager-procedures-content active"
    style="padding: 1rem; background-color: #e9f5ec;">
    <h2 style="font-size: 1.5rem; display: flex; align-items: center; color: #2e7d32;">
        <i class="fas fa-book me-2"></i> Cooking Procedures
    </h2>
    <div class="card mt-4" style="box-shadow: 0 4px 8px rgba(0,0,0,0.1); border: 1px solid #a5d6a7;">
        <div class="card-body" style="padding: 1.5rem;">
            <a href="{{ route('procedures.create') }}" id="showAddProcedureForm" class="btn btn-success btn-sm"
                title="Add New Procedures"
                style="margin-bottom: 1rem; background-color: #2e7d32; border-color: #2e7d32;">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>

            <div class="table-responsive" style="overflow-x: auto;">
                <table class="table table-striped table-bordered" style="width: 100%; font-size: 0.9rem;">
                    <thead style="background-color: #c8e6c9;">
                        <tr>
                            <th style="white-space: nowrap;">#</th>
                            <th style="white-space: nowrap;">Dish Name</th>
                            <th style="white-space: nowrap;">Image</th>
                            <th style="white-space: nowrap;">Dish Type</th>
                            <th style="white-space: nowrap;">Procedures File</th>
                            <th style="white-space: nowrap;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($procedures as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                                        style="width: 60px; height: auto; border-radius: 6px;">
                                </td>
                                <td>{{ $item->type }}</td>
                                <td>
                                    <a href="{{ asset('storage/' . $item->guide) }}" style="color: #2e7d32;"
                                        target="_blank">
                                        {{ basename($item->guide) }}
                                    </a>
                                </td>
                                <td style="white-space: nowrap;">
                                    <button class="btn btn-info btn-sm btn-show-procedure"
                                        data-id="{{ $item->id }}">
                                        <i class="fa fa-eye" aria-hidden="true"></i> View
                                    </button>
                                    <button class="btn btn-primary btn-sm btn-edit-procedure"
                                        data-id="{{ $item->id }}">
                                        <i class="fa-solid fa-pen-to-square" aria-hidden="true"></i> Edit
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm btn-delete-procedure"
                                        data-id="{{ $item->id }}" title="Delete Procedure">
                                        <i class="fa-solid fa-trash" aria-hidden="true"></i> Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
