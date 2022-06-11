<?php

namespace App\Http\Controllers;

use App\Models\Flat;
use App\Models\Mortgage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $aFlats = Flat::with('mortgages')->get();
        return view('flats.index', compact('aFlats'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $aMortgages = Mortgage::select('id', 'name')->get();
        return view('flats.create', compact('aMortgages'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'price' => 'int|required',
        ]);

        $oFlat = Flat::create($request->all());

        $aUpdatedMortgages = [];
        if ($request->mortgages !== null) {
            foreach ($request->mortgages as $iMorgageId) {
                $aUpdatedMortgages[$iMorgageId]['monthly_payment'] = Mortgage::getMonthlyPayment($request->price, $iMorgageId);
            }
        }
        $oFlat->mortgages()->sync($aUpdatedMortgages);
        return redirect()->route('flats.index')->with('success', 'Квартира добавлена');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function edit($id)
    {
        $oFlat = Flat::with('mortgages')->find($id);
        $aMortgages = Mortgage::select('id', 'name')->get();
        return view('flats.edit', compact('oFlat', 'aMortgages'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'price' => 'int|required',
        ]);

        $oFlat = Flat::find($id);
        $oFlat->update($request->all());

        $aUpdatedMortgages = [];
        if ($request->mortgages !== null) {
            foreach ($request->mortgages as $iMorgageId) {
                $aUpdatedMortgages[$iMorgageId]['monthly_payment'] = Mortgage::getMonthlyPayment($request->price, $iMorgageId);
            }
        }
        $oFlat->mortgages()->sync($aUpdatedMortgages);
        return redirect()->route('flats.index')->with('success', 'Изменения сохранены');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $oFlat = Flat::find($id);
        $oFlat->mortgages()->sync([]);
        $oFlat->delete();
        return redirect()->route('flats.index')->with('success', 'Ипотека удалена');
    }
}
