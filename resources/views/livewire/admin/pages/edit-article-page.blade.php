
<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Article </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.all-articles')}}">Articles</a></li>
                        <li class="breadcrumb-item active">Edit</li>
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
                    <h3 class="card-title">Edit Article</h3>

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
                    <form wire:submit.prevent="save">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" wire:model.lazy="title" class="form-control {{$errors->has('title')? 'is-invalid' : '' }}" placeholder="Article title">
                                    @error('title') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                </div>
                                <!-- /.form-group -->
                            </div>

                            <div class="col-md-6">
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Category</label>
                                    <input type="text" wire:model.lazy="category" class="form-control {{$errors->has('category')? 'is-invalid' : '' }}" placeholder="Article category">
                                    @error('category') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                </div>
                                <!-- /.form-group -->
                            </div>

                            <!-- /.col -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Author Name</label>
                                    <input type="author" wire:model.lazy="author" class="form-control {{$errors->has('author')? 'is-invalid' : '' }}" placeholder="Article arthor">
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
                                    <input type="file" wire:model.lazy="image_1" class="form-control {{$errors->has('image_1')? 'is-invalid' : '' }}">
                                    @if($image_1)
                                        <img src="{{$image_1->temporaryUrl()}}" class="img-fluid" />
                                    @else
                                        <img src="{{$old_image_1}}" class="img-fluid" />
                                    @endif
                                    @error('image_1') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                    <small wire:loading wire:target="image_1" class="form-text text-muted"><i class="fa fa-spin"><i class="fa fa-spinner"></i></i>&nbsp;&nbsp; Loading preview...</small>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>Image 2</label>
                                    <input type="file" wire:model.lazy="image_2" class="form-control {{$errors->has('image_2')? 'is-invalid' : '' }}">
                                    @if($image_2)
                                        <img src="{{$image_2->temporaryUrl()}}" class="img-fluid" />
                                    @else
                                        @if($article->image_2)
                                        <img src="{{$old_image_2}}" class="img-fluid" />
                                        <small wire:click="removeImage('image_2', {{$article_id}})" style="cursor:pointer;" class="form-text text-muted"><i wire:loading wire:target="removeImage('image_2', {{$article_id}})" class="fa fa-spin"><i class="fa fa-spinner"></i></i> >> Remove image</small>
                                        @endif
                                    @endif
                                    @error('image_2') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                    <small wire:loading wire:target="image_2" class="form-text text-muted"><i class="fa fa-spin"><i class="fa fa-spinner"></i></i>&nbsp;&nbsp; Loading preview...</small>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>Image 3</label>
                                    <input type="file" wire:model.lazy="image_3" class="form-control {{$errors->has('image_3')? 'is-invalid' : '' }}">
                                    @if($image_3)
                                        <img src="{{$image_3->temporaryUrl()}}" class="img-fluid" />
                                    @else
                                        @if($article->image_3)
                                            <img src="{{$old_image_3}}" class="img-fluid" />
                                            <small wire:click="removeImage('image_3', {{$article_id}})" style="cursor:pointer;" class="form-text text-muted"><i wire:loading wire:target="removeImage('image_3', {{$article_id}})" class="fa fa-spin"><i class="fa fa-spinner"></i></i> >> Remove image</small>
                                        @endif
                                    @endif
                                    @error('image_3') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                    <small wire:loading wire:target="image_3" class="form-text text-muted"><i class="fa fa-spin"><i class="fa fa-spinner"></i></i>&nbsp;&nbsp; Loading preview...</small>
                                </div>
                                <!-- /.form-group -->
                            </div>


                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea rows="5" placeholder="Content" wire:model.lazy="content_1" class="form-control {{$errors->has('content_1')? 'is-invalid' : '' }}"></textarea>
                                    @error('content_1') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                </div>
                                <!-- /.form-group -->
                            </div>

                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>Quote</label>
                                    <textarea placeholder="Drop a quote here..." wire:model.lazy="quote" class="form-control {{$errors->has('quote')? 'is-invalid' : '' }}"></textarea>
                                    @error('quote') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                </div>
                                <!-- /.form-group -->
                            </div>

                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>Content continuation</label>
                                    <textarea rows="5" placeholder="Content cotinues here" wire:model.lazy="content_2" class="form-control {{$errors->has('content_1')? 'is-invalid' : '' }}"></textarea>
                                    @error('content_2') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
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

