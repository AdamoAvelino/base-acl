@extends('layouts.app')

@section('content')
<section class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <div class="card bg-danger text-white">
                <div class="card-header text-right">
                    <a href='{{ url("/admin/post") }}' class='label label-danger' style='display: inline-block'>
                        Visualizar Post
                        <span class='badge badge-light'> {{$posts}} </span>
                    </a>
                </div>
                <div class="card-body">
                    <p class='text-center'>
                        <span class='title-panel'>
                            Posts
                        </span>
                        <i class="fas fa-newspaper menu-icon"></i><br>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

