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
                data-target="#addCategory">
                Add Category</a>

            @if ($list_items->count() > 0)
                <a href="" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-toggle="modal"
                    data-target="#addSubCategory">
                    Add Sub Category</a>

                <div class="modal fade" id="addSubCategory">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header pd-y-20 pd-x-25">
                                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add New Category</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('subcategories.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Category Name</label>
                                                <input type="text" class="form-control" name="title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Parent Category</label>
                                                <select class="form-control" aria-label="Default select example"
                                                    name="category_id">
                                                    <option value="0">Open this select menu</option>
                                                    @foreach ($list_items as $item)
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
                                                <textarea id="subcat_description" class="form-control" name="description"></textarea>
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
            @endif


            <div class="modal fade" id="addCategory">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header pd-y-20 pd-x-25">
                            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add New Category</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Category Name</label>
                                            <input type="text" class="form-control" name="title">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Description</label>
                                            <textarea id="cat_description" class="form-control" name="description"></textarea>
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
                            <th scope="row" width="20%" class="text-center">Parent Category</th>
                            <th scope="row" width="40%" class="text-center">Description</th>
                            <th scope="row" width="10%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                            $status = ['Published', 'Draft', 'Pending'];
                            $status_color = ['success', 'warning', 'danger'];
                        @endphp
                        @foreach ($list_items as $item_dt)
                            <tr class="text-center">
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $item_dt->title }}</td>
                                <td>
                                    None
                                </td>
                                <td>
                                    @php
                                        echo $item_dt->description;
                                    @endphp
                                </td>
                                <td class="d-flex align-items-center justify-content-center">
                                    <a href="" class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#editCategory-{{ $item_dt->id }}">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <div class="modal fade" id="editCategory-{{ $item_dt->id }}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header pd-y-20 pd-x-25">
                                                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Update Category
                                                    </h6>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('categories.update', $item_dt->id) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Category title</label>
                                                                    <input type="text" class="form-control" name="title"
                                                                        value="{{ $item_dt->title }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Description</label>
                                                                    <textarea id="cat_description_edit" class="form-control" name="description">{{ $item_dt->description }}</textarea>
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

                                    <form action="{{ route('categories.destroy', $item_dt->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="right gap-items-2">
                                            <button class="btn btn-danger btn-sm ml-4" name="submit" type="submit"
                                                id="submitDeletebrand"><i class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @php
                                $sub_categories = $item_dt->subcategories;
                            @endphp
                            @if ($sub_categories->count() > 0)
                                @foreach ($sub_categories as $item)
                                    <tr class="text-center">
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            {{ $item->category->title }}
                                        </td>
                                        <td>
                                            @php
                                                echo $item->description;
                                            @endphp
                                        </td>
                                        <td class="d-flex align-items-center justify-content-center">
                                            <a href="" class="btn btn-warning btn-sm" data-toggle="modal"
                                                data-target="#editSubCategory-{{ $item->id }}">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <div class="modal fade" id="editSubCategory-{{ $item->id }}">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header pd-y-20 pd-x-25">
                                                            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Update
                                                                Category
                                                            </h6>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('subcategories.update', $item->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="form-group">
                                                                            <label class="form-control-label">Category
                                                                                title</label>
                                                                            <input type="text" class="form-control"
                                                                                name="title" value="{{ $item->title }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="form-group">
                                                                            <label class="form-control-label">Parent
                                                                                Category</label>
                                                                            <select class="form-control"
                                                                                aria-label="Default select example"
                                                                                name="category_id">
                                                                                <option value="0">Open this select menu
                                                                                </option>
                                                                                @foreach ($list_items as $item)
                                                                                    <option value="{{ $item->id }}"
                                                                                        @if ($item->category_id == $item_dt->id) selected @endif>
                                                                                        {{ $item->title }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="form-group">
                                                                            <label
                                                                                class="form-control-label">Description</label>
                                                                            <textarea id="subcat_description_edit" class="form-control" name="description">{{ $item->description }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <form action="{{ route('subcategories.destroy', $item->id) }}" method="POST">
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
                            @endif
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
