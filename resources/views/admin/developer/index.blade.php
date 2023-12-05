@extends('layouts.master')
@php $title = 'Developer'; @endphp
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('title')
    {{ $title }}
@endsection
@section('pages')
    {{ $title }}
@endsection
@section('empty')
    Dashboard
@endsection
@section('content')
    <div class="row">
        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <a href="{{ route('developer.create') }}" class="btn btn-primary btn-md">Create
                        {{ $title }}</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">Title</th>
                                    <th class="border-bottom-0">image</th>

                                    <th class="border-bottom-0">Meta Description</th>
                                    <th class="border-bottom-0">skills</th>
                                    <th class="border-bottom-0">Created By</th>
                                    <th class="border-bottom-0">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 0; @endphp
                                @foreach ($developers as $developer)
                                    @php $i++; @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $developer->name }}</td>
                                        <td><img src="{{ asset($developer->image) }}" alt="{{ $developer->title }}"
                                                width="100" height="100"></td>
                                        <td>{{ $developer->meta_description }}</td>
                                        <td>{{ str_replace(',', ' ', $developer->skills()) }}</td>
                                        <td>{{ $developer->user->name }}</td>
                                        <td>
                                            <a href="{{ route('developer.edit', $developer->id) }}"
                                                class="btn btn-outline-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a class="modal-effect btn btn-outline-danger btn-sm"
                                                data-effect="effect-just-me" data-toggle="modal" href="#delete">
                                                <i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <!-- Modal Delete -->
                                    <div class="modal" id="delete">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content modal-content-demo bg-light">
                                                <div class="modal-header">
                                                    <h6 class="modal-title text-dark">Delete {{ $title }}</h6>
                                                    <button aria-label="Close" class="close text-dark" data-dismiss="modal"
                                                        type="button"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form action="{{ route('developer.destroy', $developer->id) }}"
                                                    method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('delete')
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <p class="text-danger" style="font-size: 2rem">Are You Sure
                                                                Delete</p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn ripple btn-danger" type="submit">Delete</button>
                                                        <button class="btn ripple btn-secondary" data-dismiss="modal"
                                                            type="button">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal Delete-->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
@endsection
