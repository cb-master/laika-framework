<!doctype html>
<html>
    <head>
        <title>{{ title | ucfirst }}</title>
    </head>
    <body>
        <main>
            {% block content %}
                <p>This Page Loaded With Template Engine</p>
            {% endblock %}
        </main>
        {% block footer %}
        <script></script>
        {% endblock %}
    </body>
</html>