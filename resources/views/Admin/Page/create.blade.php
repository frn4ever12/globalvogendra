@extends('Admin.includes.main')
@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
@endsection
@section('content')
    <div style="margin-bottom: 1.5rem;">
        <h3><b>Add a New Page<span style="color: red; font-size: 1.3rem; "></span></b></h3>
    </div>
    <form action="{{ route('admin.page.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Sub Menu <span style="color:red;">*</span></label>
                <select name="submenu_id" class="form-control" required>
                    <option value="">Select Sub Menu</option>
                    @foreach ($subMenus as $subMenu)
                        <option value="{{ $subMenu->id }}">{{ $subMenu->menu->name }} - {{ $subMenu->name }}</option>
                    @endforeach
                </select>
                @error('submenu_id')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Title <span style="color:red;">*</span></label>
                <input class="form-control" placeholder="Page Title" type="text" name="title" required />
                @error('title')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Subtitle</label>
                <input class="form-control" placeholder="Page Subtitle" type="text" name="subtitle" />
                @error('subtitle')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Short Description</label>
                <textarea class="form-control" placeholder="Short Description" name="short_description" rows="3"></textarea>
                @error('short_description')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Banner Image</label>
                <input class="form-control" type="file" name="banner_image" accept="image/*" />
                @error('banner_image')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Featured Image</label>
                <input class="form-control" type="file" name="featured_image" accept="image/*" />
                @error('featured_image')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Video URL</label>
                <input class="form-control" placeholder="https://youtube.com/..." type="url" name="video_url" />
                @error('video_url')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>PDF File</label>
                <input class="form-control" type="file" name="pdf" accept=".pdf" />
                @error('pdf')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <label>Content</label>
                <textarea name="content" id="editor" rows="10"></textarea>
                @error('content')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>SEO Title</label>
                <input class="form-control" placeholder="SEO Title" type="text" name="seo_title" />
                @error('seo_title')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>SEO Keywords</label>
                <input class="form-control" placeholder="keyword1, keyword2, keyword3" type="text" name="seo_keywords" />
                @error('seo_keywords')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <label>SEO Description</label>
                <textarea class="form-control" placeholder="SEO Description" name="seo_description" rows="3"></textarea>
                @error('seo_description')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Status</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status" id="status" checked>
                    <label class="form-check-label" for="status">Active</label>
                </div>
                @error('status')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('admin.page.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
