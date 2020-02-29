@extends('layouts.app')
@section('content')
  <section class="container">
    <form class="form-group" method='post' action="{{ route('admin.post.salvar') }}">
      {{ csrf_field() }}
      @include('admin.post.formulario')
      <div class="row" style='margin-top: 10px'>
        <div class="col-md-8">
          <button class='btn btn-success btn-sm'>
              <i class="fas fa-save"></i>
          </button>
        </div>
      </div>
    </form>
  </section>
@endsection