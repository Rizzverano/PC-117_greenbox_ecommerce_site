<div class="dynamic-content manager-procedures-content" style="padding: 1rem; background-color: #e9f5ec;">
    <h2 style="color: #2e7d32;">
        <i class="fas fa-book me-2"></i> Add New Cooking Procedure
    </h2>
    <div class="card mt-4" style="border: 1px solid #a5d6a7; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <div class="card-body">
            <form id="addProcedureForm" action="{{ route('procedures.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label" style="color: #388e3c;">Dish Name:</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter dish name" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" style="color: #388e3c;">Image:</label>
                    <input type="file" name="image" class="form-control" accept="image/*" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" style="color: #388e3c;">Dish Type:</label>
                    <input type="text" name="type" class="form-control"
                        placeholder="e.g. Vegetables, Meats, Seafoods" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" style="color: #388e3c;">Procedures File (PDF):</label>
                    <input type="file" name="guide" class="form-control" accept="application/pdf" required>
                </div>

                <div class="d-grid gap-2">
                    <input type="submit" value="Save" class="btn btn-success"
                        style="background-color: #2e7d32; border-color: #2e7d32;">
                </div>
            </form>


            <div class="mt-4">
                <button class="btn btn-success go-back-to-procedures"
                    style="background-color: #43a047; border-color: #43a047;">
                    <i class="fa-solid fa-arrow-left me-1"></i> Back to list
                </button>
            </div>
        </div>
    </div>
</div>
