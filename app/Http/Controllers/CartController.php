<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class CartController extends Controller
{

	public function add_to_cart(Request $request,$id){

		$data = array();
		$data['product_id'] = $id;
		$data['qty']        = 1;
		$data['session_id'] = Session::getId();


		$check = DB::table('shopping_cart')->where('product_id',$id)->where('session_id',Session::getId())->first();

		if ($check) {

			$quntityup = array(
				'qty'  => $check->qty+1, 
			);

			DB::table('shopping_cart')->where('product_id',$id)->where('session_id',Session::getId())->update($quntityup);
		}
		else{
			DB::table('shopping_cart')->insert($data);
		}

	}


	public function getdata(){

		$view = DB::table('shopping_cart')
		->where('shopping_cart.session_id',Session::getId())
		->join('product','product.id','shopping_cart.product_id')
		->select('shopping_cart.*','product.name','product.price','product.image')
		->get();

		return view('showcartdata',compact('view'));
	}


	public function getsummary(){

		$view = DB::table('shopping_cart')
		->where('shopping_cart.session_id',Session::getId())
		->join('product','product.id','shopping_cart.product_id')
		->select('shopping_cart.*','product.name','product.price','product.image')
		->get();


		return view('getsummary',compact('view'));
	}



	public function deletecarts($id){

		DB::table('shopping_cart')
		->where('session_id',Session::getId())
		->where('id',$id)
		->delete();

	}




	public function cartincrement(Request $request,$id){

		$check = DB::table('shopping_cart')->where('product_id',$id)->where('session_id',Session::getId())->first();


		if ($check) {

			$quntityup = array(
				'qty'  => $check->qty+1, 
			);

			DB::table('shopping_cart')->where('product_id',$id)->where('session_id',Session::getId())->update($quntityup);
		}

		

		

	}






}




