<?php
/*
 * Created on Sep 11, 2016
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 namespace App\Http\Controllers;
 
 class PagesController extends Controller{
 	public function getHello(){
 		return 'Helu from Laravel';
 	}
 	public function getAbout()
 	{
 		$full="Nguyen Dinh Thong";
 		return view('pages/about')->with("fullname",$full)->withEmail("tnd@gmail.com"); 		
 	}
 	public function getContact()
 	{	return view('pages.contact'); 		
 	}
 	
 	public function postContact()
 	{
 		
 	}
 	
 }
 
?>
