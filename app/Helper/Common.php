<?php


namespace App\Helper;

use App\Admin\Appointment;
use App\Admin\Department;
use App\Admin\Doctor;
use App\Admin\Hospital;
use App\Admin\Schedule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class Common
{
    const MESSAGE_ERROR = "Failed To Store Data";
    const MESSAGE_SUCCESS = "Data has been successfully stored";
    const MESSAGE_UPDATE_SUCCESS = "Data has been updated successfully";
    const MESSAGE_UPDATE_ERROR = "Failed to update !!";
    const MESSAGE_DELETE_SUCCESS = "Data has been deleted successfully";
    const MESSAGE_DELETE_ERROR = "Failed to delete !! ";

    public static function _saveFiles($image, string $directory)
    {
        $path = 'image/' . $directory;
        if (!File::exists($path)) {
            File::makeDirectory($path, false, false);
        }
        $fileType = $image->getClientOriginalExtension();
        $imageName = rand() . '.' . $fileType;
        $path_info = pathinfo($imageName, PATHINFO_EXTENSION);
        $directory = $path . "/";
        if ($path_info == 'pdf' || $path_info == 'docx') {
            $imageUrl = $directory . $imageName;
            $image->move($directory, $imageName);
        } else if ($path_info == "png" || $path_info == 'jpeg' || $path_info == "jpg" || $path_info == "PNG" || $path_info == "JPEG" || $path_info == "JPG") {
            $imageUrl = $directory . $imageName;
            Image::make($image)->save($imageUrl);
        } else {
            $imageUrl = "No Valid File";
        }
        return $imageUrl;
    }
    public static function _deleteFiles($file)
    {
        File::delete($file);
    }
    public static function _response($data, $error, $message)
    {
        if ($error) {
            $response['error'] = true;
            $response['data'] = null;
        } else {
            $response['error'] = false;
            $response['data'] = $data;
        }
        $response['message'] = $message;
        return response()->json($response);
    }
    public static function _insert(Request $request, $model)
    {
        if ($request->hasFile('photo')) {
            $request['image'] = self::_saveFiles($request->photo, $model);
            $request = collect($request);
            $request->forget('photo');
        }
        if ($request->get('_token')) {
            $request->forget('_token');
        }
        if (!empty($request['id']))
        {
            switch ($model) {
                case 'doctor':
                    if ($data = Doctor::find($request['id'])) {
                        if ($request['image']){
                            self::_deleteFiles($data->image);
                        }
                        $data->update($request->all());
                        return self::_response('', false, self::MESSAGE_UPDATE_SUCCESS);
                    }
                    return self::_response('', true, self::MESSAGE_UPDATE_ERROR);
                case 'hospital':
                    if ($data = Hospital::find($request['id'])) {
                        if ($request['image']){
                            self::_deleteFiles($data->image);
                        }
                        $data->update($request->all());
                        return self::_response('', false, self::MESSAGE_UPDATE_SUCCESS);
                    }
                    return self::_response('', true, self::MESSAGE_UPDATE_ERROR);
                case 'department':
                    if ($data = Department::find($request['id'])) {
                        if ($request['image']){
                            self::_deleteFiles($data->image);
                        }
                        $data->update($request->all());
                        return self::_response('', false, self::MESSAGE_UPDATE_SUCCESS);
                    }
                    return self::_response('', true, self::MESSAGE_UPDATE_ERROR);
                case 'appointment':
                    if ($data = Appointment::find($request['id'])) {
                        if ($request['image']){
                            self::_deleteFiles($data->image);
                        }
                        $data->update($request->all());
                        return self::_response('', false, self::MESSAGE_UPDATE_SUCCESS);
                    }
                    return self::_response('', true, self::MESSAGE_UPDATE_ERROR);
                case 'schedule':
                    if ($data = Schedule::find($request['id'])) {
                        if ($request['image']){
                            self::_deleteFiles($data->image);
                        }
                        $data->update($request->all());
                        return self::_response('', false, self::MESSAGE_UPDATE_SUCCESS);
                    }
                    return self::_response('', true, self::MESSAGE_UPDATE_ERROR);
                default:
                    break;
            }
        }
        else{
            switch ($model) {
                case 'doctor':
                    if (Doctor::insert($request->all())) {
                        return self::_response('', false, self::MESSAGE_SUCCESS);
                    }
                    return self::_response('', true, self::MESSAGE_ERROR);
                case 'hospital':
                    if (Hospital::insert($request->all())) {
                        return self::_response('', false, self::MESSAGE_SUCCESS);
                    }
                    return self::_response('', true, self::MESSAGE_ERROR);
                case 'department':
                    if (Department::insert($request->all())) {
                        return self::_response('', false, self::MESSAGE_SUCCESS);
                    }
                    return self::_response('', true, self::MESSAGE_ERROR);
                case 'appointment':
                    if (Appointment::insert($request->all())) {
                        return self::_response('', false, self::MESSAGE_SUCCESS);
                    }
                    return self::_response('', true, self::MESSAGE_ERROR);
                case 'schedule':
                    if (Schedule::insert($request->all())) {
                        return self::_response('', false, self::MESSAGE_SUCCESS);
                    }
                    return self::_response('', true, self::MESSAGE_ERROR);
                default:
                    break;
            }
        }

    }
    public static function _delete($data, $model)
    {
        switch ($model) {
            case 'doctor':
                if (Doctor::find($data->id)) {
                    Doctor::find($data->id)->delete();
                    return self::_response('', false, self::MESSAGE_DELETE_SUCCESS);
                }
                return self::_response('', true, self::MESSAGE_DELETE_ERROR);
            case 'hospital':
                if (Hospital::find($data->id)) {
                    Hospital::find($data->id)->delete();
                    return self::_response('', false, self::MESSAGE_DELETE_SUCCESS);
                }
                return self::_response('', true, self::MESSAGE_DELETE_ERROR);
            case 'department':
                if (Department::find($data->id)) {
                    Department::find($data->id)->delete();
                    return self::_response('', false, self::MESSAGE_DELETE_SUCCESS);
                }
                return self::_response('', true, self::MESSAGE_DELETE_ERROR);
            case 'appointment':
                if (Appointment::find($data->id)) {
                    Appointment::find($data->id)->delete();
                    return self::_response('', false, self::MESSAGE_DELETE_SUCCESS);
                }
                return self::_response('', true, self::MESSAGE_DELETE_ERROR);
            case 'schedule':
                if (Schedule::find($data->id)) {
                    Schedule::find($data->id)->delete();
                    return self::_response('', false, self::MESSAGE_DELETE_SUCCESS);
                }
                return self::_response('', true, self::MESSAGE_DELETE_ERROR);
            default:
                break;
        }
    }
    public static function _notify ($data) {
        return $data;
        if (!$data->error){
            return back()->with('success',$data->message);
        }else{
            return back()->with('error',$data->message);
        }
    }
}
