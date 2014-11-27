<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>lijst van natuurgebieden</title>
        <style>
            table { border-collapse:collapse; }
            td, th { border:1px solid black; padding: 3px; }
            th { background-color: #ddd; }
            .active1 {
                width: 1.5em;
                height: 1.5em;
                background-color: #00FF00;
            }
            .active0 {
                width: 1.5em;
                height: 1.5em;
                background-color: #FF0000;
            }
        </style>
    </head>
    <body>
        <h1>lijst van natuurgebieden</h1>
        <table>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th>Natuurgebied</th>
                <th>Beschrijving</th>
                <th>info</th>
            </tr>
            {% for natuurgebied in natuurgebiedlijst %}
            <tr>
                <td><a href="natuurgebied.php?natId={{ natuurgebied.id }}">Toon alle locaties voor dit natuurgebied</a></td>
                <td><a href="natuurgebiedqrcodes.php?natId={{ natuurgebied.id }}">Toon alle QR code voor de locaties van dit natuurgebied</a></td>
                <td><a href="bewerk.php?id={{ natuurgebied.id }}">Edit</a></td>
                <td>{{ natuurgebied.naam }}</td>
                <td>{{ natuurgebied.beschrijving }}</td>
                <td>{{ natuurgebied.info }}</td>
            </tr>
            {% endfor %}
        </table>
    </body>
</html>