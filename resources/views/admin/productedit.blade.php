@extends('adminlayout.master')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <h1>Edit Your Product</h1>
            <div class="row">
                <div class="col-12">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.productupdate') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $query->id }}" name="id">
                            <div class="alert alert-success d-none" id="msg_div">
                                <span id="res_message"></span>
                            </div>
                            <div class="form-group">
                                <label for="Watch Brand" class="col-form-label">Watch Brand :</label>
                                <select class="form-control" name="watchbrand">
                                    <option value="">Select Watch-Brand</option>
                                    @foreach ($watchbrand as $watchbrands)
                                        <option value="{{ $watchbrands->id }}" @if ($watchbrands->id == $query->watch_id)
                                            selected
                                    @endif>
                                    {{ $watchbrands->name }}</option>
                                    @endforeach
                                </select>
                                @error('watchbrand')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Title" class="col-form-label">Title :</label>
                                <input type="text" class="form-control title" name="title" value="{{ $query->title }}">
                                @error('title')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Description" class="col-form-label">Description :</label><br>
                                <textarea name="description" class="form-control description" id="" cols="20"
                                    rows="5">{{ $query->description }}</textarea>
                                @error('description')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Image" class="col-form-label">Image :</label><br>
                                <input type="file" class="form-control image" name="image[]" multiple>
                                @error('image')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                                @php
                                    $img = explode(',', $query->image);
                                @endphp
                                <div>
                                    @foreach ($img as $images)
                                        <img src="{{ asset('images/' . $images) }}" id="imageshows" alt=""
                                            height="100px">
                                        <button type="button" class="btn btn-light" data-id="{{ $query->id }}"
                                            data-image={{ $images }} id="deleteimage"><i style="color:red"
                                                class="fa fa-minus"></i></button>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Price" class="col-form-label">Price :</label><br>
                                <input type="number" class="form-control price" name="price" value="{{ $query->price }}">
                                @error('price')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal"><a
                                        href="{{ route('admin.productdetail') }}">Back</a></button>
                                <button type="submit" class="btn btn-success">Update Product</button>
                                <div id="msgdisplay"></div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
@push('js')
    <script>
        $(document).on("click", '#deleteimage', function() {
            var image = $(this).data('image');
            var id = $(this).data('id');
            var element = this;
            if (confirm('Are You Sure Want To Delete This...???')) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    type: "POST",
                    url: "{{ route('admin.deleteimage') }}",
                    dataType: "json",
                    data: {
                        image: image,
                        id: id
                    },
                    success: function(response) {
                        toastr.error('Image Delete Successfully');
                    }
                });
            }
        });
    </script>
@endpush
