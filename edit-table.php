<!DOCTYPE html>
<html lang="en">

<head>
    <?php include './includes/head.php'; ?>
</head>

<body>
    <?php include './includes/nav.php'; ?>

    <main>
        <div class="container">
            <div class="header">Manage Project Details</div>
            <hr>
            <div id="table-container"></div>
            <div class="pagination center-align" id="pagination"></div>
        </div>
    </main>

    <?php include './includes/scripts.php'; ?>

    <script>
        let currentPage = 1;
        const rowsPerPage = 10;
        let tableData = [];
        let currentlyEditingRow = null;

        // Fetch data from the API
        const fetchData = () => {
            fetch('api/api_projects.php')
                .then(response => response.json())
                .then(data => {
                    if (data.statusCode === 200 && Array.isArray(data.data)) {
                        tableData = data.data;
                        renderTable();
                        renderPagination();
                    } else {
                        console.error(data.msg || "No valid data received");
                        document.getElementById('table-container').innerHTML = "<p>No data available.</p>";
                    }
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                    document.getElementById('table-container').innerHTML = "<p>Error fetching data. Please try again later.</p>";
                });
        };

        // Render table with pagination
        const renderTable = () => {
            if (!Array.isArray(tableData) || tableData.length === 0) {
                document.getElementById('table-container').innerHTML = "<p>No data available.</p>";
                return;
            }

            const start = (currentPage - 1) * rowsPerPage;
            const end = start + rowsPerPage;
            const visibleData = tableData.slice(start, end);

            let tableHtml = `
                <table class="highlight responsive-table">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Project Name</th>
                            <th>Date</th>
                            <th>Place</th>
                            <th>Short Description</th>
                            <th>Long Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
            `;

            visibleData.forEach(row => {
                tableHtml += `
                    <tr data-id="${row.id}">
                        <td data-column="prj_catagory">${row.type}</td>
                        <td data-column="prj_name">${row.name}</td>
                        <td data-column="prj_date">${row.date}</td>
                        <td data-column="place">${row.location}</td>
                        <td data-column="short_desc">${row.description}</td>
                        <td data-column="long_desc">${row.details}</td>
                        <td>
                            <a href="#" class="edit-button waves-effect waves-light btn-small green"><i class="fas fa-edit"></i> Edit</a>
                            <a href="#" class="save-button waves-effect waves-light btn-small blue" style="display: none;"><i class="fas fa-save"></i> Save</a>
                        </td>
                    </tr>
                `;
            });

            tableHtml += `</tbody></table>`;
            document.getElementById('table-container').innerHTML = tableHtml;
        };

        // Render pagination buttons
        const renderPagination = () => {
            const totalPages = Math.ceil(tableData.length / rowsPerPage);
            const paginationContainer = document.getElementById('pagination');
            paginationContainer.innerHTML = '';

            for (let i = 1; i <= totalPages; i++) {
                const button = document.createElement('button');
                button.textContent = i;
                button.className = i === currentPage ? 'active' : '';
                button.disabled = i === currentPage;
                button.addEventListener('click', () => {
                    currentPage = i;
                    renderTable();
                    renderPagination();
                });
                paginationContainer.appendChild(button);
            }
        };

        // Event listener for Edit, Save, and Delete actions
        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('edit-button')) {
                const row = e.target.closest('tr');

                // Disable editing on the previously edited row if any
                if (currentlyEditingRow && currentlyEditingRow !== row) {
                    cancelEditing(currentlyEditingRow); 
                }

                // Enable editing for the selected row
                row.querySelectorAll('[data-column]').forEach(cell => {
                    cell.contentEditable = 'true';
                });

                row.querySelector('.save-button').style.display = 'inline-block';
                row.querySelector('.edit-button').style.display = 'none';

                currentlyEditingRow = row;
            } else if (e.target.classList.contains('save-button')) {
                const row = e.target.closest('tr');
                const id = row.dataset.id;
                const updatedData = {};

                row.querySelectorAll('[data-column]').forEach(cell => {
                    const column = cell.dataset.column;
                    updatedData[column] = cell.textContent;
                    cell.contentEditable = 'false';
                });

                // Send updated data to backend
                fetch('api/api_updateTable.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ id, ...updatedData })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.statusCode === 200) {
                            alert('Record updated successfully');
                        } else {
                            alert('Failed to update record');
                        }
                    })
                    .catch(error => console.error('Error updating record:', error));

                // Switch back to normal mode
                e.target.style.display = 'none';
                row.querySelector('.edit-button').style.display = 'inline-block';

                currentlyEditingRow = null;
            } else if (e.target.classList.contains('delete-button')) {
                const row = e.target.closest('tr');
                const id = row.dataset.id;

                if (confirm(`Are you sure you want to delete this project?`)) {
                    fetch('api/api_deleteProject.php', {
                        method: 'DELETE',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ id })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.statusCode === 200) {
                                alert('Project deleted successfully');
                                fetchData(); // Refresh the table
                            } else {
                                alert('Failed to delete project');
                            }
                        })
                        .catch(error => {
                            console.error('Error deleting project:', error);
                        });
                }
            }
        });

        // Function to cancel editing of a row
        const cancelEditing = (row) => {
            row.querySelectorAll('[data-column]').forEach(cell => {
                cell.contentEditable = 'false';
            });
            row.querySelector('.save-button').style.display = 'none';
            row.querySelector('.edit-button').style.display = 'inline-block';
        };

        // Fetch data on page load
        fetchData();
    </script>
</body>

</html>
