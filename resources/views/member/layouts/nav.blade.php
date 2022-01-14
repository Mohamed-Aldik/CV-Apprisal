<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand">{{ auth()->user()->name }}</a>
  <form action="{{ route('member.logout') }}" method="POST" class="form-inline">
  @csrf
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
  </form>
</nav>
<br>
<br>
<br>
<br>
<br>