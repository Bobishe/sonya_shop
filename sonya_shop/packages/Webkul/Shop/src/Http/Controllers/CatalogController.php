<?php

namespace Webkul\Shop\Http\Controllers;

use Webkul\Category\Repositories\CategoryRepository;

class CatalogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected CategoryRepository $categoryRepository
    ) {}

    /**
     * Display catalog page with all categories.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = $this->categoryRepository
            ->getModel()
            ->where('status', 1)
            ->whereNull('parent_id')
            ->orderBy('position', 'ASC')
            ->with(['children' => function ($query) {
                $query->where('status', 1)->orderBy('position', 'ASC');
            }])
            ->get();

        return view('shop::catalog.index', compact('categories'));
    }
}
