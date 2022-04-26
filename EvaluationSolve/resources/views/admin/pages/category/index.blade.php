@extends('ftsadmin.layouts.app')

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
                Create New</a>

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
                            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="row mg-b-3">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Category Name</label>
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mg-b-3">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Status</label>
                                            <select class="form-control" name="status">
                                                <option selected="">Open this select menu</option>
                                                <option value="1">Published</option>
                                                <option value="2">Draft</option>
                                                <option value="3">Pending</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mg-b-3">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Parent Category</label>
                                            <select class="form-control" name="parent_id">
                                                <option selected="" value="0">Open this select menu</option>
                                                @foreach ($list_items as $item)
                                                    @if ($item['parent_id'] == 0)
                                                        <option value="{{ $item['id'] }}">{{ $item['name'] }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mg-b-3">
                                    <div class="col-lg-12">
                                        <div class="custom-file">
                                            <label class="custom-file-label">Image (optional)</label>
                                            <input type="file" class="custom-file-input" name="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mg-b-3">
                                    <div class="col-lg-12">
                                        <div class="custom-file">
                                            <label class="custom-file-label">Icon (optional)</label>
                                            <input type="file" class="custom-file-input" name="icon">
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
            {{-- <p class="br-section-text">Using the most basic table markup.</p> --}}

            @php
                $headers = ['#', 'Name', 'Parent', 'Status', 'Action'];
            @endphp

            <div class="bd bd-gray-300 rounded table-responsive">
                <x-table :headers="$headers" :data="$list_items" />
            </div>
        </div>
    </div>
@endsection
