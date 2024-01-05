<x-admin-layout title="Edit lead">
    <x-error-message />
    <form action="{{ route('leads.update', $lead->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="py-5">
            <div class="rounded border p-10">

                <div class="mb-10">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $lead->name }}"/>
                </div>

                <div class="mb-10">
                    <label class="form-label">Mobile Number</label>
                    <input type="text" class="form-control" name="mobile_number" value="{{ $lead->mobile_number }}"/>
                </div>

                <button type="submit" class="btn btn-primary fw-bolder fs-6 px-8 py-4 my-3 me-3">Save</button>
            </div>
        </div>
    </form>
</x-admin-layout>
