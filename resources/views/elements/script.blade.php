<!-- jQuery -->
<script src="{{ asset('js/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('asset/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('js/fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ asset('asset/nprogress/nprogress.js') }}"></script>
<!-- bootstrap-progressbar -->
<script src="{{ asset('asset/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('asset/iCheck/icheck.min.js') }}"></script>
<!-- Ckeditor -->
<script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
<!-- NotifyJS -->
<script src="{{ asset('js/notifyjs/notify.min.js') }}"></script>
<!-- Sweet Alert 2 -->
<script src="{{ asset('js/sweetalert2.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<!-- Tags Input -->
<script src="{{ asset('asset/tagsinput/dist/jquery.tagsinput.min.js') }}"></script>
<!-- Flatpickr -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<!-- Custom Theme Scripts -->
<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('js/my-js.js') }}"></script>
<script>

    if ($('#ckeditor').length) {
		var options = {
			filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
			filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
			filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
			filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
		};
		CKEDITOR.replace('ckeditor', options);
	}
</script>