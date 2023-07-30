@extends('layouts.main')

@section('content')

<div class="container mt-5">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.385003811482!2d84.4037763751943!3d27.705396725577895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3994fb6fdfd935ed%3A0x29e6424f203a7aec!2sLUMBINI%20ICT%20CAMPUS!5e0!3m2!1sen!2snp!4v1690648435072!5m2!1sen!2snp" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
</div>

<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 mb-3">Give us Your Review</h1>
        <p class="col-lg-10 fs-4">Your positive experiences and success stories inspire us to continue providing the best possible care to our patients. We believe that sharing your thoughts can help others who are seeking top-notch healthcare services like yours</p>
      </div>
      <div class="col-md-10 mx-auto col-lg-5">
        <form class="p-4 p-md-5 border rounded-3 bg-light">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" placeholder="Your Name">
            <label for="floatingInput">Name</label>
          </div>
          <div class="form-floating mb-3">
            <textarea style="height:150px;" rows="4" class="form-control"></textarea>
            <label for="floatingPassword">Remarks</label>
          </div>
          
          <button class="w-100 btn btn-lg btn-primary" type="submit">Send</button>
          <hr class="my-4">
          <small class="text-muted">Feel free to mention Negatives!</small>
        </form>
      </div>
    </div>
</div>

@endsection