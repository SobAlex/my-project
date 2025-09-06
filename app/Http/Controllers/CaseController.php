<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaseController extends Controller
{

    /**
     * Главная страница кейсов
     */
    public function index(Request $request)
    {
        $casesData = $this->getAllCasesData();
        $title = 'Кейсы';

        return view('cases.index', compact('casesData', 'title'));
    }

    /**
     * Страница отдельного кейса
     */
    public function show($id)
    {
        $casesData = $this->getAllCasesData();

        foreach ($casesData as $service => $serviceData) {
            foreach ($serviceData['cases'] as $case) {
                if ($case['id'] === $id) {
                    return view('cases.show', compact('case', 'serviceData'));
                }
            }
        }

        abort(404);
    }

    /**
     * Получить данные кейсов
     */
    public function getCasesData()
    {
        return $this->getAllCasesData();
    }

    /**
     * Получить все данные кейсов с тегами
     */
    public function getAllCasesData()
    {
        return [];
    }
}
