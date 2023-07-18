
<h1>Contact edit form page</h1>

<form action="{{ route('contact.update',$contact->id) }}" method="POST">
    @csrf
    <div style="margin-bottom: 10px">
        <input type="text" value="{{ $contact->phone }}" name="phone" placeholder="Enter phone">
    </div>
    <div style="margin-bottom: 10px">
        <input type="text" value="{{ $contact->street }}"  name="street" placeholder="Enter street">
    </div>
    <div style="margin-bottom: 10px">
        <input type="text" value="{{ $contact->distric }}" name="distric" placeholder="Enter distric">
    </div>
    <div style="margin-bottom: 10px">
        <input type="text" name="address" value="{{ $contact->address }}"  placeholder="Enter address">
    </div>
    <div style="margin-bottom: 10px">
        <input type="text" name="days" value="{{ $contact->days }}" placeholder="Enter days">
    </div>
    <div style="margin-bottom: 10px">
        <input type="text" value="{{ $contact->hours }}" name="hours" placeholder="Enter hours">
    </div>
    <button type="submit">Submit</button>

</form>
