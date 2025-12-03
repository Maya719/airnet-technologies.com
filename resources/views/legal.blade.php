@extends('layouts.app')
@section('content')
    <section class="mt-4">
        <div class="container mt-5 mb-5">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="legal-box">
                        {!! $legal->content !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection