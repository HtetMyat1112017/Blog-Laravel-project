@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                @if($errors->any())
                    <div class="alert alert-warning">
                        <ol>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ol>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <h3 class="" >Add Article</h3>
                        <hr>
                        <form action="{{route("article.store")}}"  method="post">
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
                                    @foreach($categories as $category)
                                        <option value="{{$category['id']}}">{{$category['name']}}</option>
                                    @endforeach
                                </select>
                            </div>

                               <input type="submit" value="Add Article" class="btn btn-primary">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
