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
        <h1>Locatie detailpagina</h1>

        <h2>{{ locatie.naam }} in het {{ natuurgebied.naam }}</h2>  
        <p>{{ locatie.beschrijving }}</p>  


    </table>
</body>
</html>