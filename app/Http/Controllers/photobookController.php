<?php
namespace App\Http\Controllers;
use App\Photobook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class photobookController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index(){
        $data = Photobook::all();
        return response($data);
    }
    public function show($id){
        $data = Photobook::where('id',$id)->get();
        return response ($data);
    }
    public function store (Request $request){
        $data = new Photobook();
        $data->title = $request->input('title');
        $data->caption = $request->input('caption');
        $data->filename=$request->input('filename');
        $data->save();
    
        return response('Berhasil Tambah Data');
    }

    public function update(Request $request, $id){
        $data = Photobook::where('id',$id)->first();
        $data->title = $request->input('title');
        $data->caption = $request->input('caption');
        $data->filename=$request->input('filename');
        $data->save();
    
        return response('Berhasil Merubah Data');
    }
    
    public function destroy($id){
        $data = Photobook::where('id',$id)->first();
        $data->delete();
    
        return response('Berhasil Menghapus Data');
    }

    public function upload(Request $request){
        // cache the file
        $file = $request->file('file');
  
        // generate a new filename. getClientOriginalExtension() for the file extension
        $filename = $file->getClientOriginalName();
    
        // save to storage/app/photos as the new $filename
        $path = $file->storeAs('storage', $filename);
    
        dd($path);
      }
  
      public function del(Request $request, $dfile){
              unlink('../public/storage/'.$dfile);         
              return "Fail berjaya dibuang";
          
          
      }

}

