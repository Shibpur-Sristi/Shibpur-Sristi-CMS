<!DOCTYPE html>
<html lang="en">

<head>
    <?php include './includes/head.php'; ?>
</head>

<body>

    <?php include './includes/nav.php'; ?>

    <main>
        <div class="header">Udvaban</div>
        <hr>
        <h6 class="center">Coming Soon</h6>
        <div class="container">
            <br>
            <!-- <div class="center">
                <a href="add-project.php?project=Event" class="btn-primary">New Magazine</a>
            </div> -->
            <br>
            <!-- <table class="highlight">
                <thead>
                    <tr>
                        <th>Project Name</th>
                        <th>Location</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody id="projects">

                </tbody>
            </table>
            <p>&nbsp;</p> -->
        </div>
    </main>

    <?php include './includes/scripts.php'; ?>

    <script>
    // const setProjects = (projects) => {
    //     var template = '';
    //     projects.forEach(project => {
    //         template += `<tr>
    //         <td>${project.name}</td>
    //         <td>${project.location}</td>
    //         <td>${project.date}</td>
    // 		<td>
    // 			<a href="edit-project.php?project=${project.name}"><i class="far fa-edit"></i></a>&emsp;&emsp;
    // 			<a href="delete-project.php?project=${project.name}"><i class="fas fa-trash-alt"></i></a> 
    // 		</td>
    //       </tr>`;
    //     })

    //     return template;
    // }

    // doAjax('api/api_projects.php', 'GET', {
    //         project: 'Event'
    //     })
    //     .then(response => {
    //         var projects = JSON.parse(response).data;
    //         $('#projects').html(setProjects(projects));
    //     })

    auth.onAuthStateChanged(user => {
        if (user) {} else {
            window.location = "login.php"
        }
    })
    </script>
</body>

</html>