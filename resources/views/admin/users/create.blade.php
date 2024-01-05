<x-admin-layout title="Create User">
    <x-error-message />
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="py-5">
            <div class="rounded border p-10">

                <div class="mb-10">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" />
                </div>

                <div class="mb-10">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" />
                </div>

                <div class="mb-10">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" value="{{ old('password') }}" />
                </div>

                <div class="mb-10">
                    <label class="form-label">Password Confirmation</label>
                    <input type="password" class="form-control" name="password_confirmation"
                        value="{{ old('password_confirmation') }}" />
                </div>

                <div class="mb-10">
                    <label class="form-label">Assign Role</label>
                    <select class="form-select form-select-lg" name="role" data-control="select2"
                        data-placeholder="Assign role">
                        @forelse ($roles as $key => $role)
                            <option value="{{ $role->name }}">
                                {{ $role->display_name }}</option>
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
