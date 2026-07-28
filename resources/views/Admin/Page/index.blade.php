@extends('Admin.includes.main')
@section('head')
    @include('Admin.includes.datatables-css')
@endsection
@section('content')
    <div style="display: flex;justify-content: space-between;align-items: center;flex-wrap: wrap;margin-bottom: 1.5rem;">
        <h3>
            Pages
        </h3>
        <div>
            <a href="{{ route('admin.page.create') }}" class="btn btn-success">
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
                    <th>Title</th>
                    <th>Sub Menu</th>
                    <th>Menu</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($pages as $page)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $page->title }}</td>
                        <td>{{ $page->subMenu ? $page->subMenu->name : '-' }}</td>
                        <td>{{ $page->subMenu && $page->subMenu->menu ? $page->subMenu->menu->name : '-' }}</td>
                        <td><span class="btn btn-sm {{ $page->status ? 'btn-success' : 'btn-danger' }}">{{ $page->status ? 'Active' : 'Inactive' }}</span></td>
                        <td>
                            <a href="{{ route('admin.page.edit', $page->id) }}"
                                class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                            <button type="button" data-route="{{ route('admin.page.destroy', $page->id) }}"
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
