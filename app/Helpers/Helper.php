<?php 
use App\Models\Settings;
use Illuminate\Http\Request;

  if(! function_exists('settings'))
  {
    function settings($key = null, $default = null)
    {
        if ($key === null) {
        return app(Settings::class);
    }

        return app(Settings::class)->get($key, $default);
    }
  }

if(! function_exists('storeImage'))
  {
    function storeImage(Request $request, $fieldname , $directory , $id , $tableName = null)
    {

        if( $request->hasFile($fieldname) ) {

            if ($request->file($fieldname)->isValid()) {

                if (!file_exists($directory)) {
  
                    mkdir($directory, 755, true);
                }
        
                $img = $request->file($fieldname);

                $imageSaveAsName = time() . $id . "-".$tableName."." . $img->getClientOriginalExtension();

                $img = Image::make($img->getRealPath())->resize(300, 300);              

                $image_url = $directory . $imageSaveAsName;  
                 
                $img->save(public_path($directory .$imageSaveAsName));
            }
            return $image_url;
        }

    }
  }