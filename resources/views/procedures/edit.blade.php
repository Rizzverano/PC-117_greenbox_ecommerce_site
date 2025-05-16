<div class="dynamic-content manager-procedures-content" style="padding: 1rem; background-color: #e9f5ec;">
    <h2 style="color: #2e7d32;">
        <i class="fas fa-book me-2"></i> Edit Cooking Procedures
    </h2>
    <div class="card mt-4" style="border: 1px solid #a5d6a7; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <div class="card-body">
            <form id="editProcedureForm" action="{{ route('procedures.update', $procedure->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <input type="hidden" name="id" value="{{ $procedure->id }}">

                <div class="mb-3">
                    <label class="form-label" style="color: #388e3c;">Dish Name:</label>
                    <input type="text" name="name" value="{{ $procedure->name }}" class="form-control"
                        placeholder="Enter dish name" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" style="color: #388e3c;">Current Image:</label><br>
                    <img src="{{ asset('storage/' . $procedure->image) }}" alt="{{ $procedure->name }}"
                        style="width: 100px; border-radius: 6px;">
                </div>

                <div class="mb-3">
                    <label class="form-label" style="color: #388e3c;">Change Image:</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>

                <div class="mb-3">
                    <label class="form-label" style="color: #388e3c;">Dish Type:</label>
                    <input type="text" name="type" value="{{ $procedure->type }}" class="form-control"
                        placeholder="e.g. Vegetables, Meats, Seafoods" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" style="color: #388e3c;">Current Guide File:</label><br>
                    <a href="{{ asset('storage/' . $procedure->guide) }}"
                        target="_blank">{{ basename($procedure->guide) }}</a>
                </div>

                <div class="mb-3">
                    <label class="form-label" style="color: #388e3c;">Change Guide File (PDF):</label>
                    <input type="file" name="guide" class="form-control" accept="application/pdf">
                </div>

                <div class="d-grid gap-2">
                    <input type="submit" value="Update" class="btn btn-success"
                        style="background-color: #2e7d32; border-color: #2e7d32;">
                </div>
            </form>


            <div class="mt-4">
                <button class="btn btn-success go-back-to-procedures"
                    style="background-color: #43a047; border-color: #43a047;">
                    <i class="fa-solid fa-arrow-left me-1"></i> Back to List
                </button>
            </div>
        </div>
    </div>
</div>
