@extends('admin.layouts.app')

@section('body')
    <div class=" br-pagetitle d-flex align-items-center justify-content-between">
        <div class="left-side br-pagetitle ">
            <i class="icon ion-ios-home-outline"></i>
            <div>
                <h4>{{ session()->get('document_title') }}</h4>
                <p class="mg-b-0"></p>
            </div>
        </div>
        <div class="right-side">
            <a href="" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-toggle="modal"
                    data-target="#addSubCategory">
                    Add Product</a>

                <div class="modal fade" id="addSubCategory">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header pd-y-20 pd-x-25">
                                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add New Product</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('products.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Title</label>
                                                <input type="text" class="form-control" name="title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Price</label>
                                                <input type="text" class="form-control" name="price">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Sub Category</label>
                                                <select class="form-control" aria-label="Select Category"
                                                    name="subcategory_id">
                                                    <option value="0">Open this select menu</option>
                                                    @foreach ($subcategories as $item)
                                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Description</label>
                                                <textarea id="product_desc" class="form-control" name="description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="img-prew mg-b-15">
                                                <label class="form-control-label d-block">Preview Thumbnail</label>
                                                <img src="{{ asset('storage/assets/img/img11.jpg') }}" class="img-fluid" width="120px" id="preview-img" alt="">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label">Thumbnail</label>
                                                <input type="file" name="thumbnail" class="form-control" 
                                                    onchange="document.getElementById('preview-img').src = window.URL.createObjectURL(this.files[0])">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pb-5 pt-3">
                                        <div class="col d-flex align-items-center justify-content-center">
                                            <button type="button" class="btn btn-secondary" style="margin-right: 15px"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="br-section-label">{{ 'Categories' }}</h6>
            <p class="br-section-text">{{ 'List of all categories' }}</p>

            <div class="bd bd-gray-300 rounded table-responsive">
                <table class="table mg-b-0">
                    <thead class="thead-colored thead-light">
                        <tr>
                            <th scope="row" width="8%" class="text-center">#</th>
                            <th scope="row" width="22%" class="text-center">Title</th>
                            <th scope="row" width="20%" class="text-center">Category</th>
                            <th scope="row" width="15%" class="text-center">Price</th>
                            <th scope="row" width="25%" class="text-center">Description</th>
                            <th scope="row" width="10%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($list_items as $item_dt)
                            <tr class="text-center">
                                <th scope="row">{{ $i++ }}</th>
                                <td>
                                    <div class="d-flex">
                                        <div class="avatar avatar-sm mr-3 align-self-center">
                                            <img src="{{ asset('storage/uploads/products/' . $item_dt->thumbnail) }}" class="img-fluid" 
                                                style="max-width: 180px; border-radius: 10px; margin-right: 10px;"alt="">
                                        </div>
                                        <div>
                                            <div>{{ $item_dt->title }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    {{ $item_dt->subcategory->title }}
                                </td>
                                <td>
                                    Bdt. {{ $item_dt->price }}
                                </td>
                                <td>
                                    @php
                                        echo $item_dt->description;
                                    @endphp
                                </td>
                                <td class="d-flex align-items-center justify-content-center">
                                    <a href="" class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#editProduct-{{ $item_dt->id }}">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <div class="modal fade" id="editProduct-{{ $item_dt->id }}">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                            <div class="modal-content text-left">
                                                <div class="modal-header pd-y-20 pd-x-25">
                                                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Update Product :: {{ $item_dt->id }}
                                                    </h6>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('products.update', $item_dt->id) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Title</label>
                                                                    <input type="text" class="form-control" name="title"
                                                                        value="{{ $item_dt->title }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Price</label>
                                                                    <input type="text" class="form-control" name="price"
                                                                        value="{{ $item_dt->price }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Sub Category</label>
                                                                    <select class="form-control" aria-label="Default select example"
                                                                        name="subcategory_id">
                                                                        <option value="0">Open this select menu</option>
                                                                        @foreach ($subcategories as $item)
                                                                            <option value="{{ $item->id }}" @if($item_dt->subcategory_id == $item->id) selected @endif>{{ $item->title }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="img-prew mg-b-15">
                                                                    <label class="form-control-label d-block">Preview Thumbnail</label>
                                                                    <img src="{{ asset('storage/assets/img/img11.jpg') }}" class="img-fluid" width="120px" id="preview-img" alt="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Thumbnail</label>
                                                                    <input type="file" name="thumbnail" class="form-control" 
                                                                        onchange="document.getElementById('preview-img').src = window.URL.createObjectURL(this.files[0])">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Description</label>
                                                                    <textarea id="product_desc_edit" class="form-control" name="description">{{ $item_dt->description }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <form action="{{ route('products.destroy', $item_dt->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="right gap-items-2">
                                            <button class="btn btn-danger btn-sm ml-4" name="submit" type="submit"
                                                id="submitDeletebrand"><i class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
