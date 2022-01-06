@extends('adminlayout.master')

@section('content')
<style>
    .imagePreview {
width: 100%;
height: 180px;
background-position: center center;
background: url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
background-color: #fff;
background-size: cover;
background-repeat: no-repeat;
display: inline-block;
box-shadow: 0px -3px 6px 2px rgba(0, 0, 0, 0.2);
}

.btnn-primary {
background-color: #7d4166;
color: #fff;
display: block;
border-radius: 0px;
box-shadow: 0px 4px 6px 2px rgba(0, 0, 0, 0.2);
margin-top: -5px;
}
.btnn-primary:hover{
color: #fff;
}

.imgUp {
margin-bottom: 15px;
}

.del {
position: absolute;
top: 0px;
right: 11px;
width: 30px;
height: 30px;
text-align: center;
line-height: 30px;
background-color: rgba(68, 55, 55, 0.233);
cursor: pointer;
}

.imgAdd {
width: 30px;
height: 30px;
border-radius: 50%;
background-color: #a33839;
color: #fff;
box-shadow: 0px 0px 2px 1px rgba(0, 0, 0, 0.2);
text-align: center;
line-height: 30px;
margin-top: 0px;
cursor: pointer;
font-size: 15px;
padding: 0;
}

.imgRemove {
width: 30px;
height: 30px;
border-radius: 50%;
background-color: #E74C3C;
color: #fff;
box-shadow: 0px 0px 2px 1px rgba(0, 0, 0, 0.2);
text-align: center;
line-height: 30px;
margin-top: 0px;
cursor: pointer;
font-size: 15px;
}

.abc {
position: relative;
}

.image {
opacity: 1;
display: block;
width: 100%;
height: auto;
transition: .5s ease;
backface-visibility: hidden;
}

.middle {
transition: .5s ease;
opacity: 0;
position: absolute;
top: 50%;
left: 16%;
transform: translate(-50%, -50%);
-ms-transform: translate(-50%, -50%);
text-align: center;
}

.abc:hover .image {
opacity: 0.3;
}

.abc:hover .middle {
opacity: 1;
}

.text {
background-color: red;
color: white;
font-size: 25px;
padding: 8px 15px;
}
</style>
    <div class="content-wrapper">
        <section class="content">
            <h1>Edit Your Product</h1>
            <div class="row">
                <div class="col-12">
                    <div class="card-body">
                        <form method="POST" id="updateproductform" action="{{ route('admin.productupdate') }}"
                            enctype="multipart/form-data">
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
                            <div class="form-group row" id="dltimg">
                                <label for="Image" class="col-form-label">Image :</label><span class="errorimage" style="color: red"></span><br>
                                <input type="file" class="form-control uploadFile" name="image[]" id="imgInp" multiple>
                              
                                <i class="fa fa-plus imgAdd"></i>

                                @error('image')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                                <div class="imageclass">
                                    @foreach ($img as $images)
                                        <img src=" {{ $images->image }}" alt="" height="100px">
                                        <img src="" id="blah"  alt="" height="100px">
                                        <button type="button" class="btn btn-light deleteimage" data-id="{{ $images->id }}"
                                            id=""><i style="color:red" class="fa fa-trash"></i></button>
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

            var count = 1;
       
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                    $('#blah').show();

                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function() {
            readURL(this);
        })

        $(document).on("click", ".del", function() {
            console.log(count);
                //  to remove card
                if (count < 3) {
                    // return alert("select atleast one image!")
                    // return false;

                }
                if (count > 5) {
                    alert('3');

                    return alert("No there more images!")
                }
                $(this).parent().remove();
                count--;

            });
            $(function() {
                $(document).on("change", ".uploadFile", function() {
                    var uploadFile = $(this);
                    var files = !!this.files ? this.files : [];
                    if (!files.length || !window.FileReader) return;

                    if (/^image/.test(files[0].type)) {
                        var reader = new FileReader();
                        reader.readAsDataURL(files[0]);

                        reader.onloadend = function() {
                            uploadFile.closest(".imgUp").find('.imagePreview').css("background-image",
                                "url(" + this.result + ")");
                        }
                    }
                });
                });


                $(".imgAdd").click(function() {
                    if (count >= 5) {
                        return alert("No there more images!")
                    }

                    $(this).closest(".row").find('.imgAdd').before(
                        '<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btnn-primary">Upload<input type="file" name="image[]" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>'
                        );
                    count++;
                });


        $(document).on("click", '.deleteimage', function() {
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
                        id: id
                    },
                    success: function(response) {
                        toastr.error('Image Delete Successfully');
                        location.reload();
                    }
                });
            }
        });

                $(document).ready(function(){
                        $("#updateproductform").validate({
                            rules: {
                                'title': {
                                    required: true
                                },
                                'description': {
                                    required: true
                                },
                                'price': {
                                    required: true
                                },
                                // 'image[]':{required:true},
                            },
                            messages: {
                                'title': {
                                    required: "Please Enter Title..!!!"
                                },
                                'description': {
                                    required: "Please Enter Description..!!!"
                                },
                                'price': {
                                    required: "Please Enter Price..!!!"
                                },
                                // 'image[]':{required:"Please Choose Image..!!!"},
                            },
                            
                        });
                })

    </script>
@endpush
