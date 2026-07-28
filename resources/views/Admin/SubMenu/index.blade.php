@extends('Admin.includes.main')
@section('head')
    @include('Admin.includes.datatables-css')
@endsection
@section('content')
    <div style="display: flex;justify-content: space-between;align-items: center;flex-wrap: wrap;margin-bottom: 1.5rem;">
        <h3>
            Sub Menus
        </h3>
        <div>
            <a href="{{ route('admin.submenu.create') }}" class="btn btn-success">
                <i class="fa fa-plus"></i>&nbsp;
                <span>Add New</span>
            </a>
        </div>
    </div>
    <div>
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
            width="100%">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Parent Menu</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($subMenus as $subMenu)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $subMenu->name }}</td>
                        <td>{{ $subMenu->slug }}</td>
                        <td>{{ $subMenu->menu->name }}</td>
                        <td>{{ $subMenu->order_no }}</td>
                        <td><span class="btn btn-sm {{ $subMenu->status ? 'btn-success' : 'btn-danger' }}">{{ $subMenu->status ? 'Active' : 'Inactive' }}</span></td>
                        <td>
                            <a href="{{ route('admin.submenu.edit', $subMenu->id) }}"
                                class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                            <button type="button" data-route="{{ route('admin.submenu.destroy', $subMenu->id) }}"
                                class="btn btn-sm btn-danger deleteBtn"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('scripts')
    @include('Admin.includes.datatables-scripts')
@endsection
