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
            <a href="{{ route('projects.create') }}"
                class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">
                Create New
            </a>
        </div>
    </div>
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="bd bd-gray-300 rounded table-responsive">
                @php
                    $headers = [
                        '#',
                        'Project',
                        'Client',
                        'Date',
                        'Project Value',
                        'Category',
                        'Status',
                        'Action'
                    ];
                @endphp
                <table class="table mg-b-0 project-table">
                    <thead class="thead-colored thead-light">
                        <tr>
                            @foreach ($headers as $item)
                                <th scope="col-lg-12" @if (end($headers) == $item)
                                    width="20%" class="text-center"
                                @endif>{{$item}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sl = 1;
                            $status = [ 'Published', 'Draft', 'Pending' ];
                            $status_color = [ 'success', 'warning', 'danger' ];
                        @endphp

                        @foreach ($list_items as $item)
                            <x-project-box :project="$item" :sl="$sl" :status="$status" :color="$status_color"/>
                            @php
                                $sl++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
@endsection
