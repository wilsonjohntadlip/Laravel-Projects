<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Test Blog</title>
</head>

<body>

    @auth
    
        <p>Congratulations, you are logged in!</p>
        <form action="/logout" method="POST">
            @csrf
            <button>Logout</button>
        </form>
        <div style="border: 3px solid black;">
            <h2>Create a New Post</h2>
            <form action="/create-post" method="POST">
                @csrf
                <input name="title" type="text" placeholder="title">
                <textarea name="body" placeholder="body content..."></textarea>
                <button>Create Post</button>
            </form>
        </div>

        <div style="border: 3px solid black;">
            <h2>All Posts</h2>
            @foreach ($posts as $post)
                <div style="background-color: gray; padding: 10px; margin: 10px; border: 3px solid black;">
                    <h3>{{$post['title']}}</h3>
                    {{$post['body']}}
                </div>
            @endforeach

        </div>

    @else
        <div style="border: 3px solid black;">
            <h2>Register</h2>
            <form action="/register" method="POST">
                @csrf
                <input name="name" type="text" placeholder="name">
                <input name="email" type="text" placeholder="email">
                <input name="password" type="password" placeholder="password">
                <button>Register</button>
            </form>
        </div>
        <div style="border: 3px solid black;">
            <h2>Login</h2>
            <form action="/login" method="POST">
                @csrf
                <input name="loginname" type="text" placeholder="name">
                <input name="loginpassword" type="password" placeholder="password">
                <button>Log in</button>
            </form>
        </div>
    @endauth

</body>

</html>




