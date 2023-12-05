@extends('layouts.master')
@php $title = 'Edit Setting'; @endphp
@section('title')
    {{ $title }}
@endsection
@section('pages')
    {{ $title }}
@endsection
@section('empty')
    Setting
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
                <form action="{{ route('setting.update', $setting->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-6 col-lx-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">Site Name</label>
                                    <input type="text" name="site_name" id="site_name"
                                        class="form-control @error('site_name') is-invalid @enderror"
                                        placeholder="Site Name" aria-describedby="helpId" value="{{ $setting->site_name }}">
                                    @error('site_name')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-6 col-lx-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">Phone</label>
                                    <input type="text" name="phone" id="phone"
                                        class="form-control @error('phone') is-invalid @enderror" placeholder="Phone"
                                        aria-describedby="helpId" value="{{ $setting->phone }}">
                                    @error('phone')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-6 col-lx-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">Whatsapp</label>
                                    <input type="text" name="whatsapp" id="whatsapp"
                                        class="form-control @error('whatsapp') is-invalid @enderror" placeholder="Whatsapp"
                                        aria-describedby="helpId" value="{{ $setting->whatsapp }}">
                                    @error('whatsapp')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-6 col-lx-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">Facebook</label>
                                    <input type="url" name="facebook" id="facebook"
                                        class="form-control @error('facebook') is-invalid @enderror" placeholder="Facebook"
                                        aria-describedby="helpId" value="{{ $setting->facebook }}">
                                    @error('facebook')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-6 col-lx-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">Instagram</label>
                                    <input type="url" name="instagram" id="instagram"
                                        class="form-control @error('instagram') is-invalid @enderror"
                                        placeholder="Instagram" aria-describedby="helpId"
                                        value="{{ $setting->instagram }}">
                                    @error('instagram')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-6 col-lx-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">Api Token</label>
                                    <input type="text" name="api_token" id="api_token"
                                        class="form-control @error('api_token') is-invalid @enderror"
                                        placeholder="Api Token" aria-describedby="helpId" value="{{ $setting->api_token }}"
                                        disabled>
                                    @error('api_token')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-6 col-lx-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">Change Api Token</label>
                                    <select class="form-control" name="change_api_token" id="change_api_token">
                                        <option selected value="false">False</option>
                                        <option value="true">True</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-6 col-lx-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">Icon</label>
                                    <input type="file" name="icon" id="icon"
                                        class="form-control  @error('icon') is-invalid @enderror"
                                        aria-describedby="helpId">
                                    @error('icon')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-md">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
