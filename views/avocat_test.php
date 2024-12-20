<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js"></script>
    <title>Choisir les dates disponibles</title>
</head>
<body>
    <h1>Sélectionner les dates disponibles</h1>
    <div id="calendar"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'fr', 
                selectable: true, 
                validRange: {
                    start: new Date().toISOString().split('T')[0] 
                },
                events: function (fetchInfo, successCallback, failureCallback) {
                    fetch('/obtenir-dates-disponibles.php?lawyer_id=1')
                        .then(response => response.json())
                        .then(data => successCallback(data))
                        .catch(error => failureCallback(error));
                },
                dateClick: function (info) {
                    if (confirm(`Voulez-vous ajouter cette date (${info.dateStr}) comme disponible ?`)) {
                        fetch('/ajouter-date-disponible.php', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify({
                                lawyer_id: 1, 
                                available_date: info.dateStr
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            alert(data.message);
                            if (data.success) {
                                calendar.addEvent({
                                    title: 'Disponible',
                                    start: info.dateStr,
                                    allDay: true
                                });
                            }
                        })
                        .catch(error => {
                            alert("Une erreur est survenue : " + error.message);
                        });
                    }
                }
            });

            calendar.render();
        });
    </script>
</body>
</html>
