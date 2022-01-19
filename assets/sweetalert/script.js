const Toast = Swal.mixin({
	toast: true,
	background: '#ffc107',
	position: 'top-end',
	showConfirmButton: false,
	timer: 3000
});

const Toas = Swal.mixin({
	toast: true,
	position: 'top-end',
	showConfirmButton: false,
	timer: 3000
});

const Validasi = $('.vali-dasi').data('validasi');

if (Validasi) {
	Toas.fire({
		type: 'error',
		title: Validasi,
		showConfirmButton: false,
		timer: 2000
	});
}

const Gagal = $('.ga-gal').data('gagal');

if (Gagal) {
	Swal.fire(
		'Gagal!',
		Gagal,
		'error'
	)
}

const flashData = $('.flash-data').data('flashdata');

if (flashData) {
	Toast.fire({
		type: 'success',
		title: '<a style="color:#f8f9fa">' + flashData,
		showConfirmButton: false,
		timer: 2000
	});
}

const Sukses = $('.suk-ses').data('sukses');

if (Sukses) {
	Toast.fire({
		type: 'success',
		title: '<a style="color:#f8f9fa">' + Sukses
	});
}

const Profil = $('.pro-fil').data('profil');

if (Profil) {
	Toast.fire({
		type: 'success',
		title: '<a style="color:#f8f9fa">' + Profil
	});
}

const Logout = $('.log-out').data('logout');

if (Logout) {
	Toas.fire({
		type: 'success',
		title: Logout
	});
}


const hapusData = $('.hapus-data').data('hapus');

$('.tombol-hapus').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah kamu yakin',
		text: "Ingin menghapus data ini?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, Hapus saja!',
		cancelButtonText: 'Batal'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
			Swal.fire({
				title: 'Terhapus!',
				text: hapusData,
				showConfirmButton: false,
				type: 'success'
			})
		}
	})
});


const hapusSemua = $('.hapus-semua').data('semua');

$('.hapussemua').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah kamu yakin',
		text: "Semua data akan terhapus",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus semua!',
		cancelButtonText: 'Batal'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
			Swal.fire({
				title: 'Terhapus!',
				text: hapusData,
				showConfirmButton: false,
				type: 'success'
			})
		}
	})
});


const Belanja = $('.belan-ja').data('belanja');
if (Belanja) {
	Swal.fire({
		title: 'Hooraaay!!',
		text: Belanja,
		type: 'success',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#aaa',
		confirmButtonText: '<a href="home/belanja" class="text-light"><i class="fa fa-clock"></i> history shopping',
		cancelButtonText: '<i class="fa fa-shopping-cart"></i> Kembali Belanja'
	})
}


const Hapus = $('.sampai').data('sampe');

$('.pesananselesai').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Konfirmasi',
		text: "Apakah barang sudah sampai",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Sudah',
		cancelButtonText: 'Batal'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
			Swal.fire({
				title: 'Mantap!',
				text: Hapus,
				showConfirmButton: false,
				type: 'success'
			})
		}
	})
});

const batal = $('.batalkan').data('batal');
$('.pesananpending').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah kamu yakin',
		text: "Ingin membatalkan transaksi?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Batalkan!',
		cancelButtonText: 'Batal'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
			Swal.fire({
				title: 'Terhapus!',
				text: batal,
				showConfirmButton: false,
				type: 'success'
			})
		}
	})
});
