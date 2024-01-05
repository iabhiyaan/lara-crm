<x-admin-layout title="All Folders">
    <x-slot name="scripts">
        <script src="{{ asset('/assets/admin/vendors/DataTables/datatables.min.js') }}" type="text/javascript"></script>
        <script type="text/javascript">
            $(function () {
                $('#example-table').DataTable({
                    pageLength: 25,
                });
            })

        </script>
    </x-slot>


    <div class="card m-3 fade-in-up">
        <div class="card-body">
            <div class="ibox-head">
                <div class="text-right">
                    <a class="btn btn-info btn-md" href="{{ route('folder.create') }}">Add Folder</a>
                </div>
            </div>


            <div class="table-responsive">
                <table class="table table-striped gy-7 gs-7">
                    <thead>
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
                        <th>SN</th>
                        <th>Name</th>
                        <th>Parent Folder</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($details as $key => $data)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>
                                <a href="{{ route('folder.show', $data->id) }}" target="_blank" class="hover-underline">
                                    {{ $data->name }}
                                </a>
                            </td>
                            <td>
                                {{ $data->folder->name ?? 'N/A' }}
                            </td>

                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('folder.edit', $data->id) }}"
                                       class="btn me-2 btn-icon btn-success">Edit</a>
                                    <form action="{{ route('folder.destroy', $data->id) }}"
                                          method="post">
                                        @csrf
                                        @method('delete')
                                        <button style="padding-right: 30px; padding-left: 30px;" class="btn btn-danger btn-icon" type="submit" name="button"
                                                onclick="return confirm('Are you sure you want to delete this folder?')">
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
        <link href="{{ asset('/assets/admin/vendors/DataTables/datatables.min.css') }}" rel="stylesheet"/>

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
