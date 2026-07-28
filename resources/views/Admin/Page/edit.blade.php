@extends('Admin.includes.main')
@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
    <style>
        .section-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            background: #f9f9f9;
            cursor: move;
        }
        .section-item:hover {
            background: #f0f0f0;
        }
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }
        .section-type-badge {
            background: #007bff;
            color: white;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 12px;
        }
        .section-actions {
            display: flex;
            gap: 5px;
        }
        .section-actions button {
            padding: 3px 8px;
            font-size: 12px;
        }
        .add-section-dropdown {
            margin-bottom: 20px;
        }
    </style>
@endsection
@section('content')
    <div style="margin-bottom: 1.5rem;">
        <h3><b>Edit Page<span style="color: red; font-size: 1.3rem; "></span></b></h3>
    </div>
    
    <!-- Basic Page Info -->
    <form action="{{ route('admin.page.update', $page->id) }}" method="post" enctype="multipart/form-data">
       @method('PUT')
        @csrf
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Sub Menu <span style="color:red;">*</span></label>
                <select name="submenu_id" class="form-control" required>
                    <option value="">Select Sub Menu</option>
                    @foreach ($subMenus as $subMenu)
                        <option value="{{ $subMenu->id }}" {{ $page->submenu_id == $subMenu->id ? 'selected' : '' }}>{{ $subMenu->menu->name }} - {{ $subMenu->name }}</option>
                    @endforeach
                </select>
                @error('submenu_id')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Title <span style="color:red;">*</span></label>
                <input class="form-control" placeholder="Page Title" type="text" name="title" value="{{ $page->title }}" required />
                @error('title')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Banner Image</label>
                <input class="form-control" type="file" name="banner_image" accept="image/*" />
                @if($page->banner_image)
                    <img src="{{ asset('storage/' . $page->banner_image) }}" style="max-width: 200px; margin-top: 10px;" />
                @endif
                @error('banner_image')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>Status</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status" id="status" {{ $page->status ? 'checked' : '' }}>
                    <label class="form-check-label" for="status">Active</label>
                </div>
                @error('status')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Save Basic Info</button>
                <a href="{{ route('admin.page.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </form>

    <!-- Page Builder Section -->
    <div style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #ddd;">
        <h4>Page Content Builder</h4>
        <p class="text-muted">Drag and drop sections to reorder. Add unlimited content sections to build your page.</p>
        
        <!-- Add Section Dropdown -->
        <div class="add-section-dropdown">
            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle" type="button" id="addSectionBtn" data-bs-toggle="dropdown">
                    <i class="fa fa-plus"></i> Add Section
                </button>
                <ul class="dropdown-menu" aria-labelledby="addSectionBtn" style="max-height: 400px; overflow-y: auto;">
                    <li><a class="dropdown-item" href="#" data-section-type="heading"><i class="fa fa-heading me-2"></i>Heading</a></li>
                    <li><a class="dropdown-item" href="#" data-section-type="sub_heading"><i class="fa fa-text-height me-2"></i>Sub Heading</a></li>
                    <li><a class="dropdown-item" href="#" data-section-type="paragraph"><i class="fa fa-paragraph me-2"></i>Paragraph</a></li>
                    <li><a class="dropdown-item" href="#" data-section-type="rich_text"><i class="fa fa-edit me-2"></i>Rich Text (CKEditor)</a></li>
                    <li><a class="dropdown-item" href="#" data-section-type="single_image"><i class="fa fa-image me-2"></i>Single Image</a></li>
                    <li><a class="dropdown-item" href="#" data-section-type="two_images"><i class="fa fa-images me-2"></i>Two Images</a></li>
                    <li><a class="dropdown-item" href="#" data-section-type="image_gallery"><i class="fa fa-th me-2"></i>Image Gallery</a></li>
                    <li><a class="dropdown-item" href="#" data-section-type="video"><i class="fa fa-video me-2"></i>Video</a></li>
                    <li><a class="dropdown-item" href="#" data-section-type="youtube_embed"><i class="fa fa-youtube me-2"></i>YouTube Embed</a></li>
                    <li><a class="dropdown-item" href="#" data-section-type="table"><i class="fa fa-table me-2"></i>Table</a></li>
                    <li><a class="dropdown-item" href="#" data-section-type="bullet_list"><i class="fa fa-list-ul me-2"></i>Bullet List</a></li>
                    <li><a class="dropdown-item" href="#" data-section-type="number_list"><i class="fa fa-list-ol me-2"></i>Number List</a></li>
                    <li><a class="dropdown-item" href="#" data-section-type="faq"><i class="fa fa-question-circle me-2"></i>FAQ</a></li>
                    <li><a class="dropdown-item" href="#" data-section-type="accordion"><i class="fa fa-bars me-2"></i>Accordion</a></li>
                    <li><a class="dropdown-item" href="#" data-section-type="download_file"><i class="fa fa-download me-2"></i>Download File</a></li>
                    <li><a class="dropdown-item" href="#" data-section-type="quote"><i class="fa fa-quote-left me-2"></i>Quote</a></li>
                    <li><a class="dropdown-item" href="#" data-section-type="call_to_action"><i class="fa fa-bullhorn me-2"></i>Call To Action</a></li>
                    <li><a class="dropdown-item" href="#" data-section-type="button"><i class="fa fa-mouse-pointer me-2"></i>Button</a></li>
                    <li><a class="dropdown-item" href="#" data-section-type="apply_now"><i class="fa fa-paper-plane me-2"></i>Apply Now Section</a></li>
                    <li><a class="dropdown-item" href="#" data-section-type="contact_form"><i class="fa fa-envelope me-2"></i>Contact Form</a></li>
                    <li><a class="dropdown-item" href="#" data-section-type="related_pages"><i class="fa fa-link me-2"></i>Related Pages</a></li>
                </ul>
            </div>
        </div>

        <!-- Sections Container -->
        <div id="sectionsContainer">
            @foreach($page->sections->sortBy('sort_order') as $section)
                <div class="section-item" data-id="{{ $section->id }}">
                    <div class="section-header">
                        <span class="section-type-badge">{{ $section->section_type }}</span>
                        <div class="section-actions">
                            <button type="button" class="btn btn-sm btn-primary editSectionBtn"><i class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-sm btn-warning duplicateSectionBtn"><i class="fa fa-copy"></i></button>
                            <button type="button" class="btn btn-sm btn-danger deleteSectionBtn"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                    <div class="section-content">
                        @if($section->title)
                            <h5>{{ $section->title }}</h5>
                        @endif
                        @if($section->content)
                            <p>{!! substr(strip_tags($section->content), 0, 150) !!}...</p>
                        @endif
                        @if($section->image)
                            <img src="{{ asset('storage/' . $section->image) }}" style="max-height: 100px;">
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Section Edit Modal -->
    <div class="modal fade" id="sectionModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Section</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="sectionForm">
                        <input type="hidden" id="sectionId">
                        <input type="hidden" id="sectionType">
                        <input type="hidden" id="pageId" value="{{ $page->id }}">
                        
                        <div id="sectionFields"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveSectionBtn">Save Section</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        // Initialize Sortable
        var sectionsContainer = document.getElementById('sectionsContainer');
        new Sortable(sectionsContainer, {
            animation: 150,
            handle: '.section-item',
            onEnd: function() {
                saveSectionOrder();
            }
        });

        // Save section order
        function saveSectionOrder() {
            var sectionIds = [];
            $('.section-item').each(function() {
                sectionIds.push($(this).data('id'));
            });

            $.ajax({
                url: '{{ route('admin.page-section.reorder') }}',
                type: 'POST',
                data: {
                    section_ids: sectionIds,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log('Sections reordered');
                }
            });
        }

        // Add section
        $('.dropdown-item[data-section-type]').click(function(e) {
            e.preventDefault();
            var sectionType = $(this).data('section-type');
            openSectionModal(null, sectionType);
        });

        // Edit section
        $(document).on('click', '.editSectionBtn', function() {
            var sectionItem = $(this).closest('.section-item');
            var sectionId = sectionItem.data('id');
            var sectionType = sectionItem.find('.section-type-badge').text();
            openSectionModal(sectionId, sectionType);
        });

        // Delete section
        $(document).on('click', '.deleteSectionBtn', function() {
            var sectionItem = $(this).closest('.section-item');
            var sectionId = sectionItem.data('id');

            if(confirm('Are you sure you want to delete this section?')) {
                $.ajax({
                    url: '/admin/page-section/' + sectionId,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        sectionItem.remove();
                    },
                    error: function(xhr) {
                        alert('Error deleting section');
                    }
                });
            }
        });

        // Duplicate section
        $(document).on('click', '.duplicateSectionBtn', function() {
            var sectionItem = $(this).closest('.section-item');
            var sectionId = sectionItem.data('id');

            $.ajax({
                url: '/admin/page-section/' + sectionId + '/duplicate',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    location.reload();
                },
                error: function(xhr) {
                    alert('Error duplicating section');
                }
            });
        });

        // Open section modal
        function openSectionModal(sectionId, sectionType) {
            $('#sectionId').val(sectionId);
            $('#sectionType').val(sectionType);
            
            var fields = getSectionFields(sectionType);
            $('#sectionFields').html(fields);
            
            // Initialize CKEditor if needed
            if(sectionType === 'rich_text') {
                setTimeout(function() {
                    ClassicEditor.create(document.querySelector('#contentEditor'));
                }, 100);
            }
            
            $('#sectionModal').modal('show');
        }

        // Get section fields based on type
        function getSectionFields(sectionType) {
            var fields = '';
            
            switch(sectionType) {
                case 'heading':
                case 'sub_heading':
                    fields = `
                        <div class="form-group">
                            <label>Heading Text</label>
                            <input type="text" class="form-control" id="sectionTitle" placeholder="Enter heading">
                        </div>
                    `;
                    break;
                case 'paragraph':
                    fields = `
                        <div class="form-group">
                            <label>Paragraph Content</label>
                            <textarea class="form-control" id="sectionContent" rows="5" placeholder="Enter paragraph"></textarea>
                        </div>
                    `;
                    break;
                case 'rich_text':
                    fields = `
                        <div class="form-group">
                            <label>Rich Content</label>
                            <textarea id="contentEditor" rows="10"></textarea>
                        </div>
                    `;
                    break;
                case 'single_image':
                    fields = `
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" id="sectionImage" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label>Alt Text</label>
                            <input type="text" class="form-control" id="sectionTitle" placeholder="Image alt text">
                        </div>
                    `;
                    break;
                case 'two_images':
                    fields = `
                        <div class="form-group">
                            <label>First Image</label>
                            <input type="file" class="form-control" id="sectionImage" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label>Second Image</label>
                            <input type="file" class="form-control" id="sectionImage2" accept="image/*">
                        </div>
                    `;
                    break;
                case 'image_gallery':
                    fields = `
                        <div class="form-group">
                            <label>Gallery Images (Multiple)</label>
                            <input type="file" class="form-control" id="sectionGallery" accept="image/*" multiple>
                        </div>
                    `;
                    break;
                case 'video':
                case 'youtube_embed':
                    fields = `
                        <div class="form-group">
                            <label>Video URL</label>
                            <input type="url" class="form-control" id="sectionVideoUrl" placeholder="https://youtube.com/watch?v=...">
                        </div>
                    `;
                    break;
                case 'button':
                    fields = `
                        <div class="form-group">
                            <label>Button Text</label>
                            <input type="text" class="form-control" id="sectionButtonText" placeholder="Click Here">
                        </div>
                        <div class="form-group">
                            <label>Button Link</label>
                            <input type="url" class="form-control" id="sectionButtonLink" placeholder="https://...">
                        </div>
                    `;
                    break;
                case 'download_file':
                    fields = `
                        <div class="form-group">
                            <label>File</label>
                            <input type="file" class="form-control" id="sectionFile" accept=".pdf,.doc,.docx">
                        </div>
                        <div class="form-group">
                            <label>File Label</label>
                            <input type="text" class="form-control" id="sectionTitle" placeholder="Download PDF">
                        </div>
                    `;
                    break;
                case 'quote':
                    fields = `
                        <div class="form-group">
                            <label>Quote Text</label>
                            <textarea class="form-control" id="sectionContent" rows="3" placeholder="Enter quote"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Author</label>
                            <input type="text" class="form-control" id="sectionTitle" placeholder="Author name">
                        </div>
                    `;
                    break;
                case 'call_to_action':
                    fields = `
                        <div class="form-group">
                            <label>CTA Heading</label>
                            <input type="text" class="form-control" id="sectionTitle" placeholder="Ready to get started?">
                        </div>
                        <div class="form-group">
                            <label>CTA Description</label>
                            <textarea class="form-control" id="sectionContent" rows="3" placeholder="Contact us today..."></textarea>
                        </div>
                        <div class="form-group">
                            <label>Button Text</label>
                            <input type="text" class="form-control" id="sectionButtonText" placeholder="Contact Us">
                        </div>
                        <div class="form-group">
                            <label>Button Link</label>
                            <input type="url" class="form-control" id="sectionButtonLink" placeholder="/contact">
                        </div>
                    `;
                    break;
                default:
                    fields = `
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" id="sectionTitle">
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea class="form-control" id="sectionContent" rows="5"></textarea>
                        </div>
                    `;
            }
            
            return fields;
        }

        // Save section
        $('#saveSectionBtn').click(function() {
            var sectionId = $('#sectionId').val();
            var sectionType = $('#sectionType').val();
            var pageId = $('#pageId').val();
            
            var formData = new FormData();
            formData.append('page_id', pageId);
            formData.append('section_type', sectionType);
            
            // Add common fields
            if($('#sectionTitle').val()) {
                formData.append('title', $('#sectionTitle').val());
            }
            if($('#sectionContent').val()) {
                formData.append('content', $('#sectionContent').val());
            }
            if($('#sectionVideoUrl').val()) {
                formData.append('video_url', $('#sectionVideoUrl').val());
            }
            if($('#sectionButtonText').val()) {
                formData.append('button_text', $('#sectionButtonText').val());
            }
            if($('#sectionButtonLink').val()) {
                formData.append('button_link', $('#sectionButtonLink').val());
            }
            
            // Add file fields
            if($('#sectionImage')[0].files[0]) {
                formData.append('image', $('#sectionImage')[0].files[0]);
            }
            if($('#sectionImage2')[0].files[0]) {
                formData.append('image2', $('#sectionImage2')[0].files[0]);
            }
            if($('#sectionFile')[0].files[0]) {
                formData.append('file', $('#sectionFile')[0].files[0]);
            }
            if($('#sectionGallery')[0].files.length > 0) {
                for(var i = 0; i < $('#sectionGallery')[0].files.length; i++) {
                    formData.append('gallery[]', $('#sectionGallery')[0].files[i]);
                }
            }
            
            // Handle CKEditor content
            if(sectionType === 'rich_text' && window.editor) {
                formData.append('content', window.editor.getData());
            }
            
            var url = sectionId ? '/admin/page-section/' + sectionId : '/admin/page-section';
            var method = sectionId ? 'PUT' : 'POST';
            
            $.ajax({
                url: url,
                type: method,
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#sectionModal').modal('hide');
                    location.reload();
                },
                error: function(xhr) {
                    alert('Error saving section');
                }
            });
        });
    </script>
@endsection
