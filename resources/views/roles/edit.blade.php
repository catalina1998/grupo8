<h1>Editar rol</h1>
<form action="/roles/main/edited" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$rol->id}}">
    <input type="text" name="rol" value="{{$rol->rol}}"><br><br>
    <button type="submit">Actualizar </button>
</form>