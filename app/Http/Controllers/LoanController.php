<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Loan;

class LoanController extends Controller
{
    public function index() {
        return view('loans.index', compact('loans'));
    }

    public function show($id) {
        $loan = Loan::with(['book', 'reader'])->find($id);
        if (!$loan) {
            return response()->json(['message' => 'Loan not found'], 404);
        }
        return view('loans.show', compact('loan'));
    }

    public function create()
    {
        return view('loans.loan');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'reader_id' => 'required|exists:readers,id',
            'loan_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:loan_date',
        ]);

        Loan::create($validated);

        return redirect()->route('loans.index')->with('success', 'Loaned copy successfully');
    }

    public function returnCopy(Request $request) {
        $validated = $request->validate([
            'loan_id' => 'required|exists:loans,id',
            'return_date' => 'required|date|after_or_equal:loan_date',
        ]);

        $loan = Loan::find($validated['loan_id']);
        $loan->return_date = $validated['return_date'];
        $loan->save();

        return redirect()->route('loans.index')->with('success', 'Copy returned successfully');
    }
}
