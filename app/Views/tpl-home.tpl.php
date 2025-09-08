{%extends 'template/layout'%}

{% block content prepend %}
<h2>{{ title }}</h2>
{% endblock %}

{% block footer %}
    <script>
        let newvar='{{ title }}';
    </script>
{% endblock %}