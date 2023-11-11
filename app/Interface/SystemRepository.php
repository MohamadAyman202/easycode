<?php

namespace App\Interface;

use App\Trait\UploadFile;
use Illuminate\Support\Facades\File;

class SystemRepository implements SystemInterface
{
    // Function System Store
    public function store(array $model, array $data, ?string $name_en = null, ?array $var = null, ?string $relationship_name = null, ?string $relationship_value = null, ?string $column_id = null, string $message, $request = null)
    {
        try {
            if (!empty($data)) {
                if ($request->hasFile('image')) {
                    $data['image'] = UploadFile::File("images/$var[0]/", $request->images);;
                }
                $vars =  $model[0]::query()->create($data);
                if ($request->hasFile('images')) {
                    $images = [];
                    foreach ($request->image as $key => $value) {
                        $image = UploadFile::File("images/$var[0]/", $value);
                        $images[] = $image;
                    }
                    foreach ($images as $key => $value) {
                        $var[1] = new $model[1]();
                        $var[1]->image = $value;
                        $var[1]->$column_id = $vars->id;
                        $var[1]->save();
                    }
                }
                if ($relationship_name !== null && $relationship_name !== null) {
                    $vars->$relationship_name->attach($relationship_value);
                }
                toastr()->success("Successfully Created $message", 'success');
                return redirect()->back();
            }
            toastr()->error("Not Successfully Created $message", 'error');
            return redirect()->back();
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    // Function System Update 
    public function update(array $model, int $id, array $data, ?string $name_en = null, ?array $var = null, ?string $relationship_name = null, ?string $relationship_value = null, ?string $column_id = null, string $message, $request = null, ?string $relations = null, ?string $image = null)
    {
        try {
            $vars = $model[0]::query()->findOrFail($id);
            if (!empty($data)) {
                if ($request->hasFile('image')) {
                    $data['image'] = UploadFile::File("images/$var[0]/", $request->images);;
                }
                if ($relations !== null) {
                    foreach ($vars->$relations as $key => $path) {
                        File::delete($path->$image);
                    }
                }
                $vars->update($data);
                if ($request->hasFile('images')) {
                    $images = [];
                    foreach ($request->image as $key => $value) {
                        $image = UploadFile::File("images/$var[0]/", $value);
                        $images[] = $image;
                    }
                    $model[1]::query()->where("$var[0]_id", $id)->delete();
                    foreach ($images as $key => $value) {
                        $var[1] = new $model[1]();
                        $var[1]->image = $value;
                        $var[1]->$column_id = $vars->id;
                        $var[1]->save();
                    }
                }
                if ($relationship_name !== null && $relationship_name !== null) {
                    $vars->$relationship_name->attach($relationship_value);
                }
                toastr()->success("Successfully Updated $message", 'success');
                return redirect()->back();
            }
            toastr()->error("Successfully Updated $message", 'error');
            return redirect()->back();
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    // Function System Delete
    public function delete($model, $id, $message, ?string $relations = null, ?string $image = null)
    {
        if (!empty($id)) {
            $var =  $model::query()->findOrFail($id);
            if ($relations !== null) {
                foreach ($var->$relations as $key => $path) {
                    File::delete($path->$image);
                }
            }
            $var->delete();
            toastr()->success("Successfully Deleted $message", 'success');
            return redirect()->back();
        }
        toastr()->error("Not Successfully Deleted $message", 'error');
        return redirect()->back();
    }
}
