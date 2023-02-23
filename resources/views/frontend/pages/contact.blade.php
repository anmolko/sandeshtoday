
@extends('frontend.layouts.master')
@section('title') Contact Us @endsection
@section('css')
    <style>
  .mt-20{
      margin-top: 20px;
  }
</style>
@endsection
@section('content')

    <section class="block-wrapper">
        <div class="container">

            <!-- block content -->
            <div class="block-content non-sidebar">

                <!-- contact form box -->
                <div class="contact-form-box mt-20">
                    <div class="title-section">
                        <h1><span>Talk to us</span></h1>
                    </div>
                    <form id="contact-form" name="contactForm" action="{{route('contact.store')}}" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="name">Name *</label>
                                <input id="fullname" name="fullname" type="text" required>
                            </div>
                            <div class="col-md-4">
                                <label for="mail">E-mail *</label>
                                <input id="email" name="email" type="text" required>
                            </div>
                            <div class="col-md-4">
                                <label for="phone">Phone number</label>
                                <input id="phone" name="phone" type="text">
                            </div>
                        </div>
                        <label for="message">Your Message *</label>
                        <textarea id="message" name="message" required></textarea>
                        <button type="submit" id="submit-contact">
                            <i class="fa fa-paper-plane"></i> Send Message
                        </button>
                    </form>
                </div>
                <!-- End contact form box -->

            @if(@$setting_data->google_map)
                <!-- contact info box -->
                <div class="contact-info-box mt-20">
                    <div class="title-section">
                        <h1><span>Find us on map</span></h1>
                    </div>

                    <div>
                       <iframe frameborder="0" height="200px" scrolling="no" marginheight="0" marginwidth="0" style="border:0; width: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="{{@$setting_data->google_map}}"
                                    title="%3$s" aria-label="%3$s"></iframe>
                    </div>
                </div>
                @endif

            </div>
            <!-- End block content -->
        </div>
    </section>





@endsection
@section('js')
  <!-- For Contact Form -->
  <script src="{{asset('assets/frontend/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/form-validator.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/contact-form-script.js')}}"></script>
@endsection
