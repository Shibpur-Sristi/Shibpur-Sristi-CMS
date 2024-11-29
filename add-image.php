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
                                <label>Select Project Type</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <select id="project" name="project" class="browser-default">
                                    <option value="" disabled selected>Choose Project</option>
                                </select>
                                <label>Select Project</label>
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
    var projects = [];

    // Ensure that the API returns the right data
    function fetchProjects() {
        doAjax('api/api_projects.php', 'GET', { project: '' })
            .then(response => {
                console.log("API Response:", response); // Debugging: Log the response to check the data
                try {
                    var data = JSON.parse(response);
                    if (data.statusCode === 200) {
                        projects = data.data || []; // Make sure we handle empty or missing 'data'
                        console.log("Projects Loaded:", projects); // Debugging: Log projects to ensure they are loaded
                    } else {
                        console.error("No projects found:", data.msg); // Handle case where no projects are returned
                    }
                } catch (error) {
                    console.error("Error parsing API response:", error); // Catch and log any JSON parsing errors
                }
            })
            .catch(error => {
                console.error('Error fetching projects:', error); // Log if there is an error in the AJAX request
            });
    }

    // Populate the project options based on the selected project type
    const populate = () => {
        const projectType = document.getElementById('project-type');
        const projectOption = document.getElementById('project');
        projectOption.innerHTML = "<option value='' disabled selected>Choose Project</option>"; // Reset options

        if (projects.length > 0 && projectType.value) {
            let optionArr = projects.filter(project => project.type === projectType.value).map(project => project.name);
            
            // Add options to project select
            optionArr.forEach(option => {
                let newOption = document.createElement('option');
                newOption.value = option;
                newOption.innerHTML = option;
                projectOption.appendChild(newOption);
            });

            // Reinitialize the select field to update the Materialize dropdown
            M.FormSelect.init(projectOption);
        } else {
            console.warn("No projects found for the selected type.");
        }
    };

    // Initialize the page and fetch projects when the document is ready
    document.addEventListener('DOMContentLoaded', function() {
        fetchProjects(); // Fetch the projects first
    });

    // Firebase authentication check
    auth.onAuthStateChanged(user => {
        if (!user) {
            window.location = "login.php"; // Redirect to login if user is not authenticated
        }
    }
