@if($errors->any())
   @php ($post = (object) old())
@endif
<div class="row">
  <section class="col-md-8">

    @include('layouts.message')

    <label for="">Titulo</label>
    <input type="text" name="title" class="form-control" placeholder="Digite um Titulo"
    value="@isset($post->title){{$post->title}}@endisset">
    <label for="">Texto</label>
    <textarea name="description" class="form-control" rows='10'>@isset($post->description){{$post->description}}@endisset</textarea>

  </section>

  @if(isset($post))
    <section class='col-md-4'>
      <p>
        <span class="badge badge-info">
          Autor: {{ $post->user->name }}
        </span>
        <span class="badge badge-info">
            Data: @dateBr($post->created_at) - @hora($post->created_at)
        </span>
      </p>
    </section>
  @endif
</div>
