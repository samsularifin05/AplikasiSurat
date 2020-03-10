<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

if (! function_exists('success')) {
	function success($messages) {
    $alert = "
    <script>
    Swal.fire({
			title: 'Good Job !!!',
			text: '".$messages."',
			type: 'success',
			backdrop: 'rgba(0,0,0,.4)'
		})
    </script>
		";
		return $alert;
	}
}

if (! function_exists('error')) {
	function error($messages) {
    $alert = "
    <script>
    Swal.fire({
			title: 'Gagal !!!',
			text: '".$messages."',
			type: 'error',
			backdrop: 'rgba(0,0,0,.4)'
		})
    </script>
		";
		return $alert;
	}
}

if (! function_exists('information')) {
    function information($messages) {
    $alert = "
    <script>
    Swal.fire({
            title: 'Oopss !!!',
            text: '".$messages."',
            type: 'info',
            backdrop: 'rgba(0,0,0,.4)'
        })
    </script>
        ";
        return $alert;
    }
}


