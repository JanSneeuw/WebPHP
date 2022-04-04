<h1>Identity Check</h1>
<form action="{{route('tat_identify', $trackAndTrace->id)}}">
    <label for="postal_code">What is your postal code?</label>
    <input type="text" id="postal_code" name="postal_code" placeholder="5223KT">

    <button type="submit">Show Track And Trace</button>
</form>
