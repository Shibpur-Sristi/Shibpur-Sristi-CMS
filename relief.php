<!DOCTYPE html>
<html lang="en">

<head>
    <?php include './includes/head.php'; ?>
</head>

<body>

    <?php include './includes/nav.php'; ?>

    <main>
        <div class="header">Relief Works</div>
        <hr>

        <div class="container">
            <br>
            <div class="center">
                <a href="add-project.php?project=Relief" class="btn-primary">New Project</a>
            </div>
            <br>
            <table class="highlight">
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
            <p>&nbsp;</p>
        </div>
    </main>

    <?php include './includes/scripts.php'; ?>

    <script>
    const setProjects = (projects) => {
        var template = '';
        projects.forEach(project => {
            /*template += `<div class="col s12 m4">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-title">${project.name.substring(0,20)} <a href="#"><span class="right"><i
                                            class="far fa-edit"></i></span></a>
                            </div>
                            <div><i class="fas fa-map-marker-alt"></i> ${project.location}</div>
							<!--<div><i class="fas fa-calendar-day"></i> ${project.date}</div>-->
                        </div>
                    </div>
                </div>`;*/
            template += `<tr>
            <td>${project.name}</td>
            <td>${project.location}</td>
            <td>${project.date}</td>
			<td>
				<a href="edit-project.php?project=${project.name}"><i class="far fa-edit"></i></a>&emsp;&emsp;
				<a href="#" onclick="handleDelete('${project.name}')"><i class="fas fa-trash-alt"></i></a> 
			</td>
          </tr>`;
        })

        return template;
    }

    doAjax('api/api_projects.php', 'GET', {
            project: 'Relief'
        })
        .then(response => {
            var projects = JSON.parse(response).data;
            $('#projects').html(setProjects(projects));
        })

    const handleDelete = (project) => {
        // e.preventDefault();
        if (confirm("Do you really want to delete?")) {
            window.location.href = "api/api_deleteProject.php?project=" + project + "&type=relief";
        }
    }
    auth.onAuthStateChanged(user => {
        if (user) {} else {
            window.location = "login.php"
        }
    })
    </script>
</body>

</html>