
<h1>Subscription page</h1>
<form action="{{ route('subscription.store') }}" method="POST">
    @csrf
    <div style="margin-bottom: 10px">
        <input type="text"  name="email" placeholder="email">
    </div>
   
    
   
    
    <button type="submit">Submit</button>
   



</form>