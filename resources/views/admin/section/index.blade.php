@extends('layouts.master')
<?php $title = 'Sections'; ?>
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <!---Internal Owl Carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <!---Internal  Multislider css-->
    <link href="{{ URL::asset('assets/plugins/multislider/multislider.css') }}" rel="stylesheet">
    <!--- Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('pages')
    {{ $title }}
@endsection
@section('empty')
    Dashboard
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('sections.create') }}" class="btn btn-primary btn-md mb-3">Create Section</a>
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">Title</th>
                                    <th class="wd-20p border-bottom-0">Description</th>
                                    <th class="wd-15p border-bottom-0">Images</th>
                                    <th class="wd-10p border-bottom-0">Created At</th>
                                    <th class="wd-25p border-bottom-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($sections as $section)
                                    <?php $i++; ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $section->title }}</td>
                                        <td>{{ $section->description }}</td>
                                        <td><img src="{{ $section->images[rand(0, 1)]->image }}"width="75" height="75"
                                                class="p-1" alt=""></td>
                                        <td>{{ $section->created_at }}</td>
                                        <td>
                                            <a href="{{ route('sections.edit', $section->id) }}"
                                                class="btn btn-warning btn-sm" title="Edit">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                            <a class="btn ripple btn-danger btn-sm" data-target="#scrollmodal"
                                                data-toggle="modal" href=""><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <!-- Scroll with content modal -->
                                    <div class="modal" id="scrollmodal">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Scrolling With Content Modal</h6><button
                                                        aria-label="Close" class="close" data-dismiss="modal"
                                                        type="button"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form action="{{ route('sections.destroy', $section->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <div class="modal-body">
                                                        <p class="text-danger text-center" style='font-size:25px'>?Are You
                                                            Sure
                                                            Delete</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn ripple btn-danger" type="submit"
                                                            type="button">Delete
                                                        </button>
                                                        <button class="btn ripple btn-secondary" data-dismiss="modal"
                                                            type="button">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Scroll with content modal -->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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

    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
@endsection
