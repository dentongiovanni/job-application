<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicantRequest;
use App\Http\Requests\UpdateApplicantRequest;
use App\Services\ApplicantService;
use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    protected $applicantService;

    public function __construct(ApplicantService $applicantService)
    {
        $this->applicantService = $applicantService;
    }

    public function index()
    {
        $applicants = $this->applicantService->getAll();
        return view('applicants.index', compact('applicants'));
    }

    public function create()
    {
        return view('applicants.form');
    }

    public function store(StoreApplicantRequest $request)
    {
        $this->applicantService->create($request->validated());
        return redirect()->route('applicants.index')->with('success', 'Applicant added successfully.');
    }

    public function edit($id)
    {
        $applicant = $this->applicantService->findById($id);
        return view('applicants.form', compact('applicant'));
    }

    public function update(UpdateApplicantRequest $request, $id)
    {
        $this->applicantService->update($id, $request->validated());
        return redirect()->route('applicants.index')->with('success', 'Applicant updated successfully.');
    }

    public function destroy($id)
    {
        $this->applicantService->delete($id);
        return redirect()->route('applicants.index')->with('success', 'Applicant deleted successfully.');
    }


    public function show($id)
    {
        $query = $request->search;

        $applicants = Applicant::where('last_name', 'LIKE', "%$query%")
            ->orWhere('first_name', 'LIKE', "%$query%")
            ->orWhere('city', 'LIKE', "%$query%")
            ->orWhere('position_applied', 'LIKE', "%$query%")
            ->get();

        return view('applicants.partials.table', compact('applicants'));
    }


    public function search(Request $request)
    {
        $query = $request->search;

        $applicants = Applicant::where('last_name', 'LIKE', "%$query%")
            ->orWhere('first_name', 'LIKE', "%$query%")
            ->orWhere('city', 'LIKE', "%$query%")
            ->orWhere('position_applied', 'LIKE', "%$query%")
            ->get();

        return view('applicants.partials.table', compact('applicants'));
    }

}
