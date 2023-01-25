<?php

function getSetting($settingname = 'sitename'){
    return \App\SiteSetting::where('namesetting', $settingname)->get()[0]->value;
}

function checkIfImageExists($imageName, $pathImage = '/website/images/', $url='/website/images/')
{
    if ($imageName !='') {
        $path = base_path() .'/public/'.$pathImage.$imageName;

        if (file_exists($path)) {
            return Request::root().$url.$imageName;
        }
    }else {
        return getSetting('user_image');
    }
}

function uploadImage($file,$request, $path='/public/website/images/', $width= '500' , $height= '362' , $deleteFileWithName = ''){


    if($deleteFileWithName != ''){
        deleteImage( base_path().$path.'/'.$deleteFileWithName);
    }
//    $dim= getimagesize($request);

   $fileName= $request;
//       ->getClientOriginalName();
    $file->move(
      base_path().$path,$fileName
    );


    if($width == '500' && $height == '362'){
        $thumpPath= base_path().'/public/website/thumb/';
        $thumpPathNew =$thumpPath.$fileName;
        \Intervention\Image\facades\Image::make(base_path().$path.'/'.$fileName)->resize('500', '362')->save($thumpPathNew , 100);
        if($deleteFileWithName != ''){
            deleteImage( $thumpPath.$deleteFileWithName);
        }
    }

    return $fileName;

}

function deleteImage($deleteFileWithName){
    if(file_exists($deleteFileWithName)){
        \Illuminate\Support\Facades\File::delete($deleteFileWithName);
    }
}





function setActive($array, $class = "active")
{
    if (!empty($array)) {
        $seg_array = [];
        foreach ($array as $key => $url) {
            if (Request::segment($key + 1) == $url) {
                $seg_array[] = $url;
            }
        }
        if (count($seg_array) == count(Request::segments())) {
            if (isset($seg_array[0])) {
                return $class;
            }
        }
    }

}

function gender(){
    $array=['Male','Female'
    ];
    return $array;
}



    function status(){
        $array=['Not Activated','Activated'

        ];
        return $array;
    }


function countAllItems($status){
    return \App\Item::where('status', $status)->count();
}
function unreadMessage(){
    return \App\ContactUs::where('view' , 0)->get();
}
function countunreadMessage(){
    return \App\ContactUs::where('view' , 0)->count();
}



