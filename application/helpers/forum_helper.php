<?php

function is_logged_in()
{
  $ci = get_instance();
  if(!$ci->session->userdata('user_id')){
    redirect('auth');
  }  
}

function is_logged_out()
{
  $ci = get_instance();
  if($ci->session->userdata('user_id')){
    redirect('home');
  } 
}
