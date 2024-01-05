<x-admin-layout title="Edit Role">
    <x-error-message />
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="py-5">
            <div class="rounded border p-10">

                <div class="mb-10">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $role->name }}" />
                </div>

                <div class="mb-10">
                    <label class="form-label">Display Name</label>
                    <input type="text" class="form-control" name="display_name" value="{{ $role->display_name }}" />
                </div>

                <div class="mb-10">
                    <label class="form-label">Assign Permissions</label>
                    <select class="form-select form-select-lg" name="permissions[]" data-control="select2"
                        data-placeholder="Select permission" multiple>
                        @forelse ($permissionGroups as $key => $permissions)
                            <optgroup label="{{ $key }}">
                                @forelse ($permissions as $permission)
                                    @php
                                        $selected = $role->permissions->pluck('name')->contains($permission->name);
                                        $permissionName = \Illuminate\Support\Str::replace('-', ' ', $permission->name);
                                    @endphp
                                    <option value="{{ $permission->name }}" {{ $selected ? 'selected' : '' }}>
                                        {{ $permissionName }}
                                    </option>
                                @empty
                                @endforelse
                            </optgroup>
                        @empty

                        @endforelse
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
