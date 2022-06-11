<?php

namespace App\Http\Controllers;

use App\Models\Mortgage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MortgageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $aMortgages = Mortgage::paginate(20);
        return view('mortgages.index', compact('aMortgages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $aMortgages = Mortgage::select('id', 'name')->get();
        return view('mortgages.create', compact('aMortgages'));
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
            'interest_rate' => 'required',
            'years' => 'int|required',
            'min_initial_contribution' => 'int|required',
        ]);
        Mortgage::create($request->all());
        return redirect()->route('mortgages.index')->with('success', 'Ипотека добавлена');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function edit($id)
    {
        $oMortgage = Mortgage::find($id);
        return view('mortgages.edit', compact('oMortgage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'interest_rate' => 'required',
            'years' => 'int|required',
            'min_initial_contribution' => 'int|required',
        ]);
        $oMortgage = Mortgage::with('flats')->find($id);
        $oMortgage->update($request->all());

        $aUpdatedMortgages = [];
        if ($oMortgage->flats !== null) {
            foreach ($oMortgage->flats as $oFlat) {
                $aUpdatedMortgages[$oFlat->id]['monthly_payment'] = Mortgage::getMonthlyPayment($oFlat->price, $oMortgage);
            }
        }
        $oMortgage->flats()->sync($aUpdatedMortgages);
        return redirect()->route('mortgages.index')->with('success', 'Изменения сохранены');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $oMortgage = Mortgage::with('flats')->find($id);
        $oMortgage->flats()->sync([]);
        $oMortgage->delete();
        return redirect()->route('mortgages.index')->with('success', 'Ипотека удалена');
    }
}
