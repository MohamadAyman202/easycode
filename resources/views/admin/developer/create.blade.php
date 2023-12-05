@extends('layouts.master')
@php $title = 'Create Developer'; @endphp
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">

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
    Developer
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                    <div class="card">
                        <form action="{{ route('developer.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-lg-6 col-sm-6 col-lx-3">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Name</label>
                                            <input type="text" name="name" id="name"
                                                class="form-control @error('name') is-invalid @enderror" placeholder="Name"
                                                aria-describedby="helpId">
                                            @error('name')
                                                <small id="helpId" class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6 col-sm-6 col-lx-3">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Meta Description</label>
                                            <input type="text" name="meta_description" id="meta_description"
                                                class="form-control @error('meta_description') is-invalid @enderror"
                                                placeholder="Meta Description" aria-describedby="helpId" maxlength="80">
                                            @error('meta_description')
                                                <small id="helpId" class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                                        rows="10" placeholder="Description"></textarea>
                                    @error('description')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label @error('job_title') is-invalid @enderror">Job
                                        name</label>
                                    <select class="form-control" name="job_title" id="job_title">
                                        <option value="Frontend Developer">Frontend Developer</option>
                                        <option value="Backend Laravel">Backend Laravel</option>
                                        <option value="Full Stack Developer">Full Stack Developer</option>
                                    </select>
                                    @error('job_title')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Skills</label>
                                    <div class="text-wrap">
                                        <div class="example">
                                            <div class="form-group">
                                                <input type="text" data-role="tagsinput" name="skills"
                                                    class="form-control @error('skills') is-invalid @enderror"
                                                    placeholder="Skills">
                                            </div>
                                            @error('skills')
                                                <small id="helpId" class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Image</label>
                                    <input type="file" name="image" id="image"
                                        class="form-control @error('image') is-invalid @enderror"
                                        aria-describedby="helpId">
                                    @error('image')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-md mt-3">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endsection
        @section('js')
            <!--Internal  Datepicker js -->
            <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
            <!-- Internal Select2 js-->
            <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
            <!-- Internal Jquery.mCustomScrollbar js-->
            <script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
            <!-- Internal Input tags js-->
            <script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
            <!--Internal  Clipboard js-->
            <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
            <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
            <!-- Internal Prism js-->
            <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>
        @endsection
