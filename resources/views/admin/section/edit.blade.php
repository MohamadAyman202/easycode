@extends('layouts.master')
<?php $title = 'Create Section'; ?>
@section('pages')
    {{ $title }}
@endsection
@section('empty')
    Section
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
                    <form action="{{ route('sections.update', $section->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="" class="form-label">Section Name</label>
                            <input type="text" name="title" id="title"
                                class="form-control @error('title') is-invalid @enderror" placeholder="Section Name"
                                aria-describedby="helpId" value="{{ $section->title }}">
                            @error('title')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for=""
                                class="form-label @error('description') is-invalid  @enderror">Description</label>
                            <textarea class="form-control" name="description" id="" rows="10" placeholder="Description">{{ $section->description }}</textarea>
                        </div>
                        @isset($section->images[0])
                            <img src="{{ asset($section->images[0]->image) }}" class="img-fluid rounded-top p-2 border mb-3"
                                style="width:150px;height:150px"alt="">
                            <img src="{{ asset($section->images[1]->image) }}"
                                class="img-fluid rounded-top p-2 border mb-3 mr-1" style="width:150px;height:150px"alt="">
                        @endisset
                        <div class="mb-3">
                            <label for="" class="form-label">Choose file</label>
                            <input type="file" class="form-control" name="image[]" id="image"
                                aria-describedby="fileHelpId" multiple>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-md">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
