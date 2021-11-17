<!DOCTYPE html>
<html>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<body>

    <h1>Edit a copy</h1>
<div>
    <form method="POST" action="{{ route('bookinstances.update', ['bookinstance' => $book_instance]) }}">
        @csrf
        @method('PATCH')

        <label for="books">Books ({{ $book_instance->book->name }})</label>
        <select id="books" name="books">
            @foreach ($books as $book)
                <option value={{ $book->id }}>{{ $book->name }}</option>
            @endforeach
        </select>

        <label for="users">Borrower ({{ $book_instance->borrower->name }})</label>
        <select id="users" name="users">
            @foreach ($users as $user)
                <option value={{ $user->id }}>{{ $user->name }}</option>
            @endforeach
        </select>

        <input type="hidden" name="is_available" value="0">
        <label for="name">Availability</label>
        <input type="checkbox" id="is_available" name="is_available" value="1" checked> <br>

        <label for="name">Due Back Date:</label>
        <input type="date" id="due_back" name="due_back" value='{{ $book_instance->due_back }}'> <br>

        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>