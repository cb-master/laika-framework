<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            padding: 2rem;
        }

        h1 {
            font-size: 3rem;
            color: #0b5394;
        }

        p {
            font-size: 1.2rem;
            margin-top: 1rem;
            color: #555;
        }

        .version {
            margin-top: 2rem;
            font-size: 0.9rem;
            color: #999;
        }

        .docs-link {
            display: inline-block;
            margin-top: 2rem;
            padding: 0.8rem 1.5rem;
            background-color: #0b5394;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .docs-link:hover {
            background-color: #06386d;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{welcome}}</h1>
        <p>Your lightweight MVC PHP framework for fast and clean development.</p>
        <a class="docs-link" href="{{app_info['url.doc']}}">Read the Docs</a>
        <div class="version">Framework version: {{app_info['version']}}</div>
    </div>
</body>
</html>
