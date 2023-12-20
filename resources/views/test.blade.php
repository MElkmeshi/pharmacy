@auth
    <h1>Test</h1>
    <p>Hi, {{ Auth::user()->name }}</p>
    <p>Hi, {{ Auth::user()->can('Add_Product') ? 'he can' : "he can't" }}</p>
    <p>You are logged in!</p>
@else
    <p>You are not logged in!</p>
@endauth
