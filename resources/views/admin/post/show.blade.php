@extends('layouts.app')
@section('content')
    <article class="container">
      <div class="row">
        <section class="col-md-12">
          <h1>{{ $post->title }}</h1>
          <div>
              <span class='label label-info'>
                <strong>Autor:</strong> {{ $post->user->name }}
              </span>
              <span class='label label-info'>
                  <strong>Data:</strong> @dateBr($post->created_at)
              </span>
            </div>
        </section>
        <section class='col-md-8'>
          {{ $post->description }}
        </section>
      </div>
    </article>
@endsection