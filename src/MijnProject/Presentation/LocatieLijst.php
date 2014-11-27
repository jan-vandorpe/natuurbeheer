<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Lijst van locaties voor natuurgebied XYZ</title>
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
        <h1>Lijst van locaties voor natuurgebied XYZ</h1>
        <table>
            <tr>
                <th>id</th>
                <th>naam</th>
                <th>Beschrijving</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Info</th>
            </tr>
            {% for locatie in locatielijst %}
            <tr>
                <td>{{ locatie.id }}</td>
                <td><a href="locatiedetail.php?locId={{ locatie.id }}">{{locatie.naam}}</a></td>
                <td>{{locatie.beschrijving}}</td>
                <td>{{locatie.geo_lat}}</td>
                <td>{{locatie.geo_long}}</td>
                <td>{{locatie.info}}</td>
            </tr>
            {% endfor %}
        </table>
    </body>
</html>