<div class="card card-primary">
    <div class="card-header">
        <h4 class="card-title">Add picture</h4>
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

        <form action="{{route('album.images.save', $album_id)}}" wire:submit.prevent="save" method="post" enctype="multipart/form-data" class="dropzone">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group fallback">
                        <label>Caption</label>
                        <input type="text" name="caption" wire:model.lazy="caption" class="form-control {{$errors->has('caption')? 'is-invalid' : '' }}" placeholder="Drop a caption for this image">
                        @error('caption') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->

                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">

                <div class="col-sm-12" >
                    <div class="form-group" wire:ignore>
                        <div class="form-group">
                            <label>Images <sup>max 20MB</sup></label><br>
                                <input name="images[]"  class="form-control {{$errors->has('images.*')? 'is-invalid' : '' }}" type="file" wire:model="images" multiple data-min-file-count="1" data-theme="fas">
                            @error('images') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                            <small wire:loading wire:target="images" class="form-text text-muted"><i class="fa fa-spin"><i class="fa fa-spinner"></i></i>&nbsp;&nbsp; Loading preview...</small>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    @if ($images)
                        Photo Preview:<br>
                        @foreach($images as $photo)
                           <a href="{{ $photo->temporaryUrl() }}" data-toggle="lightbox" data-title="{{$caption}}" data-gallery="gallery">
                                 <img src="{{ $photo->temporaryUrl() }}" width="200" style="margin-bottom: 5px; border: 2px solid white;">
                            <span wire:loading wire:target="removeImg({{$loop->index}})" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            </a>
                            <small style="cursor: pointer;" class="fas fa-times text-danger" wire:click.prevent="removeImg({{$loop->index}})" wire:loading.remove wire:target="removeImg({{$loop->index}})"></small>

                        @endforeach
                    @endif
                    @error('images.*') <span class="error">{{ $message }}</span> @enderror


                <!-- /.form-group -->
                </div>

            </div>
            <!-- /.row -->
            <br>


            <div>
                <button wire:loading.remove wire:target="save" type="submit" class="btn btn-primary">Save picture</button>
                <button disabled wire:loading wire:target="save" type="submit" class="btn btn-primary"> Processing  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> </button>
                <a href="{{route('album.pictures', $album_id)}}" target="_blank" class="btn btn-default">All Pictures</a>
            </div>

{{--            <div wire:loading wire:target="images">--}}
{{--                <button disabled type="submit" class="btn btn-primary"> Loading images  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> </button>--}}
{{--                <a href="{{route('album.pictures', $album_id)}}" target="_blank" class="btn btn-default">All Pictures</a>--}}
{{--            </div>--}}

        </form>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        Contact <a href="#">the system administrator if </a> you're not sure of what to do.
    </div>
    <!-- /.card -->

</div>



