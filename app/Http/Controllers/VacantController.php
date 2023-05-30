<?php

namespace App\Http\Controllers;

use App\Models\Vacant;
use Illuminate\Http\Request;

class VacantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('vacants.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vacants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacant $vacant)
    {
        $this->authorize('update', $vacant);

        return view('vacants.edit', [
            'vacant' => $vacant,
        ]);
    }
}
