<x-admin-layout title="Create Folder">
    <x-error-message />
    <form action="{{ route('folder.store') }}" method="POST">
        @csrf
        <div class="py-5">
            <div class="rounded border p-10">

                <div class="mb-10">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"/>
                </div>

                <div class="mb-10">
                    <label class="form-label">Select Parent</label>
                    <select name="parent_id" class="form-control" value="{{ old('parent_id') }}">
                        @foreach($data as $d)
                            <option value="{{ $d->id }}">{{$d->name}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary fw-bolder fs-6 px-8 py-4 my-3 me-3">Save</button>
            </div>
        </div>
    </form>

    <x-slot name="styles">
        <style></style>
    </x-slot>

</x-admin-layout>
