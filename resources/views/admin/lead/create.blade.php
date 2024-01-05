<x-admin-layout title="Create lead">
    <x-error-message />
    <form action="{{ route('leads.store') }}" method="POST">
        @csrf
        <div class="py-5">
            <div class="rounded border p-10">

                <div class="mb-10">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"/>
                </div>

                <div class="mb-10">
                    <label class="form-label">Mobile Number</label>
                    <input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number') }}"/>
                </div>

                <button type="submit" class="btn btn-primary fw-bolder fs-6 px-8 py-4 my-3 me-3">Save</button>
            </div>
        </div>
    </form>
</x-admin-layout>
