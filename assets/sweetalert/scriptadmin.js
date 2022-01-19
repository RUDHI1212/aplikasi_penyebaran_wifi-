const Toast = Swal.mixin({
	toast: true,
	background: '#e74a3b',
	position: 'top-end',
	showConfirmButton: false,
	timer: 3000
});

const Validasi = $('.vali-dasi').data('validasi');

if (Validasi) {
	Toast.fire({
		type: 'error',
		title: '<a style="color:#f8f9fa">' + Validasi,
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
	Toast.fire({
		type: 'success',
		title: '<a style="color:#f8f9fa">' + Logout
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

const Hapus = $('.ha-pus').data('hapuss');

$('.pesananselesai').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah kamu yakin',
		text: "Data akan terhapus",
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
				text: Hapus,
				showConfirmButton: false,
				type: 'success'
			})
		}
	})
});

$('.pesananpending').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah kamu yakin',
		text: "Data akan terhapus",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus!',
		cancelButtonText: 'Batal'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
			Swal.fire({
				title: 'Terhapus!',
				text: Hapus,
				showConfirmButton: false,
				type: 'success'
			})
		}
	})
});
