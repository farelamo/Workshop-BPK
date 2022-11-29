@extends('index')

@section('body')
    @include('partials.preloader')
    
  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">
                  <div class="col-lg-12">
                    <h2>FORUM WORKSHOP</h2>
                    <p>Wadah yang membahas topik tertentu dimana para peserta bebas mengutarakan pendapat atau ilmu yang mereka punya sebagai bahan diskusi.</p>
                  </div>
                  <div class="col-lg-12">
                    <form>
                      <input placeholder="Masukkan email anda" />
                      <button>Ikuti Sekarang</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="{{ asset('assets/images/hero.png') }}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <img src="{{ asset('assets/images/FLAG1.png') }}" width="100%" alt="">

  <div id="services" class="services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
            <h4>SYARAT <em>&amp;</em> KETENTUAN</h4>
            <img src="{{ asset('assets/images/heading-line-dec.png') }}" alt="">
            <img src="{{ asset('assets/images/heading-line-dec.png') }}" alt="">
            <img src="{{ asset('assets/images/heading-line-dec.png') }}" alt="">
            <img src="{{ asset('assets/images/heading-line-dec.png') }}" alt="">
            <img src="{{ asset('assets/images/heading-line-dec.png') }}" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="service-item first-service wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
            <div class="icon"></div>
            <h4>PESERTA</h4>
            <p>Lorem ipsum dolor consectetur adipiscing elit sedder williamsburg photo booth quinoa and fashion axe.</p>
            <div class="text-button">
              <a href="#">Lihat detail <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="service-item second-service wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
            <div class="icon"></div>
            <h4>PEMBICARA</h4>
            <p>Lorem ipsum dolor consectetur adipiscing elit sedder williamsburg photo booth quinoa and fashion axe.</p>
            <div class="text-button">
              <a href="#">Lihat Detail <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="about" class="about-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
            <div class="row">
              <div class="col-lg-12 mb-3">
                <h4>PESERTA</h4>
                <h2 class="my-2">Hadir dalam kegiatan workshop guna untuk meningkatkan ilmu.</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
              </div>
              <div class="col-lg-12">
                <div class="border-button scroll-to-section">
                  <a href="/workshop">Peserta, daftar disini!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
            <img src="{{ asset('assets/images/peserta.png') }}" height="500px" alt="">
          </div>
        </div>
      </div>
      <div class="col-lg-12 my-5">
        <div class="quotes first-service wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
          <p>"Berbagi ilmu adalah tindakan persahabatan yang paling mendasar karena itu adalah caramu dapat memberikan sesuatu tanpa kehilangan sesuatu."</p>
          <h5 class="mt-2">-Richard Stallman</h5>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="right-image wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
            <img src="{{ asset('assets/images/pembicara.png') }}" height="500px" alt="">
          </div>
        </div>
        <div class="col-lg-6 align-self-center">
          <div class="left-content show-up header-text wow fadeInRight" data-wow-duration="1s" data-wow-delay="1s">
            <div class="row">
              <div class="col-lg-12 mb-3">
                <h4>PEMBICARA</h4>
                <h2 class="my-2">Berbagi ilmu dengan mengadakan kegiatan workshop</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
              </div>
              <div class="col-lg-12">
                <div class="border-button scroll-to-section">
                  <a href="/workshop/create">Pembicara, daftar disini!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection