<div class="manager-procedures-content" style="padding: 1rem;">
    <h2 style="font-size: 1.5rem; display: flex; align-items: center;">
        <i class="fas fa-book me-2"></i>Cooking Procedures
    </h2>
    <div class="card mt-4" style="box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);">
        <div class="card-body" style="padding: 1.5rem;">
            <!-- Cooking procedures content here -->

            <a href="#" class="btn btn-success btn-sm" title="Add New Procedures" style="margin-bottom: 1rem;">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>

            <div class="table-responsive" style="overflow-x: auto;">
                <table class="table table-striped table-bordered" style="width: 100%; font-size: 0.9rem;">
                    <thead class="table-light">
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
                     {{-- @foreach ($students as $item) --}}

                        <tr>
                         {{-- <td>{{ $loop->iteration }}</td> --}}
                            <td>id</td>
                            <td>Calamari</td>
                            <td>Image</td>
                            <td>Seafoods</td>
                            <td>Calamari.pdf</td>

                            <td style="white-space: nowrap;">
                                <a href="#" title="View Student">
                                    <button class="btn btn-info btn-sm" style="margin-right: 0.25rem;">
                                        <i class="fa fa-eye" aria-hidden="true"></i> View
                                    </button>
                                </a>
                                <a href="#" title="Edit Student">
                                    <button class="btn btn-primary btn-sm" style="margin-right: 0.25rem;">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                    </button>
                                </a>

                                <form method="POST" action="#" accept-charset="UTF-8" style="display:inline;">
                                     {{-- {{ method_field('DELETE') }}
                                        {{ csrf_field() }} --}}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Student"
                                        onclick="return confirm(&quot;Confirm delete?&quot;);">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
