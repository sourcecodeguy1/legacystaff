@if(Auth::user()->privilege_type === 'admin')
    <h1>This is the users page.</h1>
    @else
    <h1>You do not have privileges to view this page.</h1>
@endif
