<x-admin-layout title="All Roles">
    <div class="card m-3 fade-in-up">
        <div class="card-body">
            <div class="ibox-head">
                <div class="text-right">
                    <a class="btn btn-info btn-md" href="{{ route('roles.create') }}">Add Role</a>
                </div>
            </div>


            <div class="table-responsive">
                <table class="table table-striped gy-7 gs-7">
                    <thead>
                        <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
                            <th>SN</th>
                            <th>Name</th>
                            <th>Display Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($details as $key => $data)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>
                                    {{ $data->name }}
                                </td>
                                <td>
                                    {{ $data->display_name ?? 'N/A' }}
                                </td>

                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('roles.edit', $data->id) }}"
                                            class="btn me-2 btn-icon btn-success">Edit</a>
                                        <form action="{{ route('roles.destroy', $data->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button style="padding-right: 30px; padding-left: 30px;"
                                                class="btn btn-danger btn-icon" type="submit" name="button"
                                                onclick="return confirm('Are you sure you want to delete this role?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">
                                    You do not have any data yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <x-slot name="styles">
        <link href="{{ asset('/assets/admin/vendors/DataTables/datatables.min.css') }}" rel="stylesheet" />

        <style media="screen">
            .text-right {
                text-align: right;
            }

            a.hover-underline:hover {
                text-decoration: underline !important;
            }
        </style>
    </x-slot>

</x-admin-layout>
