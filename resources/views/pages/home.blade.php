@extends('layouts.main')

@section('content')

<main>

    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="bd-placeholder-img" width="100%" height="600px" src="/assets/images/building1.jpg" style="object-fit: cover;" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
          <div class="container">
            <div class="carousel-caption text-start">
              <h1><b>Where Expertise Meets Empathy</b></h1>
              <p>Highlighting the combination of medical expertise and compassion</p>
              <p><a class="btn btn-lg btn-primary" href="/contact">Contact</a></p>
            </div>
          </div>
        </div>
        
        <div class="carousel-item">
          <img class="bd-placeholder-img" width="100%" height="600px" src="/assets/images/operation4.jpg" style="object-fit: cover;" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
          <div class="container">
            <div class="carousel-caption text-end">
              <h1><b>Your Journey to Better Health Starts Here</b></h1>
              <p>Encouraging patients to take the first step towards wellness</p>
              <p><a class="btn btn-lg btn-primary" href="/register">Sign up today</a></p>
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    @include('partials._date_search')
  
  
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
  
    <div class="container col-xxl-8 px-4 py-5">
      <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
          <img src="/assets/images/lol.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
          <h1 class="display-5 fw-bold lh-1 mb-3">Your Health Matters</h1>
          <p class="lead">At CLINIC, we are dedicated to providing compassionate and comprehensive healthcare services to our patients. With a team of highly skilled and experienced doctors and staff, we are committed to ensuring your well-being.</p>
          <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <a href="/appointments" type="button" class="btn btn-primary btn-lg px-4 me-md-2">Book an Appointment</a>
          </div>
        </div>
      </div>
    </div>

    <div class="px-4 py-5 my-5 text-center">
      <h1 class="display-5 fw-bold">The Experts You Can Trust!</h1>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">We take pride in bringing you the finest medical care, delivered by a team of highly skilled and dedicated professionals!</p>
      </div>
  
        <div class="container px-4 py-5" id="custom-cards">

          <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
            @foreach ($topdoctors->take(3) as $item)
            <div class="col">
              <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                  <h2 class="mb-4 display-6 lh-1 fw-bold">{{$item->name}}</h2>
                  <ul class="list-unstyled mt-auto">
                    <li class="me-auto">
                      <img src="/assets/images/doctor1.jpg" style="object-fit:cover;" alt="Bootstrap" width="150" height="150" class="rounded-circle border border-white">
                    </li>
                  </ul>
                  <ul class="d-flex list-unstyled mt-auto justify-content-center">
                    <li class="d-flex align-items-center me-3">
                      <button class="btn btn-light">{{$item->degree}}</button>
                    </li>
                    <li class="d-flex align-items-center">
                      <button class="btn btn-light">{{$item->specialization->specialization}}</button>
                    </li>
                  </ul>
                </div>
              </div>
            </div>   
            @endforeach
          </div>
        </div>
    </div>
    <!-- /.row -->
  
    <div class="container">
      <div class="row">
        <div class="col-md-6">
      <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
          <h1 class="display-5 fw-bold">Mission</h1>
          <p class="fs-4">Our mission is to promote and enhance the health and quality of life of our patients. We strive to provide compassionate, patient-centered care, emphasizing preventive measures and advanced treatments to achieve the best possible outcomes.</p>
        </div>
      </div>
      </div>
        <div class="col-md-6">
      <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
          <h1 class="display-5 fw-bold">Services</h1>
          <p class="fs-4">We offer a wide range of medical services to address various health concerns. From routine check-ups and preventive care to specialized treatments, we have the expertise to provide comprehensive solutions for all your healthcare needs.</p>
        </div>
      </div>
      </div>
    </div>
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