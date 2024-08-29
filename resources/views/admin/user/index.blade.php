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
                            <li class="breadcrumb-item active">Danh sách người dùng</li>
                        </ol>
                    </div>
                    <a class="nav-link ml-auto" href="#" data-toggle="modal" data-target="#modal-default">
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
                                <h3 class="card-title">Danh sách người dùng</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool create" data-toggle="modal"
                                        data-target="#modal-create">
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
                                            <th>Id</th>
                                            <th>Tên</th>
                                            <th>Email</th>
                                            <th>Số điện thoại</th>
                                            <th>Địa chỉ</th>
                                            <th class="text-center">Chức vụ</th>
                                            <th class="text-center">Chức năng</th>
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
                                                <td id="role_name_{{ $user->id }}"
                                                    class="text-center text-focus font-weight-bold">
                                                    {{ $user->role->name ?? 'Không có chức vụ' }}
                                                </td>
                                                <td class="project-actions text-center">
                                                    <a data-id="{{ $user->id }}" class="btn btn-info btn-sm update"
                                                        data-toggle="modal" data-target="#modal-update"
                                                        href="{{ route('admin.users.oneshow', ['id' => $user->id]) }}">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                    </a>

                                                    <a class="btn btn-danger btn-sm" href="#">
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
    @include('components.message')
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).on('click', '.create', function(e) {
            $('#modal-default').modal('show');
        });

        $(document).on('click', '.update', function(e) {
            e.preventDefault();

            var url = $(this).attr('href');
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    // Đổ dữ liệu vào các phần tử trong modal
                    $('#modal-default form').attr('action', url);
                    $('#modal-default [name="name"]').val(response.data.name);
                    $('#modal-default [name="email"]').val(response.data.email);
                    $('#modal-default [name="phone"]').val(response.data.phone);
                    $('#modal-default [name="age"]').val(response.data.age);
                    $('#modal-default [name="address"]').val(response.data.address);
                    $('#modal-default [name="ward"]').val(response.data.ward);
                    $('#modal-default [name="district"]').val(response.data.district);
                    $('#modal-default [name="city"]').val(response.data.city);
                    $('#modal-default [name="postal_code"]').val(response.data.postal_code);
                    $('#modal-default [name="country"]').val(response.data.country);
                    $('#modal-default [name="gender"]').val(response.data.gender);
                    $('#modal-default [name="date_of_birth"]').val(response.data.date_of_birth);
                    $('#modal-default [name="role"]').val(response.data.role);

                    // Hiển thị modal
                    $('#modal-update').show();
                    $('#modal-default').modal('show');
                }
            });
        });


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
    </script>
@endpush
