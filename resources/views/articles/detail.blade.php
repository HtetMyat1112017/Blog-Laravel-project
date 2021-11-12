@extends('layouts.app')
@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-12 col-md-6">

              <div class="card mb-2">


                  <div class="card-body">
                      <h5 class="card-title">{{$article->title}}</h5>
                      <div class="card-subtitle text-muted small mb-4">
                          {{$article->created_at->diffForHumans()}} |
                          Category: {{$article->category->name}}
                      </div>
                      <p class="card-text text-justify">
                          {{$article->body}}
                      </p>
                    <div class="mb-3">

                        <a href="{{route('article.destroy',$article->id)}}" class="btn btn-sm btn-danger">Delete</a>
                        <a href="{{route('article.edit',$article->id)}}" class="btn btn-sm btn-warning">Edit</a>
                    </div>

                      <form action="{{route('comment.store')}}" method="post">
                          @csrf


                          <div class="form-group">
                              <textarea name="comment"  id="" class="form-control" cols="30" rows="3" >Enter a Comment
                              </textarea>
                          </div>
                          <input type="hidden" name="article_id"
                                 value="{{ $article->id }}">
                          <button class="btn btn-primary px-4 float-right">Save</button>
                      </form>
                  </div>
              </div>
              <ul class="list-group">
                  <li class="list-group-item active">
                      <b>Comments ({{ count($article->comments) }})</b>
                  </li>
                  @foreach($article->comments as $comment)
                      <li class="list-group-item">
                          {{ $comment->content }}
                          <a href="{{route("comment.delete",$comment->id)}}" class="btn btn-sm btn-danger float-right">delete</a>
                      </li>




                  @endforeach
              </ul>
          </div>
      </div>
  </div>


@endsection
