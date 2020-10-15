<h1>@yield('h1')</h1>
<form method="post" action="@yield('action')">
    @yield('form-header')
    @csrf
    <div class="form-body">
        <input type="text" name="title" value="@yield('title-input')"/>
        <label for="title">Title</label>
        <textarea name="body">@yield('body-input')</textarea>
        <label for="body">Body</label>
    </div>
    <button>Submit</button>
</form>
