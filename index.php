<!DOCTYPE html>
<html lang="en">

<head>
    <?php include './includes/head.php'; ?>
    <script>
    auth.onAuthStateChanged(user => {
        if (user) {} else {
            window.location = "login.php"
        }
    })
    </script>
</head>

<body>
    <?php include './includes/nav.php'; ?>

    <main>
        <div class="header">Admin Dashboard</div>
        <hr>

        <div class="container">
            <div class="row">

                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-title red-text darken-2">Paridhan</div>
                            <div>Uploaded Projects : <b id="paridhan-count">16</b></div>
                        </div>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-title blue-text darken-2">Shikshan</div>
                            <div>Uploaded Projects : <b id="shikshan-count">16</b></div>
                        </div>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-title green-text darken-2">Events</div>
                            <div>Uploaded Projects : <b id="event-count">16</b></div>
                        </div>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-title amber-text darken-2">Udvaban</div>
                            <div>Uploaded Projects : <b id="udvaban-count">16</b></div>
                        </div>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-title cyan-text darken-2">Relief Works</div>
                            <div>Uploaded Projects : <b id="relief-count">16</b></div>
                        </div>
                    </div>
                </div>
            </div>

            <p>&nbsp;</p>
        </div>
    </main>

    <?php include './includes/scripts.php'; ?>

    <script>
    const frequencies = arr => {
        var object = {};
        arr.forEach(elem => {
            object[elem.type] = object[elem.type] ? object[elem.type] + 1 : 1;
        })

        return object;
    }

    doAjax('api/api_dashboard.php', 'GET', {})
        .then(response => {
            var projects = JSON.parse(response).data;
            projects = frequencies(projects);
            // console.log(projects);

            $('#paridhan-count').html(projects.Paridhan);
            $('#shikshan-count').html(projects.Shikshan);
            $('#event-count').html(projects.Event);
            $('#relief-count').html(projects.Relief);
            $('#udvaban-count').html('-');
            // $('#projects').html(setProjects(projects));
        })
    </script>
</body>

</html>