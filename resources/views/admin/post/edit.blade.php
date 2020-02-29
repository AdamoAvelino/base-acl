@extends('layouts.app')
@section('content')
  <section class="container">
    <form class="form-group" method='post' action='{{route("admin.post.delete", $post->id)}}' id='delete'>
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type='hidden' name='id' value='{{$post->id}}'>
    </form>

    <form class="form-group" method='post' action='{{ route("admin.post.update", $post->id)}}'>
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <input type="hidden" name='id' value='{{$post->id}}'>
      <input type="hidden" name='user_id' value='{{$post->user_id}}'>

      @include('admin.post.formulario')

      <div class="row" style='margin-top: 10px'>
        <div class="col-md-8">
          <button class='btn btn-success btn-sm'>
              <i class="fas fa-save"></i>
          </button>
          <button class='btn btn-danger btn-sm' form='delete'>
              <i class="fas fa-trash"></i>
          </button>
        </div>
      </div>

    </form>
  </section>
@endsection