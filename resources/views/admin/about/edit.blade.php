@extends('layouts.admin')

@section('page_title', 'Manage About Page')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.about.update') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label class="form-label fw-bold">Career Objective</label>
                <textarea name="career_objective" class="form-control" rows="4" required>{{ $info->career_objective }}</textarea>
            </div>

            <hr class="my-4">

            <div class="row">
                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold">Technical Skills</label>
                    <div id="tech-skills-container">
                        @forelse($info->technical_skills ?? [] as $skill)
                            <div class="input-group mb-2">
                                <input type="text" name="technical_skills[]" class="form-control" value="{{ $skill }}">
                                <button type="button" class="btn btn-outline-danger remove-input">Remove</button>
                            </div>
                        @empty
                            <div class="input-group mb-2">
                                <input type="text" name="technical_skills[]" class="form-control" placeholder="e.g. PHP">
                                <button type="button" class="btn btn-outline-danger remove-input">Remove</button>
                            </div>
                        @endforelse
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-primary" id="add-tech-skill">Add Skill</button>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold">Soft Skills</label>
                    <div id="soft-skills-container">
                        @forelse($info->soft_skills ?? [] as $skill)
                            <div class="input-group mb-2">
                                <input type="text" name="soft_skills[]" class="form-control" value="{{ $skill }}">
                                <button type="button" class="btn btn-outline-danger remove-input">Remove</button>
                            </div>
                        @empty
                            <div class="input-group mb-2">
                                <input type="text" name="soft_skills[]" class="form-control" placeholder="e.g. Leadership">
                                <button type="button" class="btn btn-outline-danger remove-input">Remove</button>
                            </div>
                        @endforelse
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-primary" id="add-soft-skill">Add Skill</button>
                </div>
            </div>

            <div class="text-end mt-4">
                <button type="submit" class="btn btn-primary px-5">Save Changes</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function addInput(containerId, name) {
        const container = document.getElementById(containerId);
        const div = document.createElement('div');
        div.className = 'input-group mb-2';
        div.innerHTML = `
            <input type="text" name="${name}[]" class="form-control">
            <button type="button" class="btn btn-outline-danger remove-input">Remove</button>
        `;
        container.appendChild(div);
    }

    document.getElementById('add-tech-skill').addEventListener('click', () => addInput('tech-skills-container', 'technical_skills'));
    document.getElementById('add-soft-skill').addEventListener('click', () => addInput('soft-skills-container', 'soft_skills'));

    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-input')) {
            e.target.closest('.input-group').remove();
        }
    });
</script>
@endpush
@endsection
