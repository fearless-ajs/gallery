

    <div class="card-body" style="color: white;">
        <div>
            @if ($paginator->hasPages())
            <ul class="pagination">
                <!-- Previous page -->
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled">
                        <a  style="color: white !important;" class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                @else
                    <li class="page-item" wire:click="previousPage">
                        <a  style="color: white !important;" class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>

                @endif
            <!-- End of Previous page -->

                <!-- Page Numbers links -->
                <!--Pagination elements -->
                @foreach($elements as $element)
                    @if(is_array($element))
                        @foreach($element as $page => $url)

                            @if($page == $paginator->currentPage())
                                <li class="page-item active" wire:click="gotoPage({{$page}})">
                                    <a  style="color: white !important;" class="page-link" href="#">{{$page}} <span class="sr-only">(current)</span></a>
                                </li>
                            @else
                                <li  style="color: white !important;" wire:click="gotoPage({{$page}})" class="page-item"><a class="page-link" href="#">{{$page}}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            <!-- End page Numbers links -->








                <!-- Next page -->
                @if ($paginator->hasMorePages())
                    <li class="page-item" wire:click="nextPage">
                        <a  style="color: white !important;" class="page-link" href="#">Next</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <a  style="color: white !important;" class="page-link" href="#">Next</a>
                    </li>
                @endif
                <!-- Next page -->



            </ul>
            @endif
        </div>
    </div>


