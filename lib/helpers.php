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

function echoDie($msg)
{
    echo "$msg";
    die();
}

function errorModal($error_title, $error_description)
{
    echo ("
    <div class='modal fade' id='errorModal' tabindex='-1' aria-labelledby='errorModalLabel' aria-hidden='true'>
        <div class='modal-dialog modal-md'>
            <div class='modal-content'>
                <div class='modal-header bg-danger text-white'>
                    <h5 class='modal-title' id='errorModalLabel'></h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body' id='errorModalBody'></div>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('errorModalLabel').textContent = \"$error_title\";
    document.getElementById('errorModalBody').textContent = \"$error_description\";
    document.getElementById('errorModal').setAttribute('data-bs-show', 'true'); 
    });
    </script>");
    die();
}
