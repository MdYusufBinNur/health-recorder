<?php


namespace App\Helper;

use App\Admin\Department;
use App\Admin\Doctor;
use App\Admin\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class Common
{
    const MESSAGE_ERROR = "Failed To Store Data";
    const MESSAGE_SUCCESS = "Data has been successfully stored";

    public static function save_file($image, string $directory)
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
            $request['image'] = self::save_file($request->photo, $model);
            $request = collect($request);
            $request->forget('photo');
        }
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
            default:
                break;
        }
    }
}
