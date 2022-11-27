<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TrainStationRequest;
use App\Models\TrainStation;
use Illuminate\Http\Request;

class TrainStationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $train_stations = TrainStation::paginate(10);
        return view('pages.train_stations.index', [
            'transaction_stations' => $train_stations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.train_stations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrainStationRequest $request)
    {
        $data = $request->all();
        TrainStation::create($data);
        return redirect()->route('train-station.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrainStation  $trainStation
     * @return \Illuminate\Http\Response
     */
    public function show(TrainStation $trainStation)
    {
        return view('pages.train_stations.show', [
            'train_station' => $trainStation
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrainStation  $trainStation
     * @return \Illuminate\Http\Response
     */
    public function edit(TrainStation $trainStation)
    {
        return view('pages.train_stations.edit', [
            'train_station' => $trainStation
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrainStation  $trainStation
     * @return \Illuminate\Http\Response
     */
    public function update(TrainStationRequest $request, TrainStation $trainStation)
    {
        $data = $request->all();
        $trainStation->update($data);
        return redirect()->route('train-station.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrainStation  $trainStation
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrainStation $trainStation)
    {
        $trainStation->delete();
        return redirect()->route('train-station.index')->with('success', 'Data berhasil dihapus');
    }
}
