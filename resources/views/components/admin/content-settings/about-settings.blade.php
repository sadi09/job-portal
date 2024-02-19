<div class="col-lg-12 col-sm-6 wow fadeInUp flex " data-wow-delay="0.1s"
     style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">

    <h3>Edit Content
    </h3>


    <form id="save-form" action="{{route('about-settings.update', $about->id)}}" method="post">
        @csrf
        @method('PATCH')
        <div class="modal-body">

            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" id="titile" name="title" value="{{$about->title}}"
                       placeholder="Title">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Content</label>
                <textarea id="summernote" name="content">
                    {{$about->content}}
                </textarea>

            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </div>

    </form>
</div>



