<?php

namespace App\Http\Controllers;

use App\Http\Resources\OptionResource;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends ApiController
{
    public function index()
    {
        return OptionResource::collection(Option::all());
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'value' => 'required|string',
        ]);

        return new OptionResource(Option::create($fields));
    }

    public function show($id)
    {
        $option = Option::find($id);

        if (!$option) {
            return $this->responseNotFound();
        }

        return new OptionResource($option);
    }

    public function update(Request $request, $id)
    {
        $option = Option::find($id);

        if (!$option) {
            return $this->responseNotFound();
        }

        $fields = $request->validate([
            'name' => 'string',
            'value' => 'string',
        ]);

        $option->update($fields);
        return new OptionResource($option);
    }

    public function destroy($id)
    {
        $option = Option::find($id);

        if (!$option) {
            return $this->responseNotFound();
        }

        $option->delete();
        return $this->responseMessage('Destroyed.');
    }
}