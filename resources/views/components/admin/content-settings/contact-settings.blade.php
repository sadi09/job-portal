<div class="col-lg-12 col-sm-6 wow fadeInUp flex " data-wow-delay="0.1s"
     style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">

    <h3>Edit Content
    </h3>


    <form id="save-form" action="{{route('contact-settings.update', $contact->id)}}" method="post">
        @csrf
        @method('PATCH')
        <div class="modal-body">

            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" id="titile" name="title" value="{{$contact->title}}"
                       placeholder="Title">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Content</label>
                <textarea id="summernote" name="content">
                    {{$contact->content}}
                </textarea>

            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Contact us form receiving email</label>
                <input type="text" class="form-control" id="receive_email" name="receive_email"
                       value="{{$contact->receive_email}}"
                       placeholder="Title">
            </div>


            <div class="form-group">
                <label for="exampleInputEmail1">Embedded Location link:</label>
                <input type="text" class="form-control" id="location_embed_link" name="location_embed_link"
                       value="{{$contact->location_embed_link}}"
                       placeholder="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd">
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </div>

    </form>
</div>



