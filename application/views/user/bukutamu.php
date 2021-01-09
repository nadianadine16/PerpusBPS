<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact V3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?= base_url()?>/assetsBukuTamu/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>/assetsBukuTamu/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>/assetsBukuTamu/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>/assetsBukuTamu/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>/assetsBukuTamu/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>/assetsBukuTamu/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>/assetsBukuTamu/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>/assetsBukuTamu/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="bg-contact3" style="background-image: url('<?= base_url()?>/assetsBukuTamu/images/bg-01.jpg');">
		<div class="container-contact3">
			<div class="wrap-contact3"style="background:#213B52; width:1000px">
				<form class="contact3-form validate-form">
					<span class="contact3-form-title">
						Buku Tamu
					</span>
                    <div class="wrap-input3 validate-input" data-validate="Name is required">
						<input class="input3" type="text" name="nama" placeholder="Nama Anda">
						<span class="focus-input3"></span>
					</div>
					<div class="wrap-contact3-form-radio">
						<div class="contact3-form-radio m-r-42">
							<input class="input-radio3" id="radio1" type="radio" name="choice" value="say-hi" checked="checked">
							<label class="label-radio3" for="radio1">
								Laki-Laki
							</label>
						</div>

						<div class="contact3-form-radio">
							<input class="input-radio3" id="radio2" type="radio" name="choice" value="get-quote">
							<label class="label-radio3" for="radio2">
								Perempuan
							</label>
						</div>
					</div>
                    <div class="wrap-input3 validate-input" data-validate = "No Hp harus diisi">
						<input class="input3" type="text" name="nohp" placeholder="Nomer Handphone Anda">
						<span class="focus-input3"></span>
					</div>
					<div class="wrap-input3 validate-input" data-validate = "Isi email dengan forma: ex@gmail.com">
						<input class="input3" type="text" name="email" placeholder="Email Anda">
						<span class="focus-input3"></span>
					</div>
					<div class="drop-down">
						<div>
							<select class="selection-2" name="service">
								<option>Pilih Pekerjaan</option>
								<option>PNS</option>
								<option>Karyawan BUMN/Swasta</option>
								<option>Mahasiswa</option>
                                <option>Lainnya</option>
							</select>
						</div>
						<span class="focus-input3"></span>
					</div>
                    <div class="wrap-input3 validate-input" data-validate = "asal instansi harap diisi">
						<input class="input3" type="text" name="instansi" placeholder="Asal Instansi / Lembaga / Lainnya">
						<span class="focus-input3"></span>
					</div>
                    <div class="drop-down">
						<div>
							<select class="selection-2" name="service">
								<option>Data yang Dibutuhkan</option>
								<option>a</option>
								<option>b</option>
								<option>c</option>
                                <option>Lainnya</option>
							</select>
						</div>
						<span class="focus-input3"></span>
					</div>
					<div class="container-contact3-form-btn">
						<button class="contact3-form-btn">
							Submit
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="<?= base_url()?>/assetsBukuTamu/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url()?>/assetsBukuTamu/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url()?>/assetsBukuTamu/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url()?>/assetsBukuTamu/vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="<?= base_url()?>/assetsBukuTamu/js/main.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
