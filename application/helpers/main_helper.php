<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// ------------------------------------------------------------------------

if ( ! function_exists('asset'))
{
	function asset($data)
	{
		return base_url().'public/'.$data;
	}
}
