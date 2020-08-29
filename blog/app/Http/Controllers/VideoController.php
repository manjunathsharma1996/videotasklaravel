<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Video;
use Session;
use Illuminate\Support\Facades\Storage;
class VideoController extends Controller
{   
	
    public function show(){
	$videos = Video::all();
        return view('show-videos',compact('videos'));
    }

    public function add(){
	return view('add-video');
    }
    public function create(Request $request){
	
	$this->validate($request, [
        'title' => 'required',
        'description' => 'required'
    ]);

    $input = $request->all();
	
	if($request->hasFile('video'))
        {


		$rules=[
                'video'          =>'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040|required'];
             $validator = Validator($input,$rules);

             if ($validator->fails()){
                 return redirect()
                             ->back()
                             ->withErrors($validator)
                             ->withInput();
             }else{
                           $video_path = $request->file('video')->store('uploads/videos','public');
                    }
            
        }
        if($request->hasFile('image'))
        {
            $rules=[
                'image'          =>'mimes:jpeg,png,jpg|max:100040|required'];
             $validator = Validator($input,$rules);

             if ($validator->fails()){
                 return redirect()
                             ->back()
                             ->withErrors($validator)
                             ->withInput();
             }else{
                           $image_path = $request->file('image')->store('uploads/images','public');
                    }
        }
	if($request->hasFile('watermark'))
        {
            $rules=[
                'watermark'          =>'mimes:jpeg,png,jpg|max:100040|required'];
             $validator = Validator($input,$rules);

             if ($validator->fails()){
                 return redirect()
                             ->back()
                             ->withErrors($validator)
                             ->withInput();
             }else{
                           $wm_path = $request->file('watermark')->store('uploads/watermarks','public');
                    }
        }   

	$video = new Video();

        $video->name = request('title');
        $video->description = request('description');
        $video->image = $image_path;
        $video->watermark = $wm_path;
        $video->video = $video_path;
        $video->save();

        return redirect('/videos');
    }
    public function edit( Video $video )
    {
    return view('edit-video', compact('video'));
    }
    public function update(Request $request, Video $video )
    {
    $input = $request->all();
	$video_path =$video->video;
	if($request->hasFile('video'))
        {


		$rules=[
                'video'          =>'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040|required'];
             $validator = Validator($input,$rules);

             if ($validator->fails()){
                 return redirect()
                             ->back()
                             ->withErrors($validator)
                             ->withInput();
             }else{
                           $video_path = $request->file('video')->store('uploads/videos','public');
                    }
            
        }
	$image_path =$video->image;
        if($request->hasFile('image'))
        {
            $rules=[
                'image'          =>'mimes:jpeg,png,jpg|max:100040|required'];
             $validator = Validator($input,$rules);

             if ($validator->fails()){
                 return redirect()
                             ->back()
                             ->withErrors($validator)
                             ->withInput();
             }else{
                           $image_path = $request->file('image')->store('uploads/images','public');
                    }
        }
	$wm_path =$video->watermark;
	if($request->hasFile('watermark'))
        {
            $rules=[
                'watermark'          =>'mimes:jpeg,png,jpg|max:100040|required'];
             $validator = Validator($input,$rules);

             if ($validator->fails()){
                 return redirect()
                             ->back()
                             ->withErrors($validator)
                             ->withInput();
             }else{
                           $wm_path = $request->file('watermark')->store('uploads/watermarks','public');
                    }
        }   
	
    Video::where('id', $video->id)->update([
				'name' =>$input['name'],
				'description'=>$input['description'],
				'image'=>$image_path,
				'watermark'=>$wm_path,
				'video'=>$video_path
				]);

    return redirect('videos');

}
 public function delVideo($id)
    {
	if(auth()->user()->roles->first()['id']==1){
        $video = Video::find($id);
        $video->delete();
	}
        else{
	Session::flash('flash_message', 'You cant delete video'); 
	}

        return redirect('videos');
    }
}