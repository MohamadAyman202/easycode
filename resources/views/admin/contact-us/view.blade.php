@extends('layouts.master')
@php $title = 'Contact us'; @endphp
@section('css')
@endsection
@section('title')
    {{ $title }}
@endsection
@section('pages')
    {{ $title }}
@endsection
@section('empty')
    Message
@endsection
@section('content')
    <div class="row">
        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="p mb-3">
                        <h2>Hello Admin</h2>
                    </div>
                    <div class="clients">
                        <p style="font-size: 16px" class="mb-1">Client Name: {{ $contact_us->name }}</p>
                        <p style="font-size: 16px" class="mb-1">Client Email: {{ $contact_us->email }}</p>
                        <p style="font-size: 16px">Client Phone: {{ $contact_us->phone }}</p>
                    </div>
                    <div class="message">
                        <label for="" class="form-label">Message</label>
                        <p style="font-size: 20px">{{ $contact_us->message }}</p>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>
@endsection
@section('js')
@endsection
