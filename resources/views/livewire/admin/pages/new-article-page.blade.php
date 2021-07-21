
<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Articles </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">New Article</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">New Article</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <x-alert />
                    <form action="{{route('article.save')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6" wire:ignore>
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" value="{{old('title')}}" name="title" class="form-control {{$errors->has('title')? 'is-invalid' : '' }}" placeholder="Article title">
                                    @error('title') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                </div>
                                <!-- /.form-group -->
                            </div>

                            <div class="col-md-6" wire:ignore>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Category</label>
                                    <input type="text" name="category" value="{{old('category')}}" class="form-control {{$errors->has('category')? 'is-invalid' : '' }}" placeholder="Article category">
                                    @error('category') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                </div>
                                <!-- /.form-group -->
                            </div>

                            <!-- /.col -->
                            <div class="col-md-12" wire:ignore>
                                <div class="form-group">
                                    <label>Author Name</label>
                                    <input type="author" name="author" value="{{old('author')}}"class="form-control {{$errors->has('author')? 'is-invalid' : '' }}" placeholder="Article arthor">
                                    @error('author') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>Image 1</label>
                                    <input type="file" name="image_1" wire:model.lazy="image_1" class="form-control {{$errors->has('image_1')? 'is-invalid' : '' }}">
                                    @if($image_1)
                                        <img src="{{$image_1->temporaryUrl()}}" class="img-fluid" />
                                    @endif
                                    @error('image_1') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                    <small wire:loading wire:target="image_1" class="form-text text-muted"><i class="fa fa-spin"><i class="fa fa-spinner"></i></i>&nbsp;&nbsp; Loading preview...</small>
                                </div>
                                <!-- /.form-group -->
                            </div>

                            <div class="col-12 col-sm-12" wire:ignore>
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea rows="5" name="content_1" id="summernote" placeholder="Content" class="form-control {{$errors->has('content_1')? 'is-invalid' : '' }}">{{old('content_1')}}</textarea>
                                    @error('content_1') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                </div>
                                <!-- /.form-group -->
                            </div>

                        </div>
                        <!-- /.row -->

                        <button wire:loading.remove wire:target="save" type="submit" class="btn btn-primary">Save article</button>
                        <button disabled wire:loading wire:target="save" type="submit" class="btn btn-primary"> Processing  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> </button>
                    </form>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Contact <a href="#">the system administrator if </a> you're not sure of what to do.
                </div>
                <!-- /.card -->

            </div>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>

