@extends('layouts.app')

@section('content')
<h1>Add Kangaroo</h1>

<form action="{{ route('kangaroos.store') }}" method="POST">
    @csrf

    <label for="name">Name:</label>
    <input type="text" name="name" required>

    <label for="nickname">Nickname:</label>
    <input type="text" name="nickname">

    <label for="weight">Weight:</label>
    <input type="number" name="weight" step="0.01" required>

    <label for="height">Height:</label>
    <input type="number" name="height" step="0.01" required>

    <label for="gender">Gender:</label>
    <select name="gender" required>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>

    <label for="color">Color:</label>
    <input type="text" name="color">

    <label for="friendliness">Friendliness:</label>
    <select name="friendliness">
        <option value="friendly">Friendly</option>
        <option value="not friendly">Not Friendly</option>
    </select>

    <label for="birthday">Birthday:</label>
    <input type="date" name="birthday" required>

    <button type="submit">Add Kangaroo</button>
</form>
@endsection

