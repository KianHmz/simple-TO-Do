<?php

/**
 * Public Functions
 */

function dd($array)
{
    echo '<pre>';
    var_dump($array);
    echo '</pre>';
}

function errorModal($error_title, $error_description)
{
    $error_title = htmlspecialchars($error_title);
    $error_description = htmlspecialchars($error_description);

    include_once BASE_PATH . '/templates/error_modal.php';

    echo
    "<script>
    $(document).ready(function() {
        var errorModal = new bootstrap.Modal($('#errorModal'));
        $('.modal-title').html('" . $error_title . "');
        $('.modal-body').html('" . nl2br($error_description) . "');
        errorModal.show();
    });
    </script>";
}
