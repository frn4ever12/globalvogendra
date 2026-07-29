@extends('Admin.includes.modern-main')
@section('content')
    <div class="page-header">
        <div style="display: flex;justify-content: space-between;align-items: center;flex-wrap: wrap;">
            <h3 class="page-title">Menus</h3>
            <a href="{{ route('admin.menu.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i>&nbsp; Add New
            </a>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Icon</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th>Sub Menus</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($menus as $menu)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $menu->name }}</td>
                            <td>{{ $menu->icon ?? '-' }}</td>
                            <td>{{ $menu->order_no }}</td>
                            <td><span class="badge {{ $menu->status ? 'bg-success' : 'bg-danger' }}">{{ $menu->status ? 'Active' : 'Inactive' }}</span></td>
                            <td>{{ $menu->subMenus->count() }}</td>
                            <td>
                                <a href="{{ route('admin.menu.edit', $menu->id) }}"
                                    class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                                <button type="button" data-route="{{ route('admin.menu.destroy', $menu->id) }}"
                                    class="btn btn-sm btn-danger deleteBtn"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
