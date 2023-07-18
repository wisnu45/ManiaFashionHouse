<h1>About edit form page</h1>
<form action="{{ route('about.update',$about->id) }}" method="POST">
    @csrf
    <div style="margin-bottom: 10px">
        <input type="text" value="{{ $about->about_title }}" name="about_title" placeholder="Enter about title">
    </div>
    <div style="margin-bottom: 10px">
        <textarea  name="short_notes"  placeholder="Enter short notes" id="" cols="30" rows="10">
            {{ $about->short_notes }}
        </textarea>
       
    </div>
    <div style="margin-bottom: 10px">
        <input type="text" value="{{ $about->quotes }}" name="quotes" placeholder="Enter quotes">
    </div>
    <div style="margin-bottom: 10px">
        <input type="text" value="{{ $about->author_name }}" name="author_name" placeholder="Enter author name">
    </div>
    <div style="margin-bottom: 10px">
        <textarea name="our_story" placeholder="Enter our story" cols="30" rows="10">
           {{ $about->our_story }}
        </textarea>
   
    </div>
    
    <button type="submit">Submit</button>
   



</form>