<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h2>Add User ➕</h2>

        <form action="{{ route('updateUser', $user->id) }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name_f" value="{{ $user->name }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email_f" value={{ $user->email }} class="form-control">
            </div>

            <button type="submit" name="update" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>
