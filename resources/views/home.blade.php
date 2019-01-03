<div>
    <div>
        <h1>Search city</h1>
        <form action="{{ route('search.city') }}"  class="form-inline my-2 my-lg-0" method="post">
            @csrf
            <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search" required>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>

</div>