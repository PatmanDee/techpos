@extends('layouts/blankLayout')

@section('title', 'Register Basic - Pages')

@section('page-style')
@vite([
  'resources/assets/vendor/scss/pages/page-auth.scss'
])
@endsection


@section('content')
<!-- Add these in your head section -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css">

<!-- Add these before your closing body tag -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>

<!-- Add these before your closing body tag -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Initialize the plugin
    const phoneInput = document.querySelector("#phone");
    const iti = window.intlTelInput(phoneInput, {
      utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js",
      separateDialCode: true,
      initialCountry: "zw",   // Default to Zimbabwe (zw)
      preferredCountries: ["zw", "za", "bw", "mz", "zm"],  // Zimbabwe and neighboring countries
    });

    // Store the full number with country code in a hidden input before form submission
    const form = document.getElementById("formAuthentication");
    const fullPhoneInput = document.getElementById("full_phone");

    form.addEventListener('submit', function(e) {
      if (phoneInput.value.trim()) {
        fullPhoneInput.value = iti.getNumber();
      }
    });

    // Add validation
    phoneInput.addEventListener('blur', function() {
      if (phoneInput.value.trim()) {
        if (iti.isValidNumber()) {
          phoneInput.classList.remove('is-invalid');
          phoneInput.classList.add('is-valid');
        } else {
          phoneInput.classList.remove('is-valid');
          phoneInput.classList.add('is-invalid');
        }
      }
    });
  });
</script>

<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register Card -->
      <div class="card px-sm-6 px-0">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center mb-6">
            <a href="{{url('/')}}" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">@include('_partials.macros',["width"=>25,"withbg"=>'var(--bs-primary)'])</span>
              <span class="app-brand-text demo text-heading fw-bold">{{config('variables.templateName')}}</span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-1">Run Your Business Smarter 🚀</h4>
          <p class="mb-6">The Portable POS System that grows with you</p>

          <form id="formAuthentication" class="mb-6" action="{{url('/register')}}" method="POST">
            @csrf
            <div class="mb-4">
              <label for="businessName" class="form-label">Business Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="businessName" name="business_name" placeholder="Enter your business name" required autofocus>
            </div>

            <div class="mb-4">
              <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="mb-4">
              <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
              <input type="tel" class="form-control" id="phone" name="phone">
              <input type="hidden" name="full_phone" id="full_phone">
              <div id="iti-container">
                <small class="text-muted">Include your country code for verification purposes</small>
              </div>
            </div>

            <div class="mb-4 form-password-toggle">
              <label class="form-label" for="password">Password <span class="text-danger">*</span></label>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                  title="Must contain at least 8 characters, including uppercase, lowercase, number and special character"
                  aria-describedby="password" required />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
              <small class="text-muted">Minimum 8 characters with letters, numbers and special characters</small>
            </div>

            <div class="mb-6 form-password-toggle">
              <label class="form-label" for="confirm_password">Confirm Password <span class="text-danger">*</span></label>
              <div class="input-group input-group-merge">
                <input type="password" id="confirm_password" class="form-control" name="confirm_password"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="confirm_password" required />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>

            <div class="my-8">
              <div class="form-check mb-2 ms-2">
                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" required>
                <label class="form-check-label" for="terms-conditions">
                  I agree to the
                  <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#termsModal">Terms of Service</a> and
                  <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#privacyModal">Privacy Policy</a>
                </label>
              </div>
            </div>

            <div class="mb-4">
              <div class="g-recaptcha" data-sitekey="YOUR_RECAPTCHA_SITE_KEY"></div>
            </div>

            <button type="submit" class="btn btn-primary d-grid w-100">
              Create Account
            </button>
          </form>

          <p class="text-center">
            <span>Already have an account?</span>
            <a href="{{url('auth/login-basic')}}">
              <span>Sign in instead</span>
            </a>
          </p>
        </div>
      </div>
      <!-- Register Card -->
    </div>
  </div>
</div>
@endsection
