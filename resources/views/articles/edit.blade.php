@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">

                <div class="card">
                    <div class="card-body">
                        <h3 class="" >Edit Article</h3>
                        <hr>
                        <form action="{{route('article.update',$article->id)}}"  method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Content</label>
                                <textarea name="body" id="" cols="30" name="body" rows="10" class="form-control" >
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Category</label>
                                <select  id="" name="category_id" class="form-control">
                                    @foreach($data as $datas)
                                        <option value="{{$datas['id']}}">{{$datas['name']}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <input type="submit" value="Update Article" class="btn btn-primary">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
