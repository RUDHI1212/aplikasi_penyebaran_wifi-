<?php 

function alihkan(){
    $rama = get_instance();
    if ($rama->session->userdata('Level')) {
        redirect('USER/home');
    }
}