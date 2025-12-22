<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::with('category')->get();
        return view('admin.faq.index', compact('faqs'));
    }

    public function create()
    {
        $categories = FaqCategory::all();
        return view('admin.faq.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required',
            'answer' => 'required',
        ]);

        Faq::create($data);

        return redirect()->route('admin.faqs.index');
    }

    public function edit(Faq $faq)
    {
        $categories = FaqCategory::all();
        return view('admin.faq.edit', compact('faq', 'categories'));
    }

    public function update(Request $request, Faq $faq)
    {
        $data = $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq->update($data);

        return redirect()->route('admin.faqs.index');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faqs.index');
    }
}
