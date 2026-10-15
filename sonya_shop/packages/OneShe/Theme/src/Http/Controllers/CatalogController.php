<?php

namespace OneShe\Theme\Http\Controllers;

use Illuminate\View\View;
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\Shop\Http\Controllers\Controller;

class CatalogController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct(protected CategoryRepository $categoryRepository) {}

    /**
     * Display every active top-level category of the current channel.
     */
    public function index(): View
    {
        $categories = $this->categoryRepository->getVisibleCategoryTree(
            core()->getCurrentChannel()->root_category_id
        );

        return view('shop::catalog.index', compact('categories'));
    }
}
