@extends('user/layouts/app')

@section('container')

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">
        <small>Contact</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">Contact</li>
      </ol>

      <!-- Content Row -->
      <div class="row">
        <!-- Contact Details Column -->
        <div class="col-lg-6 mb-4">
          <h3>Send us a Message</h3>
          <form name="sentMessage" id="contactForm" novalidate>
            <div class="control-group form-group">
              <div class="controls">
                <label>Full Name:</label>
                <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Phone Number:</label>
                <input type="tel" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Email Address:</label>
                <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Message:</label>
                <textarea rows="8" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
              </div>
            </div>
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Send Message</button>
          </form>
        </div>
        <!-- Map Column -->
        <div class="col-lg-6 mb-4">
          <!-- Embedded Google Map -->
          <iframe width="100%" height="600px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"  src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1930.3986365412277!2d121.07611560372631!3d14.610621436620574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sph!4v1539758510289" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection
