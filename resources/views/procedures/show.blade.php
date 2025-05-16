<div class="dynamic-content manager-procedures-content" style="padding: 1rem; background-color: #e9f5ec;">
    <h2 style="color: #2e7d32;">
        <i class="fas fa-book me-2"></i> Show Cooking Procedures
    </h2>

    <div class="card mt-4" style="border: 1px solid #a5d6a7; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <div class="card-body">
            <h5 class="card-title" style="color: #2e7d32; font-weight: bold;">Dish Name: {{ $procedure->name }}</h5>

            <div class="mb-3">
                <p class="card-text" style="color: #388e3c; font-weight: 500;">Image:</p>
                <img src="{{ asset('storage/' . $procedure->image) }}" alt="Dish Image" style="width: 100%; max-width: 400px; height: auto; border-radius: 10px; border: 2px solid #a5d6a7;">
            </div>

            <div class="mb-3">
                <p class="card-text" style="color: #388e3c; font-weight: 500;">Dish Type:</p>
                <p>{{ $procedure->type }}</p>
            </div>

            <div class="mb-3">
                <p class="card-text" style="color: #388e3c; font-weight: 500;">Procedure (PDF):</p>
                <div style="border: 1px solid #a5d6a7; border-radius: 10px; overflow: hidden;">
                    <embed src="{{ asset('storage/' . $procedure->guide) }}" type="application/pdf" width="100%" height="600px" style="border-radius: 10px;" />
                </div>
            </div>

            <div class="mt-4">
                <button class="btn btn-success go-back-to-procedures" style="background-color: #43a047; border-color: #43a047;">
                    <i class="fa-solid fa-arrow-left me-1"></i> Back to List
                </button>
            </div>
        </div>
    </div>
</div>
