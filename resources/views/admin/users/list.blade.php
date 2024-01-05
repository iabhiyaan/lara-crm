<x-admin-layout title="All Users">
    <x-slot name="scripts">
        <script>
            function submitPaginationForm() {
                $('input[name="searchUser"]').val($('#search-user-query').text())
                $('#filterForm').submit()
            }
        </script>
    </x-slot>
    <div class="card m-3 fade-in-up">
        <div class="card-body">
            <div class="ibox-head d-flex">
                <form class="col-12 col-md-10" action="{{ route('users.index') }}" method="GET" id="filterForm">
                    @if (request()->query('searchUser'))
                        <div class="mb-3" id="search-results-query-container">
                            Search Results for <span
                                id="search-results-query">"{{ request()->query('searchUser') }}"</span>
                            <span id="search-user-query" style="display: none">{{ request()->query('searchUser') }}</span>
                        </div>
                    @endif
                    <div class="row text-right">
                        <div class="col-md-2">
                            <div class="d-flex align-items-center gap-10">
                                <div>
                                    Entries:
                                </div>
                                <div>
                                    <select name="perPage" id="perPage" class="form-control"
                                            onchange="submitPaginationForm()">
                                        @for ($i = 0; $i <= 100; $i += 5)
                                            <option
                                                {{ request()->query('perPage') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i === 0 ? 'All' : $i }}</option>
                                        @endfor

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="searchUser" placeholder="Search User" class="form-control"/>
                        </div>
                    </div>
                </form>
                <div class="col-12 col-md-2 text-right">
                    <a class="btn btn-info btn-md" href="{{ route('users.create') }}">Add User</a>
                </div>
            </div>


            <div class="table-responsive">
                <table class="table table-striped gy-7 gs-7">
                    <thead>
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
                        <th>SN</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
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
                                {{ $data->email ?? 'N/A' }}
                            </td>
                            <td>
                                {{ $data->roles->pluck('name')[0] ?? 'N/A' }}
                            </td>

                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('users.edit', $data->id) }}"
                                       class="btn me-2 btn-icon btn-success">Edit</a>
                                    <form action="{{ route('users.destroy', $data->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button style="padding-right: 30px; padding-left: 30px;"
                                                class="btn btn-danger btn-icon" type="submit" name="button"
                                                onclick="return confirm('Are you sure you want to delete this user?')">
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
            <div class="mt-3">
                {{ $details->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
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
