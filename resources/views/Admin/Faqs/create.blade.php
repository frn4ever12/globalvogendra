@extends('Admin.includes.main')
@section('content')
    <div style="margin-bottom: 1.5rem;">
        <h3><b>Add a New Question<span style="color: red; font-size: 1.3rem; "></span></b></h3>
    </div>
    <form enctype="multipart/form-data" action="{{ route('admin.faqs.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <label>Question <span style="color:red;">*</span></label>
                <input class="form-control" placeholder="Question" type="text" name="question" />
                @error('question')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <label>Answer <span style="color:red;">*</span></label>
                <textarea name="answer" class="form-control" cols="30" rows="10"></textarea>
                @error('answer')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
