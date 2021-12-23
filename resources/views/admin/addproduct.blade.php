@extends('adminlayout.master')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <h1>Add Your Product</h1>
            <div class="row">
                <div class="col-12">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.productinsert') }}" id="form"
                            enctype="multipart/form-data">
                            @csrf
                            {{-- <input type="hidden" class="form-control watchid" name="watchid"> --}}
                            <div class="alert alert-success d-none" id="msg_div">
                                <span id="res_message"></span>
                            </div>
                            <div class="form-group">
                                <label for="Watch Brand" class="col-form-label">Watch Brand :</label>
                                <select class="form-control" name="watchbrand">
                                    <option value="">Select Watch-Brand</option>
                                    @foreach ($watchbrand as $watchbrands)
                                        <option value="{{ $watchbrands->id }}">
                                            {{ $watchbrands->name }}</option>
                                    @endforeach
                                </select>
                                @error('watchbrand')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Title" class="col-form-label">Title :</label>
                                <input type="text" class="form-control title" name="title">
                                @error('title')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Description" class="col-form-label">Description :</label><br>
                                <textarea name="description" class="form-control description" id="" cols="20"
                                    rows="5"></textarea>
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
                            </div>
                            <div class="form-group">
                                <label for="Price" class="col-form-label">Price :</label><br>
                                <input type="numeric" class="form-control price" name="price">
                                @error('price')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal"><a
                                        href="{{ route('admin.productdetail') }}">Back</a></button>
                                <button type="submit" class="btn btn-success">Add</button>
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
     
    </script>
@endpush
