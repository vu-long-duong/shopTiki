@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active">{{ __('header.users.list_users') }}</li>
                        </ol>
                    </div>
                    <a class="nav-link ml-auto rearrange" href="#" data-toggle="modal" data-target="#content-rearrange"
                        data-url="{{ route('admin.getheader', ['table' => $tableName]) }}">
                        <i class="fas fa-th-large"></i>
                        <span class="ml-2">Sắp xếp</span>
                    </a>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <h3 class="card-title">{{ __('header.users.list_users') }}</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool create" data-toggle="modal"
                                        data-target="#content-create">
                                        <i class="fas fa-user-plus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">
                                <table id="example2" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>{{ __('header.users.id') }}</th>
                                            <th>{{ __('header.users.name') }}</th>
                                            <th>{{ __('header.users.email') }}</th>
                                            <th>{{ __('header.users.phone') }}</th>
                                            <th>{{ __('header.users.address') }}</th>
                                            <th>{{ __('header.users.profile_picture') }}</th>
                                            <th class="text-center">{{ __('header.users.role') }}</th>
                                            <th class="text-center">{{ __('header.users.control') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>{{ $user->address }}</td>
                                                <td>
                                                    {{-- <iframe
                                                        src="https://drive.google.com/file/d/1i3TTvm_Xm5_vDJmu6CtOgq6tVg1kGB_Y/preview"
                                                        style="width: 200px; height: 200px;" alt=""></iframe> --}}
                                                    {{-- <img src="{{ get_image($user->profile_picture) }}" style="width: 200px; height: 200px;"  alt=""> --}}
                                                </td>
                                                <td id="role_name_{{ $user->id }}"
                                                    class="text-center text-focus font-weight-bold">
                                                    {{ $user->role->name ?? 'Không có chức vụ' }}
                                                </td>
                                                <td class="project-actions text-center">
                                                    <a data-id="{{ $user->id }}" class="btn btn-info btn-sm update"
                                                        data-toggle="modal" data-target="#content-update"
                                                        data-url="{{ route('admin.users.oneshow', ['id' => $user->id]) }}">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                    </a>

                                                    <a class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#content-delete"
                                                        data-url="{{ route('admin.users.oneshow', ['id' => $user->id]) }}">
                                                        <i class="fas fa-trash">
                                                        </i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            {{ $users->links('vendor.pagination') }}
        </section>
        <!-- /.content -->
    </div>
    @include('admin.layouts.rearrange')
    @include('admin.user.create')
    @include('admin.user.update')
    @include('admin.user.delete')

    @include('components.message')
@endsection

@push('scripts')
    <script type="text/javascript">
        users = @json($users);
        users.data.forEach(user => {
            let roleElement = document.querySelector(`#role_name_${user.id}`);

            if (roleElement) {
                switch (user.role?.name) {
                    case 'SuperAdmin':
                        roleElement.classList.add('text-danger');
                        break;
                    case 'Admin':
                        roleElement.classList.add('text-success');
                        break;
                    case 'User':
                        roleElement.classList.add('text-info');
                        break;
                    default:
                        break;
                }
            }
        });



        document.getElementById('city-select').addEventListener('click', function() {
            console.log(1243354315)
            if (this.options.length <= 1)
                fetchCities();
        });

        document.getElementById('city-select').addEventListener('change', function() {
            const cityId = this.value;
            toggleDisabledState('district-select', cityId);
            if (cityId)
                fetchDistricts(cityId);
        });

        document.getElementById('district-select').addEventListener('change', function() {
            const districtId = this.value;
            toggleDisabledState('ward-select', districtId);
            if (districtId)
                fetchWards(districtId);
        });
    </script>
@endpush
