<head>
<title><?=$title?></title>
</head>
<!-- ======= Contact Section ======= -->
<section id="contact" class="contact section-bg">
  <div class="container">

    <div class="section-title">
      <h2 data-aos="fade-in">Contact</h2>
      <p data-aos="fade-in">Perpustakaan BPS Kota Malang Menyajikan Berbagai Pilihan Buku Berupa Hard Copy dan Soft Copy</p>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="row">
          <div class="col-md-12">
            <div class="info-box" data-aos="fade-up">
              <i class="bx bx-map"></i>
              <h3>Alamat</h3>
              <p>Jl. Janti Bar. No.47, Bandungrejosari, Kec. Sukun, Kota Malang, Jawa Timur 65148</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box mt-4" data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>bps3573@bps.go.id</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box mt-4" data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>(0341) 801164</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 mt-4 mt-lg-0">
        <form action="<?=base_url('user/kritik')?>" method="POST">
          <div class="form-row">
            <div class="col-md-6 form-group">
              <input type="text" name="nama" class="form-control" id="nama" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              <div class="validate"></div>
            </div>
            <div class="col-md-6 form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
              <div class="validate"></div>
            </div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
            <div class="validate"></div>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="KritikSaran" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Kritik & Saran"></textarea>
            <div class="validate"></div>
          </div>
          <div class="text-center"><button type="submit">Send Message</button></div>
        </form>
      </div>
    </div>
  </div>
</section><!-- End Contact Section -->
