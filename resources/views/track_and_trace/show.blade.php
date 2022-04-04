<link rel="stylesheet" href="{{ asset('css/custom.css') }}">

<h1>Current Status</h1>
<p>{{$trackAndTrace->package->status}}</p><br/>

@if($trackAndTrace->user_id == null)
    <a href="{{route('tat_add_user', $trackAndTrace->id)}}">Add to account</a>
@endif

@if($trackAndTrace->package->status === 'Afgeleverd')
    <h1>Feedback:</h1>
    <form>
        <p id="rating_value">3 Stars</p>
        <input type="range" min="1" max="5" value="3" class="slider" id="rating">
        <br/>
        <label for="comment">Comment:</label>
        <br/>
        <textarea id="comment" rows="4" cols="50"></textarea>
        <br/>
        <button type="submit">Submit Feedback</button>
    </form>

    <script>
        var slider = document.getElementById("rating");
        var output = document.getElementById("rating_value");
        output.innerHTML = slider.value; // Display the default slider value

        // Update the current slider value (each time you drag the slider handle)
        slider.oninput = function() {
            output.innerHTML = this.value + ' Stars';
        }
    </script>
@endif
