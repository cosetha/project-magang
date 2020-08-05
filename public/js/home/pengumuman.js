$(document).ready(function() {
  $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

  $('body').on('click', '#tes', function(e) {
		e.preventDefault();
    var deskripsi = tinymce.get('deskripsi-tambah').getContent();
    console.log(deskripsi);
	});

});
