<!DOCTYPE html>
<html lang="en">

<head>
    <?php include './includes/head.php'; ?>
    <style>
    form {
        margin: 1rem 5rem;
    }

    #short-desc {
        height: 8rem;
    }

    #long-desc {
        height: 12rem;
    }

    @media only screen and (max-width: 768px) {
        form {
            margin: 1rem 0;
        }
    }
    </style>
</head>

<body>

    <?php include './includes/nav.php'; ?>

    <main>
        <div class="header">Add Images</div>
        <hr>
        <div class="container">
            <div class="card">
                <div class="card-content">
                    <form action="api/api_addImage.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <select id="project-type" name="project-type" class="browser-default" onchange="populate()">
                                    <option value="" disabled selected>Choose Project Type</option>
                                    <option value="Paridhan">Paridhan</option>
                                    <option value="Shikshan">Shikshan</option>
                                    <option value="Event">Events</option>
                                    <option value="Relief">Relief</option>
                                </select>
                            </div>
                            <div class="input-field col s12 m6">
                                <select id="project" name="project" class="browser-default">
                                    <option value="" disabled selected>Choose Project</option>
                                </select>
                            </div>
                            <div class="input-field col s12">
                                ADD Images: Please select image as size 570*350 <br>
                                <input type="file" name="files[]" multiple accept=".png,.jpg,.jpeg,.gif"> <br>
                            </div>
                        </div>

                        <div class="center">
                            <input type="submit" name="submit" value="Add Images" class="btn-primary">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php include './includes/scripts.php'; ?>

    <script>
        let projects = [];

// Function to fetch projects from the API
function fetchProjects() {
    doAjax('api/api_projects.php', 'GET', {})
        .then(response => {
            console.log("API Response:", response); // Debugging: Log the response to check the data
            try {
                const parsedResponse = response; // Parse response as JSON
                if (parsedResponse.statusCode === 200 && parsedResponse.data) {
                    projects = parsedResponse.data; // Assign projects from API
                    console.log("Projects Loaded:", projects); // Debugging: Log loaded projects
                } else {
                    console.error("Error: No projects found or invalid response:", parsedResponse.msg);
                }
            } catch (error) {
                console.error("Error parsing API response:", error); // Log JSON parsing errors
            }
        })
        .catch(error => {
            console.error("Error fetching projects:", error); // Log AJAX request errors
        });
}

// Populate the project dropdown based on the selected type
function populate() {
    const projectType = document.getElementById('project-type').value;
    const projectDropdown = document.getElementById('project');
    console.log("projectType",projectType);
    // Reset project dropdown
    projectDropdown.innerHTML = "<option value='' disabled selected>Choose Project</option>";

    // Filter projects by the selected type and populate options
    const filteredProjects = projects.filter(project => project.type === projectType);
    if (filteredProjects.length > 0) {
        filteredProjects.forEach(project => {
            const option = document.createElement('option');
            option.value = project.name;
            option.textContent = project.name;
            projectDropdown.appendChild(option);
        });

        // Reinitialize Materialize dropdown
        M.FormSelect.init(projectDropdown);
    } else {
        console.warn("No projects available for the selected type.");
    }
}

// Initialize the page and fetch projects when the document is ready
document.addEventListener('DOMContentLoaded', function () {
    // Initialize Materialize dropdowns
    const selects = document.querySelectorAll('select');
    M.FormSelect.init(selects);

    // Fetch projects
    fetchProjects();
});

// Firebase authentication check
auth.onAuthStateChanged(user => {
    if (!user) {
        window.location = "login.php"; // Redirect to login if user is not authenticated
    }
});

    </script>