@extends('layouts.dashboard')


@section('content')
    <div class="add_post">
        <button class="btn btn-primary"><a href="{{url('admin/posts/create')}}">Add post</a></button>
    </div>

    <div class="pagination">
        {!!$posts->render()!!}
    </div>

    <table class="table table-striped table-hover ">
        <thead>
            <tr class="info">
                <th>titre</th>
                <th>Extrait</th>
                <th>catégorie</th>
                <th>tag(s)</th>
                <th>date</th>
                <th>publié</th>
                <th>Editer</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>
                        <strong><a href="{{ url('admin/posts', $post->id) }}">{{ $post->title }}</a></strong>
                    </td>

                    <td>
                        <p>{{ $post->excerpt }}</p>
                    </td>

                    <td>
                        @if($post->category)
                            <a href="#">{{ $post->category->title }}</a>
                        @endif
                    </td>

                    <td>
                        @if($post->tags)
                            @foreach($post->tags as $tag)
                                <a>{{ $tag->name }}</a><br>
                            @endforeach
                        @endif
                    </td>

                    <td>
                        <p>{{ $post->published_at }}</p>
                    </td>

                    <td>
                        @if($post->status == 1)
                            <p>Oui</p>
                        @else
                            <p>Non</p>
                        @endif
                    </td>


                    <td>
                         <button class="btn btn-primary" type="button" name="button"><a href="{{ url('admin/posts/'. $post->id.'/edit') }}">Editer</a></button>
                    </td>


                    <td>
                        {!! Form::open(['url'=>'admin/posts/'.$post->id, 'method'=>'DELETE', 'class'=>'form-delete']) !!}
                           <button class="btn btn-warning btn-modal" type="button" name="button">Suprimer</button>

                           <div class="modal">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h4 class="modal-title">Confirmer ?</h4>
                                  </div>
                                  <div class="modal-body">
                                    {!! Form::submit('Supprimer !', ['class'=>'btn btn-danger']) !!}
                                    <button class="btn btn-default btn-cancel" type="button">Annuler</button>
                                  </div>
                                </div>
                              </div>
                            </div>


                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pagination">
        {!!$posts->render()!!}
    </div>
@endsection


@section('footer')
    <h2>Footer</h2>
@endsection



