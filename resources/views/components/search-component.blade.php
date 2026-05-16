<form method="GET" action="{{ url()->current() }}" class="mb-4">
    <div class="input-group" style="position: relative;top:12px">
        <input 
            type="text" 
            name="search" 
            value="{{ request('search') }}"
            class="form-control" 
            placeholder="Search..."
        >

        <button class="btn btn-primary" type="submit">
            Search
        </button>
    </div>
</form>