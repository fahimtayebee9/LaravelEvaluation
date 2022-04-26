@extends('ftsadmin.layouts.app')

@section('body')
    <div class="br-pagebody" style="padding-top: 30px;">
        <div class="br-section-wrapper">
            <h6 class="br-section-label">{{ 'Add New Project' }}</h6>
            <p class="br-section-text">Insert Project details.</p>
            
            <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row ">
                    <div class="col">
                        <div class="form-group">
                            <label class="form-control-label">Project Name</label>
                            <input type="text" class="form-control" name="title"
                                value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="form-label">Client</label>
                            <input type="text" class="form-control" name="client">
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col">
                        <div class="form-group">
                            <label class="form-label">Live Link</label>
                            <input type="text" class="form-control" name="live_link">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="form-label">Github Link</label>
                            <input type="text" class="form-control" name="github_link">
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col">
                        <div class="form-group">
                        <label class="form-label">Category</label>
                        <select class="form-control" aria-label="Category Select" name="category_id">
                            <option selected="" value="0">Open this select menu</option>
                            @foreach ($categories as $item)
                                <option value="{{$item['id']}}">{{$item['name']}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select class="form-control" aria-label="Default select example" name="status">
                                <option selected="">Open this select menu</option>
                                <option value="0">Published</option>
                                <option value="1">Draft</option>
                                <option value="2">Pending</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" name="date">
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col">
                        <div class="form-group">
                            <label class="form-label">Thumbnail</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="thumbnail">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="form-label">Gallery Images</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="gallery_images" multiple>
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col">
                        <div class="form-group">
                            <label class="form-label">Short Description</label>
                            <textarea class="form-control" name="short_description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col">
                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <textarea id="summernote" class="form-control" name="description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 m-auto">
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection