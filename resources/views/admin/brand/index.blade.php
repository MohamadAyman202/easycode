@extends('layouts.master')
<?php $title = 'Brands'; ?>
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
        <div class="col-lg-12 col-md-12">
            <div class="card">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <div class="create-brands mb-3">
                        <a class="modal-effect btn btn-primary btn-md" data-effect="effect-just-me" data-toggle="modal"
                            href="#modaldemo8">Create
                            {{ $title }}</a>
                    </div>
                    <div class="row">
                        @foreach ($brands as $brand)
                            <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
                                <div class="card card-secondary ">
                                    <div class="card-body text-secondary w-100 p-0">
                                        <img src="{{ asset($brand->image) }}" alt="">
                                    </div>
                                    <div class="card-footer">
                                        <div class="update-brands text-center mb-1">
                                            <a class="modal-effect btn btn-outline-primary btn-md d-block"
                                                data-effect="effect-just-me" data-toggle="modal" href="#update">Update
                                                {{ $title }}</a>
                                        </div>
                                        <div class="delete-brands text-center">
                                            <a class="modal-effect btn btn-outline-danger btn-md d-block"
                                                data-effect="effect-just-me" data-toggle="modal" href="#delete">Delete
                                                {{ $title }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Update -->
                            <div class="modal" id="update">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content modal-content-demo bg-light">
                                        <div class="modal-header">
                                            <h6 class="modal-title text-dark">Update {{ $title }}</h6><button
                                                aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                                    aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form action="{{ route('brands.update', $brand->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <input type="file" class="form-control" name="image" accept="image/*"
                                                    required>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn ripple btn-primary" type="submit">Submit</button>
                                                <button class="btn ripple btn-secondary" data-dismiss="modal"
                                                    type="button">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal Update-->

                            <!-- Modal Delete -->
                            <div class="modal" id="delete">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content modal-content-demo bg-light">
                                        <div class="modal-header">
                                            <h6 class="modal-title text-dark">Delete {{ $title }}</h6><button
                                                aria-label="Close" class="close text-dark" data-dismiss="modal"
                                                type="button"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form action="{{ route('brands.destroy', $brand->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('delete')
                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <p class="text-danger" style="font-size: 2rem">Are You Sure Delete</p>
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
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Modal Create -->
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo bg-light">
                <div class="modal-header">
                    <h6 class="modal-title text-dark">Create {{ $title }}</h6><button aria-label="Close"
                        class="close text-dark" data-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('brands.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="file" class="form-control" name="image" accept="image/*" required>
                    </div>
                    <div class="modal-footer">
                        <button class="btn ripple btn-primary" type="submit">Submit</button>
                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Create-->

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
