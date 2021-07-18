<div class="content">
    @if($page)
    <!-- column-image  -->
    <div class="column-image" wire:ignore>

        <div class="bg"  data-bg="
         @if($page->image)
        {{$page->ImagePath}}
        @else
        {{asset('images/bg/1.jpg')}}
        @endif
        "
        ></div>
        <div class="overlay"></div>
        <div class="column-title">
            <h2>{{$page->title}}</h2>
            <h3>
                {{$page->content}}
             </h3>
        </div>

    </div>
    <!-- column-image end  -->
    @endif
    <!-- column-wrapper -->
    <div class="column-wrapper ">

        <!--section -->
        <section id="sec3">
            <div class="container small-container">
                <div class="section-title fl-wrap" wire:ignore>
                    <h3>Include me in your Open House announcements!</h3>
                    <h4>
                        Upcoming Open House Dates:
                    </h4>
                    @if($dates)
                        @foreach($dates as $date)
                        <h4>​
                            {{strftime("%A", $date->timestamp)}}, {{strftime("%B", $date->timestamp)}} {{strftime("%d", $date->timestamp)}}, {{strftime("%G", $date->timestamp)}}, {{strftime("%I", $date->timestamp)}}:{{strftime("%M", $date->timestamp)}} {{strftime("%p", $date->timestamp)}}
                        </h4>
                        @endforeach
                    @endif


                </div>
                <div class="column-wrapper_item fl-wrap">
                    <div class="column-wrapper_text fl-wrap">
                        <div id="contact-form" class="fl-wrap">
                            <div id="message"></div>
                            <form  class="custom-form" wire:submit.prevent="save" >
                                <fieldset>
                                    <input type="text" wire:model.lazy="email" class="form-control {{$errors->has('email')? 'is-invalid' : '' }}" name="email" id="email" placeholder="Email Address *" />
                                    @error('email') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror

                                    <input type="text"  wire:model.lazy="firstname" class="form-control {{$errors->has('firstname')? 'is-invalid' : '' }}"  name="first_name" id="first_name" placeholder="First Name *" />
                                    @error('firstname') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror

                                    <input type="text"  wire:model.lazy="lastname" class="form-control {{$errors->has('lastname')? 'is-invalid' : '' }}"  name="last_name" id="last_name" placeholder="Last Name *" />
                                    @error('lastname') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror

                                    <button type="submit"  class="btn float-btn flat-btn color-bg" id="submit">Register for an Open House <span class="spinner-border spinner-border-sm"></span></button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--section end  -->
        <!--footer -->
        <footer class="min-footer fl-wrap content-animvisible">
            <div class="container small-container">
                <div class="footer-inner fl-wrap">
                    <!-- policy-box-->
                    <div class="policy-box">
                        <span>&#169; {{$setting->app_name}} {{Carbon\Carbon::now()->format('Y')}}  /  All rights reserved. </span>
                    </div>
                    <!-- policy-box end-->
                    <a href="#" class="to-top-btn to-top">Back to top <i class="fal fa-long-arrow-up"></i></a>
                </div>
            </div>
        </footer>
        <!--footer end  -->
    </div>
    <!-- column-wrapper -->
</div>
