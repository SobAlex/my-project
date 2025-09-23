<?php

namespace App\Http\Controllers;

use App\Services\ContactService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct(
        private ContactService $contactService
    ) {}

    /**
     * Страница контактов
     */
    public function contacts()
    {
        $data = $this->contactService->getContactPageData();
        return view('pages.contacts', $data);
    }
}
