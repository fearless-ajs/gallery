<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gallery</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Gallery</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title">{{$album->title}}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                @if($images)
                                    @foreach($images as $image)
                                <div class="col-sm-2">
                                    <small style="cursor: pointer;" class="fas fa-times text-danger" wire:click="remove({{$image->id}})" wire:loading.remove wire:target="remove({{$image->id}})"></small>
                                    <span wire:loading wire:target="remove({{$image->id}})" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    <a href="{{$image->OriginalImagePath}}" data-toggle="lightbox" data-title="{{$image->caption}}" data-gallery="gallery">
                                        <img src="{{$image->OptimizedImagePath}}" class="img-fluid mb-2" alt="white sample"/>
                                    </a>
                                </div>
                                    @endforeach
                                @endif


                            </div>
                            {{ $images->links('components.pagination-links') /* For pagination links */}}
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
