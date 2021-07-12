<h1> Client Account </h1>
<form action="ClientController" method="POST">
    <input type="text" name="nom">
    {{@csrf_field() }}
    <br>
    <br>
    <input type="file" name="image">
    <br>
    <br>
    <button type="submit">submit</button>
</form>