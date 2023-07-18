<form action="{{ route('subscription.email.sent',$id) }}" method="POST">
    @csrf
    <div style="margin-bottom: 10px">
        <input type="text"  name="heading" placeholder="heading">
    </div>
    <div style="margin-bottom: 10px">
        <input type="text"  name="subject" placeholder="subject">
    </div>
    <div style="margin-bottom: 10px">
        <textarea name="email_description" id="" cols="30" rows="10"></textarea>
    </div>
   
    <button type="submit">Sent</button>
   



</form>