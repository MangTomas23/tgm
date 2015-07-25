<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Input;
use App\Lost;
use App\LostItem;

class LostItemController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$losts = Lost::all();

		return view('lost.index', compact('losts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('lost.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$lost = new Lost;

		$lost->date       = $input["date"];
		$lost->checked_by = $input["checked_by"];

		$lost->save();

		foreach ($input['boxes'] as $i => $box) {
			$lostItem = new LostItem;

			$lostItem->lost_id     = $lost->id;
			$lostItem->no_of_box   = $input['no_of_box'][$i];
			$lostItem->no_of_packs = $input['no_of_packs'][$i];
			$lostItem->amount      = $input['amount'][$i];

			$lostItem->save();
		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$lost = Lost::findOrFail($id);

		return view('lost.show', [
			'lost' => $lost,
			'lostItems' => $lost->lostItems
			]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
