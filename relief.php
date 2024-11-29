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
            let template = '';
            projects.forEach(project => {
                template += `<tr>
                    <td>${project.name}</td>
                    <td>${project.location}</td>
                    <td>${project.date}</td>
                    <td>
                        <a href="edit-project.php?project=${project.name}"><i class="far fa-edit"></i></a>&emsp;&emsp;
                        <a href="#" onclick="handleDelete('${project.name}')"><i class="fas fa-trash-alt"></i></a> 
                    </td>
                </tr>`;
            });

            return template;
        }

        $(document).ready(function() {
            doAjax('api/api_projects.php', 'GET', {
                project: 'Relief'
            })
            .then(response => {
                console.log('API Response:', response);  // Debugging the response
                if (response.statusCode === 200 && response.data) {
                    var projects = response.data;
                    $('#projects').html(setProjects(projects));
                } else {
                    console.error("No data found or incorrect response structure.");
                }
            })
            .catch(err => console.error("Error loading projects:", err));
        });

        const handleDelete = (project) => {
            if (confirm("Do you really want to delete?")) {
                window.location.href = "api/api_deleteProject.php?project=" + project + "&type=relief";
            }
        }

        auth.onAuthStateChanged(user => {
            if (user) {
                // Continue if user is authenticated
            } else {
                window.location = "login.php";  // Redirect to login if not authenticated
            }
        });
    </script>
</body>

</html>
