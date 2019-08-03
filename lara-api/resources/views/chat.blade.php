<div id="messages" ></div>
<form action="sendmessage" method="POST">
    @csrf
<input type="hidden" name="user" value="{{ $vendor->name }}" >
    <textarea class="form-control msg"></textarea>
    <br/>
<input type="button" value="Send" class="btn btn-success send-msg">
</form>
yyy