@extends('Admin.includes.main')
@section('head')
    @include('Admin.includes.datatables-css')
@endsection
@section('content')
    <div style="display: flex;justify-content: space-between;align-items: center;flex-wrap: wrap;margin-bottom: 1.5rem;">
        <h3>
            Universities
        </h3>
        <div>
            <a href="{{ route('admin.university.create') }}" class="btn btn-success">
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
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach (\App\Models\University::get() as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->name }}</td>
                        <td><img src="{{ asset('storage/'.$data->image_url) }}" style="width:50px;" alt=""></td>

                        <td><span class="btn btn-sm {{ $data->status==1?'btn-success':'btn-danger'}}">{{ $data->status==1?'Active':'Deactive'}}</span></td>
                        <td>
                            <a href="{{ route('admin.university.edit', $data->id) }}"
                                class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                            <button type="button" data-route="{{ route('admin.university.destroy', $data->id) }}"
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
